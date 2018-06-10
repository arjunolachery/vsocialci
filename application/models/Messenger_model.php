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
    public function retrieve_messages_model()
    {
        $data['uid']=$this->session->userdata('uid');
        $friend_id=$_POST['friend_id'];
        $data['friend_id']=$friend_id;
        $uid=$this->session->userdata('uid');
        $result_check_friend= $this->db->query("SELECT * FROM messages WHERE ((u_id='$uid' AND friend_id='$friend_id') OR (friend_id='$uid' AND u_id='$friend_id'))");
        $result_check_friend_val = $result_check_friend->result_array();
        $data['messages']=$result_check_friend_val;
        $data['messages_time_checked']=$this->messages_time_checked($friend_id);
        //get messages from model
        $this->load->view('messages_box_content', $data);
    }
    public function messages_time_checked($friend_id)
    {
        $data['uid']=$this->session->userdata('uid');
        $uid=$data['uid'];
        $friend_id_m=$friend_id."m";
        $select_query=$this->db->query("SELECT * FROM checked_on WHERE type_checked_on='$friend_id_m' AND u_id=$uid");
        $select_query_array=$select_query->result_array();
        return $select_query_array[0]['time_checked_on'];
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
