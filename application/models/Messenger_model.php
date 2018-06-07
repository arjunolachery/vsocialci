<?php
class Messenger_model extends CI_Model
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
    public function retrieve_messages_model($friend_id)
    {
        $uid=$this->session->userdata('uid');
        $result_check_friend= $this->db->query("SELECT * FROM messages WHERE ((u_id='$uid' AND friend_id='$friend_id') OR (friend_id='$uid' AND u_id='$friend_id'))");
        $result_check_friend_val = $result_check_friend->result_array();
        return $result_check_friend_val;

    }
    public function send_message_model()
    {
      $uid=$this->session->userdata('uid');
      $data=array('u_id' => $uid,
     'friend_id' => $_POST['friend_id'],
     'content_message' => $_POST['message_content'],
     'time_message' => time()
    );
      $this->db->insert('messages', $data);
      return 1;

    }

}
