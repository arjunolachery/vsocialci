<?php
class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function retrieveUserPrimaryDetails($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email,'password'=>$password));
        $query=$this->db->get();
        $user=$query->row();
        return $user;
    }
    public function checkUserExist($email)
    {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where(array('email'=>$email));
      $query=$this->db->get();
      $user=$query->row();
      return $user->email;
    }
    public function checkUserExistId($uid)
    {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where(array('user_id'=>$uid));
      $query=$this->db->get();
      $user=$query->row();
      return $user->activationKey;
    }
}
