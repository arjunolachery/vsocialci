<?php
/**
 * [Auth the first controller to execute when the base_url is visited]
 */
class Auth extends CI_Controller
{
    /**
     * [__construct contains data that are called in all the other methods under Auth class]
     */
    public function __construct()
    {
        parent::__construct();
        /**
        * [$this->load->model('Auth_model') contains database operations related to Auth]
         */
        $this->load->model('Auth_model');
        $this->load->model('Redirect_model');
    }
    /**
     * [index method class where users can log in to the platform]
     * @return [void]
     */
    public function index()
    {

        //[manage_sessions to set, unset and modify various sessions on load of the landing page]
        $this->Auth_model->manage_sessions();
        // login form validation rules are defined in the model method. The result is either 1 or 0 depending on the success of the form validation
        $login_form_validation_result=$this->Auth_model->login_form_validation_result();
        // proceed to the following 'if branch' if the user has entered email and password adhering to the form validation rules as defined in the previous method
        if ($login_form_validation_result==true) {
            //this model collects the user's entered details in the login form and check if the user exists; stored into $user
            $user=$this->Auth_model->retrieve_user_primary_details_from_post($_POST);
            // proceed to the following 'if branch' if the user has been found in the user table after logging in
            if ($user) {
                //sets the success sessions and other session variable changes when the user logs in
                $this->Auth_model->login_protocol($user);
            }
            // proceed to the following 'else branch' if the user has not been found in the user table after logging in
            else {
                //sets the error sessions and other session variable changes when the user's log in fails
                $this->Auth_model->login_protocol_failed();
            }
        }
        //redirect to home module after logging in successfully
        if ($this->session->userdata('uid')) {
            $this->Redirect_model->go_home();
        }
        // load {login} view into the {index} method of the current controller regardless of the login errors or successes
        $this->load->view("login_view");
    }
    /**
     * register method class when the user wants to sign up
     * @return void
     */
    public function register()
    {
        // start the method by first checking for submission of the sign up data
        if (isset($_REQUEST)) {
            // sign up form validation rules are defined in the model method. The result is either 1 or 0 depending on the success of the form validation
            $signup_form_validation_result=$this->Auth_model->signup_form_validation_result();
            // proceed to the following 'if branch' if the user has entered correct sign up details
            if ($signup_form_validation_result==true) {
                //this model collects the user's entered details in the sign up form and proceeds to registering the user
                $user=$this->Auth_model->sign_up($_POST);
            }
        } else {
            echo "ok";
        }
        // load {register} view into the {index} method of the current controller regardless of the signup errors or successes
        $this->load->view("register_view");
    }
}
