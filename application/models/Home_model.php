<?php
class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
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
}
