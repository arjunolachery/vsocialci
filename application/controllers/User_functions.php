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
        $this->load->helper('form');
        $this->load->helper(array('form', 'url'));
        $this->load->model('User_functions_model');
        $this->load->library('upload');
    }
    /**
     * deletePost deletes the post that the user wishes to delete after pressing the delete icon
     * @return void
     */
    public function deletePost()
    {
        $this->User_functions_model->deletePost_model();
    }
    public function update_personal_information()
    {
        $this->User_functions_model->update_personal_information_model();
    }
    public function update_preferences()
    {
        $this->User_functions_model->update_preferences_model();
    }
    public function change_password()
    {
        $this->User_functions_model->change_password_model();
    }
    public function upload_photo()
    {
        $this->User_functions_model->upload_photo_model();
    }
    public function caption_profile_update()
    {
        $this->User_functions_model->caption_profile_update_model();
    }
}
