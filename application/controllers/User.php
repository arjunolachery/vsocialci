<?php
/**
 * User is the secondary controller after Auth
 * executed after user logs in
 * contains methods [profile,posts,search_result,welcome_message,
 * settings,notifications,friend_requests,messages,post_data,
 * posts_content_view,send_link,activate_user]
 *
 */
class User extends CI_Controller
{
    /**
     * [__construct loads all the data present in this method to all the other methods]
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('User_model');
    }
    public function profile()
    {
        $uid=$_SESSION['uid'];
        $this->session->set_flashdata("userError", md5(time().rand(10, 100).$_SESSION['uid']));
        if (!isset($_SESSION['user_logged'])) {
            $this->session->set_flashdata("error", "Please login first to view this page");
            redirect("auth/");
        }
        $this->session->set_flashdata("userError", md5(time().rand(10, 100).$_SESSION['uid']));
        $activationStatus=$this->User_model->checkActivationStatus($uid);
        if ($activationStatus==0) {
            $this->session->set_flashdata("verifyEmailText", "<div class='alert alert-danger alert-dismissible fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  Your email hasn't been verified yet. Click <a href='".site_url()."/user/sendlink'>here</a> to send again.
  </div>");
        }
        $this->load->view("profile");
    }
    public function posts()
    {
        $this->load->view('postsContent');
    }
    public function search_result()
    {
        $data['searchInputData']=$_POST['searchInputData'];
        $this->load->view('searchContent', $data);
    }
    public function welcome_message()
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
    public function friend_requests()
    {
        $this->load->view('friendRequestsContent');
    }
    public function messages()
    {
        $this->load->view('messagesContent');
    }
    public function post_data()
    {
        $this->User_model->userpostdata($_SESSION['uid'], $_POST['message']);
        echo 1;
    }
    public function posts_content_view()
    {
        $data['uid']=$_SESSION['uid'];
        $this->load->view('postsContentView', $data);
    }
      public function send_link()
          {
              $uidActivationKey=$this->Auth_model->checkUserExistId($_SESSION['userid']);
              $config['protocol'] = 'smtp';
              $config['smtp_host'] = 'ssl://smtp.gmail.com';
              $config['smtp_port'] = '465';
              $config['smtp_timeout'] = '7';
              $config['smtp_user'] = 'vsocial2018@gmail.com';
              $config['smtp_pass'] = 'vsocial201812345$';
              $config['charset'] = 'utf-8';
              $config['newline'] = "\r\n";
              $config['mailtype'] = 'text'; // or html
              $config['validation'] = true; // bool whether to validate email or not
              $email="arjun2olachery@gmail.com";
              $message=site_url();"/user/activateUser?key=".$uidActivationKey;
              $this->email->initialize($config);
              $this->email->from('arjun2olachery@gmail.com', 'Arjun Olachery');
              $this->email->to($email);
              $this->email->subject("Vsocial Activation Link");
              $this->email->message($message);
              $this->email->send();
              //$this->load->view('profile');  public function postdata()
      /*
      {
        $this->User_model->userpostdata($_SESSION['uid'],$_POST['message']);
        echo 1;
      }
      */
              redirect(site_url()."/user/profile","refresh");
            }
        public function activate_user()
        {
          $data=array(
            'activation'=>1,
            'activation_time'=>time(),
          );
          $this->db->where('activation_key', $_REQUEST['key']);
          $this->db->update('users', $data);
          echo "<script>alert('".$_REQUEST['key']."')</script>";
        }
    */
}
