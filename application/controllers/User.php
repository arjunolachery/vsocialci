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
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('User_functions_model');
        $this->load->model('Friend_model');
        $this->load->model('Home_model');
    }
    /**
     * home is the method that is primarily called after the user logs in
     * @return void
     */
    public function home()
    {
        //check wheter the user has logged in. If not, it will redirect to Auth
        $this->User_model->check_logged_in();
        // $activation_status has value 0 or 1 depending on whether the user's email account has been verified or not
        $activation_status=$this->User_model->check_activation_status();
        // load the home view to the home method only if the user has been logged in successfully as mentioned before
        $activation_status=$this->User_model->proceed_to_home();
    }
    /**
     * posts is the method that calls the posts from the posts table for the particular logged in user
     * this function is called from profile.js whenever the welcome screen is off, or the user clicks close on the welcome screen or presses the back_button_image
     * only if welcome_screen is disabled
     * @return void
     */
    public function posts()
    {
        // load view [posts_input_content] to the method [posts]
        $this->Home_model->show_posts();
    }
    /**
     * search_result contains data of the search result that is executed by the user typing in the search bar
     * @return void
     */
    public function search_result()
    {
        // TODO: change $_POST to standard post function in CI
        // retrieval of search_results is done from User_functions_model->show_search_results
        $this->Home_model->show_search_result();
    }
    /**
     * welcome_message contains result for the welcome message when the user logs in
     * @return void
     */
    public function welcome_message()
    {
        // load view [welcome_content] to the method [welcome_message]
        $this->Home_model->show_welcome_message();
    }
    /**
     * settings contain settings data when the user logs in
     * @return void
     */
    public function settings()
    {
        // load view [settings_content] to the method [settings]
        $this->Home_model->show_settings();
    }
    /**
     * [settings_actual the actual settings that show up in home_view and not the drop down
     * @return [type] [description]
     */
    public function settings_actual()
    {
        $this->Home_model->show_settings_actual();
    }
    /**
     * notifications contain notifications data when the user logs in
     * @return void
     */
    public function notifications()
    {
        $this->Home_model->show_notifications();
    }
    /**
     * friend_requests contain friend_requests data when the user logs in
     * @return void
     */
    public function friend_requests()
    {
        // load view [friend_requests_content] to the method [friend_requests]
        $this->Home_model->show_friend_requests();
    }
    /**
     * messages contain messages data when the user logs in
     * @return void
     */
    public function messages()
    {
        $this->Home_model->show_messages();
    }
    /**
     * post_data method that deals with the posting of a user's new post
     * @return void
     */
    public function post_data()
    {
        // user's post data is sent to the function [user_post_data] from the model [User_model]
        $this->User_model->user_post_data($_SESSION['uid'], $_POST['message']);
        //echo 1;
    }
    /**
     * posts_input_content_view method calls the posts that are to be visible to the user's profile]
     * @return [type] [description]
     */
    public function posts_content()
    {
        $this->Home_model->show_posts_content();
    }
    /**
     * [profile a major functionality that will display the user's content]
     * @return [type] [description]
     */
    public function profile()
    {
        $this->Home_model->show_profile();
    }
    public function profile_specific()
    {
        $this->Home_model->show_profile_specific();
    }
    /**
     * send_link the email verification link is sent to the user's email
     * @return void
     */
    public function send_link()
    {
        $this->Auth_model->send_link_model();
    }
    /**
     * activate_user is the method to activate the user's email, works by changing the activate value to 1
     * @return void
     */
    public function activate_user()
    {
        $this->Auth_model->activate_user_model();
    }
    public function logout()
    {
        $this->Auth_model->logout_model();
    }
}
