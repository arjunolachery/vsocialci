<?php
/**
 * User_functions the tertiary controller after User that contains methods that are more specific to the user after logging in
 */
class User_functions extends CI_Controller
{
    /**
     * __construct contains base data that can be used for the other methods
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_functions_model');
    }
    /**
     * deletePost deletes the post that the user wishes to delete after pressing the delete icon
     * @return void
     */
    public function deletePost()
    {
        $uid=$this->session->userdata('uid');
        $postid=$this->input->post('postid');
        $this->User_functions_model->deleteUserPost($postid);
    }
    public function update_personal_information()
    {
        $gender_value=$this->input->post('gender');
        $date_birth=$this->input->post('dob');
        $uid=$this->session->userdata('uid');
        $this->db->where('u_id', $uid);
        $this->db->update('primary_information', array('gender' => $gender_value,'date_birth' =>$date_birth));
        echo 1;
    }
    public function update_preferences()
    {
      /*
      $gender_value=$this->input->post('gender');
      $date_birth=$this->input->post('dob');
      $uid=$this->session->userdata('uid');
      $this->db->where('u_id', $uid);
      $this->db->update('primary_information', array('gender' => $gender_value,'date_birth' =>$date_birth));
      */
      $uid=$this->session->userdata('uid');
      $auto_login_value=$this->input->post('auto_login_val');
      $welcome_screen_val=$this->input->post('welcome_screen_val');
      $select_value=$this->input->post('select_val');
      $this->db->where('u_id', $uid);
      $this->db->update('preferences', array('auto_login' => $auto_login_value,'welcome_screen' =>$welcome_screen_val));
  
      echo $auto_login_value.$welcome_screen_val.$select_value;
    }
}
