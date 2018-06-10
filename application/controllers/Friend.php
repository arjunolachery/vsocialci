<?php
class Friend extends CI_Controller
{
    /**
     * [__construct loads all the data present in this method to all the other methods]
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Friend_model');
        $this->load->model('Home_model');
    }
    public function send_friend_request()
    {
        //insert into db;
        $this->Friend_model->send_friend_request_model();
    }
    public function remove_friend()
    {
        //delete from db;
        $this->Friend_model->remove_friend_model();
    }
    public function accept_friend_request()
    {
        //update status to 1;
        $this->Friend_model->accept_friend_request_model();
        $this->Friend_model->insert_notifications_model();
    }
    public function get_friendship_status()
    {
        $this->Friend_model->get_friendship_status_model();
    }
    public function get_friendship_status_2()
    {
        $this->Friend_model->get_friendship_status_2_model();
    }
    public function get_posts()
    {
        $this->Friend_model->get_posts_model();
    }
    public function get_amount_friends()
    {
        echo $this->Home_model->show_friend_requests_number();
    }
    public function get_amount_messages()
    {
        echo $this->Home_model->show_messages_number();
    }
    public function notification_message_time_update()
    {
        echo $this->Home_model->notification_message_time_update_model();
    }
}
