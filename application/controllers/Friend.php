<?php
class Friend extends CI_Controller
{
    /**
     * [__construct loads all the data present in this method to all the other methods]
     */
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Auth_model') contains database operations related to Auth controller]
        // $this->load->model('User_model') contains database operations related to User controller]
        $this->load->model('Friend_model');
    }
    // TODO: profile method should be renamed to home
    /**
     * profile is the method that is primarily called after the user logs in
     * @return void
     */
    public function send_friend_request()
    {
      //insert into db;
      $friend_id=$_POST['friend_id'];
      $this->Friend_model->send_friend_request($friend_id);
    }
    public function cancel_friend_request()
    {
      //delete from db;
    }
    public function remove_friend()
    {
      //delete from db;
    }
    public function accept_friend_request()
    {
      //update status to 1;
    }
