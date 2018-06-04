<?php
/**
 * [User_model the operations for the User controller exist here]
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Auth_model.php');
        $this->load->model('Auth_model');
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
    /**
     * [retrieve_settings the settings data that is to be retrieved to the home_view]
     * @return [type] [description]
     */
    public function retrieve_settings()
    {
        /*
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where(array('user_id'=>$uid));
          $query=$this->db->get();
          $user=$query->row();
          return $user->activation;
          */
        $uid=$this->session->userdata('uid');
        $user = $this->db->query("SELECT * FROM users,preferences,primary_information WHERE users.user_id='$uid' AND users.user_id = primary_information.u_id AND users.user_id = preferences.u_id");
        return $user->result_array();
        //return $uid;
        /*
        $uid=$this->session->userdata('uid');
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('user_id'=>$uid));
        $query=$this->db->get();
        $user=$query->row();
        */
        //return $user;
        //return $this->session->userdata('uid');
    }
    public function retrieve_settings_friend($uid)
    {
        /*
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where(array('user_id'=>$uid));
          $query=$this->db->get();
          $user=$query->row();
          return $user->activation;
          */
        $user = $this->db->query("SELECT * FROM users,preferences,primary_information WHERE users.user_id='$uid' AND users.user_id = primary_information.u_id AND users.user_id = preferences.u_id");
        return $user->result_array();
        //return $uid;
        /*
        $uid=$this->session->userdata('uid');
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('user_id'=>$uid));
        $query=$this->db->get();
        $user=$query->row();
        */
        //return $user;
        //return $this->session->userdata('uid');
    }
}
