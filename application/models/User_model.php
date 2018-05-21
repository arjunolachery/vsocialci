<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function checkActivationStatus($uid)
    {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where(array('user_id'=>$uid));
      $query=$this->db->get();
      $user=$query->row();
      return $user->activation;
    }
    public function userpostdata($id,$message)
    {
      $data=array(
        'u_id' => $id,
        'content' => $message,
        'timestamp' => time(),
      );
      $this->db->insert('posts',$data);
      return 1;
    }
    /*
    public function messagesConf($id)
    {
      switch($id)
      {
        case 1:
        return "You have successfully signed up. Proceed to log in.";
        case 2:
        return "You have successfully logged out";
        case default:
        break;
      }
    }
    */
    /*
    public function messagesRej($id)
    {
      switch($id)
      {
        case 1:
        return "You have successfully signed up. Proceed to log in.";
        case default:
        break;
      }
    }
    */
}
