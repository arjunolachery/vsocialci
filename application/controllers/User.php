<?php
/**
 * User is the secondary controller after Auth
 * executed after user logs in
 * contains methods [profile,posts,search_result,welcome_message,
 * settings,notifications,friend_requests,messages,post_data,
 * posts_input_content_view,send_link,activate_user]
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
        // $this->load->model('Auth_model') contains database operations related to Auth controller]
        // $this->load->model('User_model') contains database operations related to User controller]
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('User_functions_model');
    }
    // TODO: profile method should be renamed to home
    /**
     * profile is the method that is primarily called after the user logs in
     * @return void
     */
    public function home()
    {
        // TODO: user_id to be renamed to uid in table
        // $uid has the user_id from the users table which is set in the session variable uid from the login method
        $uid=$this->session->userdata('uid');
        // OPTIMIZE: user_logged isn't required, just use uid
        // proceed to the following 'if branch' if the user_logged session variable has not been set
        if (!isset($_SESSION['user_logged'])) {
            // set session variable error to value 'Please login first to view this page.'
            // and redirect to login page
            $this->session->set_flashdata("error", "Please login first to view this page.");
            redirect("auth/");
        }
        // $activation_status has value 0 or 1 depending on whether the user's email account has been verified or not
        $activation_status=$this->User_model->check_activation_status($uid);
        //proceed to the following 'if branch' if the user's email account has not been verified
        if ($activation_status==0) {
            // set session variable verify_email_message to let the user know to verify the email again.
            $this->session->set_flashdata(
            "verify_email_message",
        "<div class='alert alert-danger alert-dismissible fade in'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        Your email hasn't been verified yet. Click <a href='".site_url()."/user/send_link'>here</a> to send again.</div>"
        );
        }
        // load the profile view to the profile method only if the user has been logged in successfully as mentioned before
        $data['profile']=false;
        $data['email']='';
        $data['welcome_screen_enabled']=$this->User_functions_model->check_welcome_screen();
        $data['profile_pic_file_name']=$this->User_functions_model->get_profile_pic();
        $this->load->view('home_view.php', $data);
    }
    /**
     * posts is the method that calls the posts from the posts table for the particular user
     * @return void
     */
    public function posts()
    {
        // load view [posts_input_content] to the method [posts]
        $data['name']=$this->Auth_model->retrieve_user($uid=$this->session->userdata('uid'));
        $data['name']=$data['name']->name;
        $this->load->view('posts_input_content', $data);
    }
    /**
     * search_result contains data of the search result that is executed by the user typing in the search bar
     * @return void
     */
    public function search_result()
    {
        // TODO: change $_POST to standard post function in CI
        // retrieval of search_results is done from User_functions_model->retrieve_search_results
        $data['selector_search']=$_POST['selector_search'];
        $data['search_data']=$_POST['search_data'];
        $this->load->model('User_functions_model');
        $data['retrieved_search_results']=$this->User_functions_model->retrieve_search_results($data['search_data']);
        // load view [search_content] to the method [search_result] with $data [$search_data] loaded into div [search_result_value]
        $this->load->view('search_content', $data);
    }
    /**
     * welcome_message contains result for the welcome message when the user logs in
     * @return void
     */
    public function welcome_message()
    {
        // load view [welcome_content] to the method [welcome_message]
        $this->load->view('welcome_content');
    }
    /**
     * settings contain settings data when the user logs in
     * @return void
     */
    public function settings()
    {
        // load view [settings_content] to the method [settings]
        $this->load->view('settings_content');
    }
    /**
     * [settings_actual the actual settings that show up in home_view and not the drop down
     * @return [type] [description]
     */
    public function settings_actual()
    {
        // load view [settings_content] to the method [settings]
        //echo 1;
        $data['retrieved_settings']=$this->User_model->retrieve_settings();
        $data['profile_pic_file_name']=$this->User_functions_model->get_profile_pic();
        //echo $data['retrieved_settings'];
        $this->load->view('settings_content_actual', $data);
    }
    /**
     * notifications contain notifications data when the user logs in
     * @return void
     */
    public function notifications()
    {
        // load view [notifications_content] to the method [notifications]
        $this->load->view('notifications_content');
    }
    /**
     * friend_requests contain friend_requests data when the user logs in
     * @return void
     */
    public function friend_requests()
    {
        // load view [friend_requests_content] to the method [friend_requests]
        $this->load->view('friend_requests_content');
    }
    /**
     * messages contain messages data when the user logs in
     * @return void
     */
    public function messages()
    {
        // load view [messages_content] to the method [messages]
        $this->load->view('messages_content');
    }
    /**
     * post_data method that deals with the posting of a user's new post
     * @return void
     */
    public function post_data()
    {
        // user's post data is sent to the function [user_post_data] from the model [User_model]
        $this->User_model->user_post_data($_SESSION['uid'], $_POST['message']);
        echo 1;
    }
    /**
     * posts_input_content_view method calls the posts that are to be visible to the user's profile]
     * @return [type] [description]
     */
    public function posts_content()
    {
        // store session uid value
        $data['uid']=$this->session->userdata('uid');
        // retrieval of posts is done from User_functions_model->retrieve_posts
        $this->load->model('User_functions_model');
        $data['posts_results']=$this->User_functions_model->retrieve_posts();
        // load view [posts_content_view] to the method [posts_content] with $data [$uid,$posts_results]
        $this->load->view('posts_content_view', $data);
    }
    /**
     * [profile a major functionality that will display the user's content]
     * @return [type] [description]
     */
    public function profile()
    {
      // TODO: user_id to be renamed to uid in table
      // $uid has the user_id from the users table which is set in the session variable uid from the login method
      $uid=$this->session->userdata('uid');
      // OPTIMIZE: user_logged isn't required, just use uid
      // proceed to the following 'if branch' if the user_logged session variable has not been set
      if (!isset($_SESSION['user_logged'])) {
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
        //$this->load->view('login_view.php');
    }
    public function profile_specific()
    {
        echo "<br><br>You are now viewing a profile<br><br> email: ".$_POST['data'];
    }
    /**
     * send_link the email verification link is sent to the user's email
     * @return void
     */
    public function send_link()
    {
        // TODO: get user's email
        // TODO: generate nice email
        // OPTIMIZE: create a model that gets the user details and use that to get the attribute values
        // $uid_activation_key gets the activation key of the user from the user's table
        // $config contains email configuration
        $query_result=$this->Auth_model->retrieve_user($this->session->userdata('uid'));
        $email=$query_result->email;
        // TODO: change activationKey to activation_key (changed in database)
        $uid_activation_key=$query_result->activationKey;
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
        $message=site_url()."/user/activate_user?key=".$uid_activation_key;
        $this->email->initialize($config);
        $this->email->from('vsocial2018@gmail.com', 'Vsocial Team');
        $this->email->to($email);
        $this->email->subject("Vsocial Activation Link");
        $this->email->message($message);
        $this->email->send();
        redirect(site_url()."/user/home", "refresh");
    }
    /**
     * activate_user is the method to activate the user's email, works by changing the activate value to 1
     * @return void
     */
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
}
