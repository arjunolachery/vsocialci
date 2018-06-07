<?php
class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('User_functions_model');
    }
    public function show_posts()
    {
        $data['name']=$this->Auth_model->retrieve_user($uid=$this->session->userdata('uid'));
        if (!empty($data['name'])) {
            $data['name']=$data['name']->name;
            $this->load->view('posts_input_content', $data);
        }
    }
    public function show_search_result()
    {
        // TODO: change $_POST to standard post function in CI
        // retrieval of search_results is done from User_functions_model->retrieve_search_results
        $data['selector_search']=$_POST['selector_search'];
        $data['search_data']=$_POST['search_data'];
        $data['retrieved_search_results']=$this->User_functions_model->retrieve_search_results($data['search_data']);
        // load view [search_content] to the method [search_result] with $data [$search_data] loaded into div [search_result_value]
        $this->load->view('search_content', $data);
    }
    public function show_welcome_message()
    {
        // load view [welcome_content] to the method [welcome_message]
        $this->load->view('welcome_content');
    }
    public function show_settings()
    {
        // load view [settings_content] to the method [settings]
        $this->load->view('settings_content');
    }
    public function show_settings_actual()
    {
        // load view [settings_content] to the method [settings]
        //echo 1;
        $data['retrieved_settings']=$this->User_model->retrieve_settings();
        $data['profile_pic_file_name']=$this->User_functions_model->get_profile_pic();
        $this->load->view('settings_content_actual', $data);
    }
    public function show_notifications()
    {
        // load view [notifications_content] to the method [notifications]
        $this->load->view('notifications_content');
    }
    public function show_friend_requests()
    {
        // load view [friend_requests_content] to the method [friend_requests]
        $this->load->view('friend_requests_content');
    }
    public function show_messages()
    {
        //get names of friends
        $data['friends_list']=$this->Friend_model->retrieve_friends_list();
        $data['uid']=$this->session->userdata('uid');
        // load view [messages_content] to the method [messages]
        $this->load->view('messages_content', $data);
    }
    public function show_posts_content()
    {
        // store session uid value
        $data['uid']=$this->session->userdata('uid');
        // retrieval of posts is done from User_functions_model->retrieve_posts
        $this->load->model('User_functions_model');
        $data['posts_results']=$this->User_functions_model->retrieve_posts();
        // load view [posts_content_view] to the method [posts_content] with $data [$uid,$posts_results]
        $this->load->view('posts_content_view', $data);
    }
    public function show_profile()
    {
        // $uid has the user_id from the users table which is set in the session variable uid from the login method
        $uid=$this->session->userdata('uid');
        // proceed to the following 'if branch' if the user_logged session variable has not been set
        if (!isset($_SESSION['uid'])) {
            // set session variable error to value 'Please login first to view this page.'
            // and redirect to login page
            $this->session->set_flashdata("error", "Please login first to view this page.");
            redirect("auth/");
        }
        // $activation_status has value 0 or 1 depending on whether the user's email account has been verified or not
        //$activation_status=$this->User_model->check_activation_status($uid);
        //proceed to the following 'if branch' if the user's email account has not been verified

        // load the profile view to the profile method only if the user has been logged in successfully as mentioned before
        $data['profile_pic_file_name']=$this->User_functions_model->get_profile_pic();
        $data['email']=$_REQUEST['email'];
        $data['profile']=true;
        $data['welcome_screen_enabled']=$this->User_functions_model->check_welcome_screen();
        $this->load->view('home_view.php', $data);
        //WORKS!
      //$this->load->view('login_view.php');
    }
    public function show_profile_specific()
    {
        //echo "<br><br>You are now viewing a profile<br><br> email: ".$_POST['data'];
        $data['uid']=$this->session->userdata('uid');
        $data['email']=$_POST['data'];
        //echo $data['email'];
        $data['friend_uid']=$this->User_functions_model->get_uid_from_email($data['email']);
        $data['retrieved_settings']=$this->User_model->retrieve_settings_friend($data['friend_uid']);

        $data['retrieved_settings']=$this->User_model->retrieve_settings_friend($data['friend_uid']);
        $data['profile_pic_file_name']=$this->User_functions_model->get_profile_pic_friend($data['friend_uid']);
        //check whether friend
        $data['friend']=$this->User_functions_model->friends_data($data['uid'], $data['friend_uid']);
        $data['friend_status']=$this->Friend_model->friend_status_check($data['friend']);
        $this->load->view('profile_view.php', $data);
    }
}
