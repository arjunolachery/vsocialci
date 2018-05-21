<?php
class User extends CI_Controller
{
  public function profile()
  {
    if(!isset($_SESSION['user_logged']))
    {
      $this->session->set_flashdata("error","Please login first to view this page");
      redirect("auth/");
    }
    $this->load->view("profile");
  }
  public function posts()
  {
    $this->load->view('postsContent');
  }
  public function searchResult()
  {
    $data['searchInputData']=$_POST['searchInputData'];
    $this->load->view('searchContent',$data);
  }
  public function welcomeMessage()
  {
    $this->load->view('welcomeContent');
  }
  public function settings()
  {
    $this->load->view('settingsContent');
  }
  public function notifications()
  {
    $this->load->view('notificationsContent');
  }
  public function friendRequests()
  {
    $this->load->view('friendRequestsContent');
  }
  public function messages()
  {
    $this->load->view('messagesContent');
  }
}

?>
