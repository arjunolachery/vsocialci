<?php
/**
 * [Friend the controller that is associated with the friends data]
 * is mostly used whenever the user clicks on another user and the friends controller is executed.
 */
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
    /**
     * [send_friend_request this method is executed whenever the user clicks on the send friend request button]
     * @return void
     */
    public function send_friend_request()
    {
        //insert into db;
        $this->Friend_model->send_friend_request_model();
    }
    /**
     * [remove_friend this method is executed whenever the user clicks on the remove friend button]
     * @return void
     */
    public function remove_friend()
    {
        //delete from db;
        $this->Friend_model->remove_friend_model();
    }
    /**
     * [accept_friend_request this method is executed whenever the user clicks on the accept friend button]
     * @return void
     */
    public function accept_friend_request()
    {
        //update status to 1;
        $this->Friend_model->accept_friend_request_model();
        //two (perhaps more in the future) data rows are inserted into checked_on table where each one corresponds to the time the user has seen the other user's messages
        $this->Friend_model->insert_notifications_model();
    }
    /**
     * [get_friendship_status the method that checks for the friendship status between the logged in user and the other user]
     * @return void
     */
    public function get_friendship_status()
    {
        $this->Friend_model->get_friendship_status_model();
    }
    /**
     * [get_friendship_status_2 the method that checks for the friendship status between the logged in user and the other user]
     * @return void
     */
    public function get_friendship_status_2()
    {
        $this->Friend_model->get_friendship_status_2_model();
    }
    /**
     * [get_posts the method that retrieves the posts whenever the profile of the friend is visited]
     * @return void
     */
    public function get_posts()
    {
        $this->Friend_model->get_posts_model();
    }
    // TODO: The below methods can be moved to another controlled perhaps with the name, notifications
    /**
     * [get_amount_friends the method that retrieves the number of new friend requests]
     * @return void
     */
    public function get_amount_friends()
    {
        echo $this->Home_model->show_friend_requests_number();
    }
    /**
     * [get_amount_messages the method that retrieves the number of new chats]
     * @return void
     */
    public function get_amount_messages()
    {
        echo $this->Home_model->show_messages_number();
    }
    /**
     * [notification_message_time_update the method that updates the time of a checked_on row whenever the user select a friend to chat with]
     * @return void
     */
    public function notification_message_time_update()
    {
        echo $this->Home_model->notification_message_time_update_model();
    }
}
