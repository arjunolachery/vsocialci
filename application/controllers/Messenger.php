<?php
class Messenger extends CI_Controller
{
    /**
     * [__construct loads all the data present in this method to all the other methods]
     */
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Auth_model') contains database operations related to Auth controller]
        // $this->load->model('User_model') contains database operations related to User controller]
        //$this->load->model('Friend_model');
        //$this->load->model('User_functions_model');
        $this->load->model('Messenger_model');
    }
    public function retrieve_messages()
    {
        $this->Messenger_model->retrieve_messages_model();
    }
    public function send_message()
    {
        $this->Messenger_model->send_message_model();
    }
}
