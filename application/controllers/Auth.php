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
    }
    /**
     * [index method class where users can log in to the platform]
     * @return [void]
     */
    public function index()
    {
        // session variable error is unset in the beginning only if the message is not 'Please login first to view the page'
        // session variable error could be any of the following values = 'Account does not exist', 'You have already signed up', 'Type in the complete address',
        // 'Please login first to view the page'
        if (!($this->session->userdata('error')=='Please login first to view the page')) {
            $this->session->unset_userdata('error');
        }
        // session variable success is unset in the beginning only if the message is not 'You have successfully signed up. Proceed to log in.'
        // session variable error could be any of the following values = 'You have successfully signed up. Proceed to log in.', 'Welcome, [name]'
        if (!($this->session->userdata('success')=='You have successfully signed up. Proceed to log in.')) {
            $this->session->unset_userdata('success');
        }
        // login form validation rules are defined here
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        // proceed to the following 'if branch' if the user has entered email and password correctly on the login form
        if ($this->form_validation->run()==true) {
            // collect post values of email and password from the login form
            // password is encrypted with md5 php built-in algorithm
            $email    =$this->input->post('email');
            $password =md5($this->input->post('password'));
            // $user stores the values from a specific row of the user table for the logged in user
            $user=$this->Auth_model->retrieve_user_primary_details($email, $password);
            // proceed to the following 'if branch' if the user has been found in the user table after logging in
            if ($user) {
                // set session variables {succcess, uid, user_logged} and unset {error}
                // redirect to user controller, profile method after successfully logging in
                $this->session->set_userdata("success", "Welcome,".$user->name);
                $this->session->set_userdata("uid", $user->user_id);
                $this->session->unset_userdata('error');
                $this->session->set_userdata("user_logged", true);
                redirect("user/home", "refresh");
            }
            // proceed to the following 'else branch' if the user has not been found in the user table after logging in
            else {
                // set session varibles {error} and unset {success}
                $this->session->set_userdata("error", "Account does not exist");
                $this->session->unset_userdata('success');
            }
        }
        // load {login} view into the {index} method of the current controller
        // with the session varibles {success,error,uid,user_logged} that have been set or unset based on the if else conditions
        if ($this->session->userdata('uid')) {
            redirect("user/home", "refresh");
        }
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
            // apply form validation rules to the sign up form
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passwordconf', 'Confirm Password', 'required|min_length[5]|matches[password]');
            // proceed to the following 'if branch' if the user has entered correct sign up details
            if ($this->form_validation->run()==true) {
                // add user sign up details in users table
                $data=array(
                'name'       =>$this->input->post('name'),
                'email'      =>$this->input->post('email'),
                'password'   =>md5($this->input->post('password')),
                'time'       =>time(),
                'activation' =>0,
                );
                // proceed to the following 'if branch' only if the posted email has characters '@' and '.'
                if (strchr($this->input->post('email'), "@")!="" && strchr($this->input->post('email'), ".")!="") {
                    // proceed to the following 'if branch' only if the posted email does not currently exist in the users table
                    if (!($this->Auth_model->checkUserExist($this->input->post('email')))) {
                        // insert sign up data to the users table
                        $this->db->insert('users', $data);
                        // set session variable {success} and unset {error}
                        $this->session->set_userdata("success", "You have successfully signed up. Proceed to log in.");
                        $this->session->unset_userdata('error');
                        // redirect to the index method of the Auth controller since it the default controller
                        redirect("/", "refresh");
                    }
                    // proceed to the following 'else branch' only if the posted email currently exist in the users table
                    else {
                        // set session variable {error} to value 'You have already signed up.'
                        $this->session->set_userdata("error", "You have already signed up.");
                    }
                }
                // proceed to the following 'else branch' only if the posted email does not have characters '@' and '.'
                else {
                    // set session variable {error} to 'Type in the complete email address'
                    $this->session->set_userdata("error", "Type in the complete email address");
                }
            }
        }
        // load [register] view into the [register] method of the current controller
        // with the session varibles {success,error} that have been set or unset based on the if else conditions
        $this->load->view("register_view");
    }
}
