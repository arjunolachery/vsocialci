<?php
/**
 * [User_model the operations for the User controller exist here]
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * [check_activation_status to check whether the user's email has been activated]
     * @param  [int] $uid [user's id]
     * @return [int]      [1 if activated or 0 if not]
     */
    public function check_activation_status($uid)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('user_id'=>$uid));
        $query=$this->db->get();
        $user=$query->row();
        return $user->activation;
    }
    /**
     * user_post_data posts the user's post into the posts table
     * @param  int $uid      user id
     * @param  text $message post content
     * @return void
     */
    public function user_post_data($uid, $message)
    {
        // executes the posting of user's post data to the posts table
        $data=array(
        'u_id' => $uid,
        'content' => $message,
        'timestamp' => time(),
      );
        $this->db->insert('posts', $data);
        return 1;
    }
}
