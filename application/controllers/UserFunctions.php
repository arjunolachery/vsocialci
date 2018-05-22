<?php
class UserFunctions extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_functions_model');
  }
  public function deletePost(){
    $uid=$this->session->userdata('uid');
    $postid=$this->input->post('postid');
    $this->User_functions_model->deleteUserPost($uid,$postid);
    //echo $postid.$uid;
  }
}
?>
