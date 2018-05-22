<?php
class User extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('Auth_model');
      $this->load->model('User_model');
  }
  public function profile()
  {
    $uid=$_SESSION['uid'];
    if(!isset($_SESSION['user_logged']))
    {
      $this->session->set_flashdata("error","Please login first to view this page");
      redirect("auth/");
    }
    $activationStatus=$this->User_model->checkActivationStatus($uid);
    if($activationStatus==0)
    {
    $this->session->set_flashdata("verifyEmailText", "<div class='alert alert-danger alert-dismissible fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  Your email hasn't been verified yet. Click <a href='http://localhost/vsocialci/index.php/user/sendlink' target='_blank'>here</a> to send again.
  </div>");
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

  public function sendlink()
      {
          $uidActivationKey=$this->Auth_model->checkUserExistId($_SESSION['uid']);
          $userDetails=$this->Auth_model->retrieveUserPrimaryDetailsId($_SESSION['uid']);
          //echo "<script>alert('".$userDetails->email."')</script>";
          $config['protocol'] = 'smtp';

          $config['smtp_host'] = 'ssl://smtp.gmail.com';

          $config['smtp_port'] = '465';

          $config['smtp_timeout'] = '7';

          $config['smtp_user'] = 'vsocial2018@gmail.com';

          $config['smtp_pass'] = 'vsocial201812345$';

          $config['charset'] = 'utf-8';

          $config['newline'] = "\r\n";

          $config['mailtype'] = 'html'; // or html

          $config['validation'] = true; // bool whether to validate email or not
          $email=$userDetails->email;
          $message="Hi, ".$userDetails->name."!<br>Activate your account by clicking this link<br>"."http://localhost/vsocialci/index.php/user/activateUser?key=".$uidActivationKey;
          $this->email->initialize($config);
          $this->email->from('vsocial2018@gmail.com', 'Vsocial Team');
          $this->email->to($email);
          $this->email->subject("Vsocial Activation Link");
          $this->email->message($message);
          $this->email->send();
          //$this->load->view('profile');
          echo "1";
          //echo "<script>alert('Verification link has been sent to '+".$email.+"');</script>";
          //redirect("http://localhost/vsocialci/index.php/user/profile","refresh");
        }
    public function activateUser()
    {
      $data=array(
        'activation'=>1,
        'activationTime'=>time(),
      );
      $this->db->where('activationKey', $_REQUEST['key']);
      $this->db->update('users', $data);
      //echo "<script>alert('".$_REQUEST['key']."')</script>";
    }

}

?>
