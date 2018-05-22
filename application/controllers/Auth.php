<?php
/**
 * [Auth this is the first controller to execute]
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        /**
         * [$this->load->model contains all the database operations]
         * @var [object]
         */
       $this->load->model('Auth_model');
    }
    /**
     * [index the landing page where users can log in to the platform]
     * @return [type] [description]
     */
    public function index()
    {
        //unset all sessionkeys on load
        //
        //set form validation rules for logging in

        if(!($this->session->userdata('error')=='Please login first to view the page'))
        {
          $this->session->unset_userdata('error');
        }
        if(!($this->session->userdata('success')=='You have successfully signed up. Proceed to log in.'))
        {
          $this->session->unset_userdata('success');
        }
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if ($this->form_validation->run()==true) {
            $email=$this->input->post('email');
            $password=md5($this->input->post('password'));
            //check user in db, gets user table array
            $user=$this->Auth_model->retrieveUserPrimaryDetails($email, $password);
            //if user exists
            if ($user) {
                //set session variables and redirect to user controller, profile function after logging in
                $this->session->set_userdata("success", "Welcome,".$user->name);
                $this->session->set_userdata("uid", $user->user_id);
                $this->session->unset_userdata('error');
                $this->session->set_userdata("user_logged", true);
                redirect("user/profile", "refresh");
            } else {
                $this->session->set_userdata("error", "Account does not exist");
                $this->session->unset_userdata('success');
            }
        }
        $this->load->view("login");
    }
    public function register()
    {

      //$this->session->sess_destroy();
        if (isset($_REQUEST)) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passwordconf', 'Confirm Password', 'required|min_length[5]|matches[password]');
            if ($this->form_validation->run()==TRUE) {
                //add user in db

                $data=array(
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'password'=>md5($this->input->post('password')),
                'time'=>time(),
                'activation'=>0,
                'activationKey'=> md5(time().rand(10,100).$_SESSION['userid']),
                );
                if(strchr($this->input->post('email'),"@")!="" && strchr($this->input->post('email'),".")!="")
                {
                  if(!($this->Auth_model->checkUserExist($this->input->post('email'))))
                  {
                  $this->db->insert('users', $data);
                  $this->session->set_userdata("success", "You have successfully signed up. Proceed to log in.");
                  $this->session->unset_userdata('error');
                  redirect("/", "refresh");
                  }
                  else {
                  $this->session->set_userdata("error", "You have already signed up.");
                  }
                }
                else {
                  $this->session->set_userdata("error", "Type in the complete email address");
                }
            }

        }
        //load view
        $this->load->view("register");
    }
}
