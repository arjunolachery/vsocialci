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
     public function send_friend_request($friend_id)
     {
       //insert into db;
       //$data=array(
       $uid=$this->session->userdata('uid');
       'u_id' => $uid,
       'friend_id' => $friend_id,
       'time_friend' => time(),
       'status_friend' => 0
      );
       $this->db->insert('friends', $data);
       return 1;
     }
     public function cancel_friend_request()
     {
       //delete from db;
     }
     public function remove_friend()
     {
       //delete from db;
     }
     public function accept_friend_request()
     {
       //update status to 1;
     }
