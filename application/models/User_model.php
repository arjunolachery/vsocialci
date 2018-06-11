<?php
/**
 * [User_model the operations for the User controller exist here]
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Auth_model.php');
        $this->load->model('Auth_model');
    }

    public function check_logged_in()
    {
        // $uid has the user_id from the users table which is set in the session variable uid from the login method
        $uid=$this->session->userdata('uid');
        // OPTIMIZE: user_logged isn't required, just use uid
        // proceed to the following 'if branch' if the user_logged session variable has not been set
        if (!isset($uid)) {
            $data['welcome_screen_enabled']=$this->User_functions_model->check_welcome_screen();

            // set session variable error to value 'Please login first to view this page.'
            // and redirect to login page
            $this->session->set_flashdata("error", "Please login first to view this page.");
            redirect("auth/");
        }
    }

    /**
     * [check_activation_status to check whether the user's email has been activated]
     * @param  [int] $uid [user's id]
     * @return [int]      [1 if activated or 0 if not]
     */
    public function check_activation_status()
    {
        $uid=$this->session->userdata('uid');
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('user_id'=>$uid));
        $query=$this->db->get();
        $user=$query->row();
        if (!empty($user)) {
            $activation_status=$user->activation;
            //proceed to the following 'if branch' if the user's email account has not been verified
            if ($activation_status==0) {
                // set session variable verify_email_message to let the user know to verify the email again.
                $this->session->set_userdata(
                "verify_email_message",
            "<div class='alert alert-danger alert-dismissible fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            Your email hasn't been verified yet. Click <a href='".site_url()."/user/send_link'>here</a> to send again.</div>"
            );
            }
        }
    }

    public function proceed_to_home()
    {
        $data['profile']=false;
        $data['email']='';
        $data['welcome_screen_enabled']=$this->User_functions_model->check_welcome_screen();
        $data['profile_pic_file_name']=$this->User_functions_model->get_profile_pic();
        $this->load->view('home_view.php', $data);
    }

    /**
     * user_post_data posts the user's post into the posts table
     * @param  int $uid      user id
     * @param  text $message post content
     * @return void
     */
    public function user_post_data($uid, $message)
    {
        // executes the posting of user's post data to the posts table
        $data=array(
        'u_id' => $uid,
        'content' => $message,
        'timestamp' => time(),
      );
        $this->db->insert('posts', $data);
        //echo 1 needed to load the post again as soon as its loaded.
        echo 1;
        //return 1;
    }
    /**
     * [retrieve_settings the settings data that is to be retrieved to the home_view]
     * @return [array]      [all the details of the user]
     */
    public function retrieve_settings()
    {
        $uid=$this->session->userdata('uid');
        $user = $this->db->query("SELECT * FROM users,preferences,primary_information WHERE users.user_id='$uid' AND users.user_id = primary_information.u_id AND users.user_id = preferences.u_id");
        return $user->result_array();
    }
    /**
     * [retrieve_settings_friend the data of the friend that is to be retrieved]
     * @param  [int] $uid [the id of the user]
     * @return [array]      [all the details of the user]
     */
    public function retrieve_settings_friend($uid)
    {
        $user = $this->db->query("SELECT * FROM users,preferences,primary_information WHERE users.user_id='$uid' AND users.user_id = primary_information.u_id AND users.user_id = preferences.u_id");
        return $user->result_array();
    }
}
