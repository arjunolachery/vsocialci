<?php
/**
 * User_functions the tertiary controller after User that contains methods that are more specific to the user after logging in
 */
class User_functions extends CI_Controller
{
    /**
     * __construct contains base data that can be used for the other methods
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_functions_model');
    }
    /**
     * deletePost deletes the post that the user wishes to delete after pressing the delete icon
     * @return void
     */
    public function deletePost()
    {
        $uid=$this->session->userdata('uid');
        $postid=$this->input->post('postid');
        $this->User_functions_model->deleteUserPost($postid);
    }
}
