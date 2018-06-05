<?php
/**
 * Auth_model contains database operations that can be used for other controllers and views
 */
class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * retrieveUserPrimaryDetails retrieves the user data when the $email and $password variable data are passed
     * mainly used for checking whether the user exists on logging in
     * @param  [text] $email    [email of the user]
     * @param  [text] $password [password of the user]
     * @return [void]
     */
    public function retrieveUserPrimaryDetails($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email,'password'=>$password));
        $query=$this->db->get();
        $user=$query->row();
        return $user;
    }
    /**
     * [retrieve_user retrieves data row from user table with uid of the user passed]
     * can be used in many places
     * @param  [int] $uid [user id]
     * @return [void]
     */
    public function retrieve_user($uid)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('user_id'=>$uid));
        $query=$this->db->get();
        $user=$query->row();
        return $user;
    }
    public function retrieve_user_email($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email));
        $query=$this->db->get();
        $user=$query->row();
        return $user;
    }

    /**
     * [checkUserExist used to check if the email exists mainly during the sign up operation]
     * if it exists then the user cannot be able to sign up
     * @param  [text] $email [email submitted during sign up operation]
     * @return [void]
     */
    public function checkUserExist($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email));
        $query=$this->db->get();
        $user=$query->row();
        return $user->email;
    }
}
