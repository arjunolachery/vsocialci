<?php
/**
 * Auth_model contains database operations that can be used for other controllers and views
 */
class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * [manage_sessions to set, unset and modify various sessions on load of the landing page]
     * @return [void]
     */
    public function manage_sessions()
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
    }
    /**
     * [form_validation_result to run the form validation on the login form]
     * @return [void]
     */
    public function login_form_validation_result()
    {
        // login form validation rules are defined here
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        return $this->form_validation->run();
    }
    /**
     * [retrieve_user_primary_details_from_post retrieves the $email and $password variable data and retrieves the user data]
     * mainly used for checking whether the user exists on logging in
     * @return [Array] [A row data from the users table with the entered user's username and password]
     */
    public function retrieve_user_primary_details_from_post()
    {
        // collect post values of email and password from the login form
        // password is encrypted with md5 php built-in algorithm
        $email    =$this->input->post('email');
        $password =md5($this->input->post('password'));
        //collects the user's details from users table; stored into $user
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email,'password'=>$password));
        $query=$this->db->get();
        $user=$query->row();
        return $user;
    }
    public function login_protocol($user)
    {
        // set session variables {succcess, uid, user_logged} and unset {error}
        // redirect to user controller, profile method after successfully logging in
        $this->session->set_userdata("success", "Welcome,".$user->name);
        $this->session->set_userdata("uid", $user->user_id);
        $this->session->unset_userdata('error');
        $this->session->set_userdata("user_logged", true);
        redirect("user/home", "refresh");
    }
    public function login_protocol_failed()
    {
        // set session varibles {error} and unset {success}
        $this->session->set_userdata("error", "Account does not exist");
        $this->session->unset_userdata('success');
    }
    public function signup_form_validation_result()
    {
        // apply form validation rules to the sign up form
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passwordconf', 'Confirm Password', 'required|min_length[5]|matches[password]');
        return $this->form_validation->run();
    }
    public function sign_up()
    {
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
            if (!($this->checkUserExist($this->input->post('email')))) {
                // insert sign up data to the users table
                $this->db->insert('users', $data);
                //get user id
                $user_details=$this->retrieve_user_email($this->input->post('email'));
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

                $data_checked_on=array(
                  array(
              'u_id'       =>$uid,
              'type_checked_on'      =>'f',
              'time_checked_on'   =>time(),
            ),
            array(
              'u_id'       =>$uid,
              'type_checked_on'      =>'m',
              'time_checked_on'   =>time(),
            )
            );
                $this->db->insert_batch('checked_on', $data_checked_on);

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
        } else {
            // set session variable {error} to 'Type in the complete email address'
            $this->session->set_userdata("error", "Type in the complete email address");
        }
    }

    // TODO: Check if the below code needs to be present or can be optimised

    /**
     * retrieve_user_primary_details retrieves the user data when the $email and $password variable data are passed
     * mainly used for checking whether the user exists on logging in
     * @param  [text] $email    [email of the user]
     * @param  [text] $password [password of the user]
     * @return [void]
     */
    public function retrieve_user_primary_details($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email,'password'=>$password));
        $query=$this->db->get();
        $user=$query->row();
        return $user;
    }
    /**
     * [retrieve_user retrieves data row from user table with uid of the user passed]
     * can be used in many places
     * @param  [int] $uid [user id]
     * @return [void]
     */
    public function retrieve_user($uid)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('user_id'=>$uid));
        $query=$this->db->get();
        $user=$query->row();
        return $user;
    }
    /**
     * [retrieve_user_email retrieves data row from user table with email of the user passed]
     * can be used in many places
     * @param  [int] $uid [user id]
     * @return [void]
     */
    public function retrieve_user_email($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email));
        $query=$this->db->get();
        $user=$query->row();
        return $user;
    }
    /**
     * [checkUserExist used to check if the email exists mainly during the sign up operation]
     * if it exists then the user cannot be able to sign up
     * @param  [text] $email [email submitted during sign up operation]
     * @return [void]
     */
    public function checkUserExist($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email));
        $query=$this->db->get();
        $user=$query->row();
        if (!empty($user)) {
            return $user->email;
        } else {
            return 0;
        }
    }
    /**
     * [send_link_model description]
     * @return [type] [description]
     */
    public function send_link_model()
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
        echo "<script>$('#notification_side_message').html('You changed your profile picture');
        show_notification_side();</script>";
    }
    /**
     * activate_user is the method to activate the user's email, works by changing the activate value to 1
     * @return void
     */
    public function activate_user_model()
    {
        $data=array(
            'activation'=>1,
            'activationTime'=>time(),
          );
        $this->db->where('activationKey', $_REQUEST['key']);
        $this->db->update('users', $data);
        $this->session->set_userdata('verify_email_message', "<div class='alert alert-success alert-dismissible fade in'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        Your email has been verified.</div>");
        redirect(base_url(), "refresh");
    }
    /**
     * [logout_model the logout model associated with the logout method in the Auth controller]
     * @return void
     */
    public function logout_model()
    {
        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('__ci_last_regenerate');
        $this->session->unset_userdata('user_logged');
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('error');
        header('location:'.base_url());
    }
}
