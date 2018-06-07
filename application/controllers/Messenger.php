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
    // TODO: profile method should be renamed to home
    /**
     * profile is the method that is primarily called after the user logs in
     * @return void
     */
    public function retrieve_messages()
    {
      $data['uid']=$this->session->userdata('uid');
      $data['friend_id']=$_POST['friend_id'];
      $data['messages']=$this->Messenger_model->retrieve_messages_model($data['friend_id']);
      //get messages from model
      $this->load->view('messages_box_content',$data);
      # code...
    }
    public function send_message()
    {
      $data['uid']=$this->session->userdata('uid');
      $friend_id=$_POST['friend_id'];
      $messages=$this->Messenger_model->send_message_model($friend_id);
      echo $friend_id;
      # code...
    }
}
