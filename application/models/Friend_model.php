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
    public function send_friend_request_model($friend_id)
    {
        //insert into db;
        //
        $uid=$this->session->userdata('uid');
        $data=array('u_id' => $uid,
       'friend_id' => $friend_id,
       'time_friend' => time(),
       'status_friend' => 0
      );
        $this->db->insert('friends', $data);
        return 1;
    }
    public function remove_friend_model($friend_id)
    {
        //delete from db;
        $uid=$this->session->userdata('uid');

        $delete_query= $this->db->query("DELETE FROM friends WHERE (u_id='$uid' AND friend_id='$friend_id') OR (friend_id='$uid' AND u_id='$friend_id')");

        return 1;
    }
    public function accept_friend_request_model($friend_id)
    {
        //update status to 1;
        $uid=$this->session->userdata('uid');
        $update_query= $this->db->query("UPDATE friends SET status_friend='1' WHERE (u_id='$uid' AND friend_id='$friend_id') OR (friend_id='$uid' AND u_id='$friend_id')");
        return 1;
    }
    public function friend_status_check($friend)
    {
        $uid=$this->session->userdata('uid');
        print_r($friend);
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
                    $friend_val=1;
                    $message="You are friends!";
                }
            } else {
                //received a friend Request
                if ($friend[0]['status_friend']==0) {
                    $friend_val=2;
                    $message="You got a friend request from this user.";
                } else {
                    $friend_val=1;
                    $message="You are friends!";
                }
            }
        }
        echo $message.'<br>';

        switch ($friend_val) {

              case 0:
              $button="<button id='send_friend_request'>Send Friend Request</button>";
              break;

              case 1:
              $button="<button id='remove_friend'>Remove Friend</button>";
              break;

              case 2:
              $button="<button id='accept_friend_request'>Accept Friend Request</button>";
              break;

              default:
              $button="Error";
            }
        $result_array=['message'=>$message,'friend_val'=>$friend_val,'button'=>$button];
        return $result_array;
    }
}
