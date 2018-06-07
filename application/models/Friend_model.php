<?php
class Friend_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * [deleteUserPost is executed whenever the user pressed the delete button]
     * @param  [int] $postid [the unique id of post]
     * @return [void]
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
    public function accept_friend_request_model()
    {
        //update status to 1;
        $friend_id=$_POST['friend_id'];
        $uid=$this->session->userdata('uid');
        $check_exist=$this->Friend_model->check_friend_exist($friend_id);
        if ($check_exist==1) {
            $update_query= $this->db->query("UPDATE friends SET status_friend='1' WHERE (u_id='$uid' AND friend_id='$friend_id') OR (friend_id='$uid' AND u_id='$friend_id')");
            return 1;
        } else {
            echo "Friendship doesn't exist";
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
}
