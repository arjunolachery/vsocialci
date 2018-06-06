<?php
class Friend extends CI_Controller
{
    /**
     * [__construct loads all the data present in this method to all the other methods]
     */
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Auth_model') contains database operations related to Auth controller]
        // $this->load->model('User_model') contains database operations related to User controller]
        $this->load->model('Friend_model');
        $this->load->model('User_functions_model');
    }
    // TODO: profile method should be renamed to home
    /**
     * profile is the method that is primarily called after the user logs in
     * @return void
     */
    public function send_friend_request()
    {
        //insert into db;

        $friend_id=$_POST['friend_id'];
        $check_exist=$this->Friend_model->check_friend_exist($friend_id);
        if ($check_exist==1) {
            $this->Friend_model->send_friend_request_model($friend_id);
        } else {
            echo "Already sent";
        }

        //return 1;

        echo $friend_id;
        //return 1;
    }
    public function remove_friend()
    {
        //delete from db;

        $friend_id=$_POST['friend_id'];
        $check_exist=$this->Friend_model->check_friend_exist($friend_id);
        if ($check_exist==1) {
            $this->Friend_model->remove_friend_model($friend_id);
            //echo $val;
            echo 'done';
        } else {
            echo "Doesn't exist";
        }

        //return 1;


        //return 1;
    }
    public function accept_friend_request()
    {
        //update status to 1;

        $friend_id=$_POST['friend_id'];

        $check_exist=$this->Friend_model->check_friend_exist($friend_id);
        if ($check_exist==1) {
            $this->Friend_model->accept_friend_request_model($friend_id);
            echo "Friendship exists";
        } else {
            echo "Friendship doesn't exist";
        }

        //return 1;


        //return 1;

        //echo $friend_id;
    }
    public function get_friendship_status()
    {
        // code...

        $data['uid']=$this->session->userdata('uid');
        $data['email']=$_POST['email'];
        //$data['retrieved_settings']=$this->User_model->retrieve_settings_friend($data['email']);
        $data['friend_uid']=$this->User_functions_model->get_uid_from_email($data['email']);
        $data['friend']=$this->User_functions_model->friends_data($data['uid'], $data['friend_uid']);
        $data['friend_status']=$this->Friend_model->friend_status_check($data['friend']);
        if($data['friend_status']['friend_val']!=3)
        {
        echo $data['friend_status']['message']."<br>".$data['friend_status']['button'];
        }
        else {
          echo $data['friend_status']['button'];

        }
      // echo "hi";
    }
    public function get_friendship_status_2()
    {
        // code...

        $data['uid']=$this->session->userdata('uid');
        $data['email']=$_POST['email'];
        //$data['retrieved_settings']=$this->User_model->retrieve_settings_friend($data['email']);
        $data['friend_uid']=$this->User_functions_model->get_uid_from_email($data['email']);
        $data['friend']=$this->User_functions_model->friends_data($data['uid'], $data['friend_uid']);
        $data['friend_status']=$this->Friend_model->friend_status_check($data['friend']);
        echo $data['friend_status']['friend_val'];

      // echo "hi";
    }
    public function get_posts()
    {
      $data['email']=$_POST['email'];
      $data['uid']=$this->User_functions_model->get_uid_from_email($data['email']);
      // retrieval of posts is done from User_functions_model->retrieve_posts
      $data['posts_results']=$this->User_functions_model->retrieve_posts_2($data['uid']);
      // load view [posts_content_view] to the method [posts_content] with $data [$uid,$posts_results]
      $this->load->view('posts_content_view', $data);
    }
}
