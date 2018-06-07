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
        $form_validation_result=$this->Auth_model->form_validation_result();
        // proceed to the following 'if branch' if the user has entered email and password adhering to the form validation rules as defined in the previous method
        if ($form_validation_result==true) {
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
                        //get user id
                        $user_details=$this->Auth_model->retrieve_user_email($this->input->post('email'));
                        $uid=$user_details->user_id;
                        //add data to other tables
                        $data_preferences=array(
                        'u_id'       =>$uid,
                        'auto_login'      =>0,
                        'welcome_screen'   =>1,
                        );
                        $this->db->insert('preferences', $data_preferences);

                        $data_primary_information=array(
                        'u_id'       =>$uid,
                        'gender'      =>'-',
                        'date_birth'   =>'yyyy-mm-dd',
                        );
                        $this->db->insert('primary_information', $data_primary_information);

                        $data_profile_pic=array(
                        'u_id'       =>$uid,
                        'profile_pic_file_name'      =>'user128.png',
                        'time_profile_pic'   =>time(),
                        'set_profile_pic'   =>1
                        );
                        $this->db->insert('profile_pic', $data_profile_pic);

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
