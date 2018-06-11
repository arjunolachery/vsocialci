<?php
/**
 * [Friend_model associated with the Friend controller]
 */
class Friend_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('User_functions_model');
    }
    /**
     * [send_friend_request_model description]
     * @return [type] [description]
     */
    public function send_friend_request_model()
    {
        //insert into db;
        //
        $friend_id=$_POST['friend_id'];
        $check_exist=$this->check_friend_exist($friend_id);

        if ($check_exist==1) {
            $uid=$this->session->userdata('uid');
            $data=array('u_id' => $uid,
          'friend_id' => $friend_id,
          'time_friend' => time(),
          'status_friend' => 0
         );
            $this->db->insert('friends', $data);
            return 1;
        } else {
            echo "Already sent";
        }
    }
    public function remove_friend_model()
    {
        //delete from db;
        $friend_id=$_POST['friend_id'];
        $uid=$this->session->userdata('uid');
        $check_exist=$this->check_friend_exist($friend_id);
        if ($check_exist==1) {
            $delete_query= $this->db->query("DELETE FROM friends WHERE (u_id='$uid' AND friend_id='$friend_id') OR (friend_id='$uid' AND u_id='$friend_id')");
            return 1;
        } else {
            echo "Doesn't exist";
        }
    }
    public function accept_friend_request_model()
    {
        //update status to 1;
        $friend_id=$_POST['friend_id'];
        $uid=$this->session->userdata('uid');
        $check_exist=$this->Friend_model->check_friend_exist($friend_id);
        $time_now=time();
        if ($check_exist==1) {
            $update_query= $this->db->query("UPDATE friends SET status_friend='1',time_friend=$time_now WHERE (u_id='$uid' AND friend_id='$friend_id') OR (friend_id='$uid' AND u_id='$friend_id')");
            return 1;
        } else {
            echo "Friendship doesn't exist";
        }
    }
    public function insert_notifications_model()
    {
        $friend_id=$_POST['friend_id'];
        $uid=$this->session->userdata('uid');
        $check_notification_exist=$this->check_notification_exist($friend_id);
        //if notification exists, then update else insert
        $friend_id_m=$friend_id.'m';
        $uid_m=$uid.'m';
        if ($check_notification_exist==2) {

        //update
            $data_checked_on=array(
          'time_checked_on'=>time(),
        );
            $this->db->where('u_id', $uid);
            $this->db->where('type_checked_on', $friend_id_m);
            $this->db->update('checked_on', $data_checked_on);

            $data_checked_on=array(
          'time_checked_on'=>time(),
        );
            $this->db->where('u_id', $friend_id);
            $this->db->where('type_checked_on', $uid_m);
            $this->db->update('checked_on', $data_checked_on);
        } elseif ($check_notification_exist==0) {
            //insert
            $data_friends=array(
            array('u_id' => $uid,
        'type_checked_on' => $friend_id_m,
        'time_checked_on' => time(),
      ),array(
        'u_id' => $friend_id,
      'type_checked_on' => $uid_m,
      'time_checked_on' => time(),
      )
    );
            $this->db->insert_batch('checked_on', $data_friends);
            return 1;
        }
    }
    public function check_notification_exist($friend_id)
    {
        $uid=$this->session->userdata('uid');
        $uid_m=$uid.'m';
        $friend_id_m=$friend_id.'m';
        $select_query=$this->db->query("SELECT * FROM checked_on WHERE ((u_id='$uid' AND type_checked_on='$friend_id_m') OR (u_id='$friend_id' AND type_checked_on='$uid_m'))");
        $select_query_result=$select_query->result_array();
        return sizeof($select_query_result);
    }
    public function get_friendship_status_model()
    {
        $data['uid']=$this->session->userdata('uid');
        $data['email']=$_POST['email'];
        $data['friend_uid']=$this->User_functions_model->get_uid_from_email($data['email']);
        $data['friend']=$this->User_functions_model->friends_data($data['uid'], $data['friend_uid']);
        $data['friend_status']=$this->friend_status_check($data['friend']);
        if ($data['friend_status']['friend_val']!=3) {
            echo $data['friend_status']['message']."<br>".$data['friend_status']['button'];
        } else {
            echo $data['friend_status']['button'];
        }
    }
    public function get_friendship_status_2_model()
    {
        $data['uid']=$this->session->userdata('uid');
        $data['email']=$_POST['email'];
        $data['friend_uid']=$this->User_functions_model->get_uid_from_email($data['email']);
        $data['friend']=$this->User_functions_model->friends_data($data['uid'], $data['friend_uid']);
        $data['friend_status']=$this->friend_status_check($data['friend']);
        echo $data['friend_status']['friend_val'];
    }
    public function get_posts_model()
    {
        $data['email']=$_POST['email'];
        $data['uid']=$this->User_functions_model->get_uid_from_email($data['email']);
        // retrieval of posts is done from User_functions_model->retrieve_posts
        $data['posts_results']=$this->User_functions_model->retrieve_posts_2($data['uid']);
        // load view [posts_content_view] to the method [posts_content] with $data [$uid,$posts_results]
        $this->load->view('posts_content_view', $data);
    }
    public function check_friend_exist($friend_id)
    {
        //$uid=$this->session->userdata('uid');
        return 1;

        $result_check_friend= $this->db->query("SELECT * FROM friends WHERE (u_id='$uid' AND friend_id='$friend_id') OR (friend_id='$uid' AND u_id='$friend_id')");
        $result_check_friend_val = $result_check_friend->result_array();
        if (empty($result_check_friend_val)) {
            return 0;
        } else {
            return 1;
        }
    }
    public function friend_status_check($friend)
    {
        $uid=$this->session->userdata('uid');
        if (empty($friend)) {
            $friend_val=0;
            $message="To view the user's posts, add as a friend.";
        } else {
            if ($uid==$friend[0]['u_id']) {
                //sent a friend request
                if ($friend[0]['status_friend']==0) {
                    $friend_val=1;
                    $message="Friend Request has been sent.";
                } else {
                    $friend_val=3;
                    //$message="You are friends!";
                }
            } else {
                //received a friend Request
                if ($friend[0]['status_friend']==0) {
                    $friend_val=2;
                    $message="You got a friend request from this user.";
                } else {
                    $friend_val=3;
                    //$message="You are friends!";
                }
            }
        }

        switch ($friend_val) {

              case 0:
              $button="<button id='send_friend_request' onclick='send_friend_request();' class='button_friend'>Send Friend Request</button>";
              break;

              case 1:
              $button="<button id='remove_friend' onclick='remove_friend_request();' class='button_friend'>Remove Friend</button>";
              break;

              case 2:
              $button="<button id='accept_friend_request' onclick='accept_friend_request();' class='button_friend'>Accept Friend Request</button>";
              break;

              case 3:
              $button="<button id='remove_friend' onclick='remove_friend();' class='button_friend_2'>Remove Friend</button>";
              break;

              default:
              $button="Error";
            }
        if ($friend_val==3) {
            $result_array=['friend_val'=>$friend_val,'button'=>$button];
        } else {
            $result_array=['message'=>$message,'friend_val'=>$friend_val,'button'=>$button];
        }
        return $result_array;
    }
    //returns a complete array of friends table only with rows having user id as either the friend field or the uid field.
    public function retrieve_friends_list()
    {
        # code...
        $uid=$this->session->userdata('uid');
        $result_check_friend= $this->db->query("SELECT * FROM friends,users,profile_pic WHERE set_profile_pic=1 AND friends.status_friend=1 AND ((friends.u_id='$uid'  AND users.user_id=friends.friend_id AND users.user_id=profile_pic.u_id) OR  (friends.friend_id='$uid'  AND users.user_id=friends.u_id AND users.user_id=profile_pic.u_id)) ORDER BY users.name");
        $result_check_friend_val = $result_check_friend->result_array();
        if (empty($result_check_friend_val)) {
            return 0;
        } else {
            return $result_check_friend_val;
        }
    }
    public function retrieve_friends_messages_list()
    {
        # code...
        $uid=$this->session->userdata('uid');
        $result_check_friend= $this->db->query("SELECT * FROM friends,users,profile_pic,checked_on WHERE set_profile_pic=1 AND checked_on.u_id=$uid AND friends.status_friend=1 AND ((friends.u_id='$uid'  AND users.user_id=friends.friend_id AND checked_on.type_checked_on=friends.friend_id+'m' AND users.user_id=profile_pic.u_id) OR  (friends.friend_id='$uid'  AND users.user_id=friends.u_id AND users.user_id=profile_pic.u_id AND checked_on.type_checked_on=friends.u_id+'m')) ORDER BY users.name");
        $result_check_friend_val = $result_check_friend->result_array();
        if (empty($result_check_friend_val)) {
            return 0;
        } else {
            return $result_check_friend_val;
        }
    }
}
