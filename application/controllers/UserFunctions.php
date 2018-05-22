<?php
class UserFunctions extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_functions_model');
    $uid=$this->session->userdata('uid');
  }
  public function deletePost(){
    $postid=$_POST['postid'];
    $this->User_functions_model->deleteUserPost($uid,$postid);
    echo $postid.$uid;
  }
}

?>
