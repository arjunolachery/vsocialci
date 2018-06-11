<?php
/**
 * [Messenger the controller associated with the Messenger module of the system]
 */
class Messenger extends CI_Controller
{
    /**
     * [__construct loads all the data present in this method to all the other methods]
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Messenger_model');
    }
    /**
     * [retrieve_messages the controller method associated with retrieving the messages between the user and the friend]
     * @return void
     */
    public function retrieve_messages()
    {
        $this->Messenger_model->retrieve_messages_model();
    }
    /**
     * [send_message the controller method for sending messages to the friend from the user]
     * @return void
     */
    public function send_message()
    {
        $this->Messenger_model->send_message_model();
    }
}
