<?php
class User extends CI_Controller
{

  public function profile()
  {
    /*if(!isset($_SESSION['user_logged']))
    {
      $this->session->set_flashdata("error","Please login first to view this page");
      redirect("auth/login");
    }*/
    $this->load->view("profile");
    //$this->load->view("profile");

  }
}

?>
