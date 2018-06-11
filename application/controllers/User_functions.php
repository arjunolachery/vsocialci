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
        $this->load->model('Home_model');
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
    /**
     * [update_personal_information pertains to the settings module where on clicking the 'Save Changes' button, the information gets updated]
     * @return void
     */
    public function update_personal_information()
    {
        $this->User_functions_model->update_personal_information_model();
    }
    /**
     * [update_preferences pertains to the settings module where on clicking the toggle buttons, this method is executed to update the new preferences]
     * includes 'Welcome Screen' and 'Auto Login'
     * @return void
     */
    public function update_preferences()
    {
        $this->User_functions_model->update_preferences_model();
    }
    /**
     * [change password pertains to the settings module where on clicking the 'Change Password' button, this method is executed to update the new password]
     * @return void
     */
    public function change_password()
    {
        $this->User_functions_model->change_password_model();
    }
    // TODO: remove the following comment if upload still works
    /*
    public function upload_photo()
    {
        $this->User_functions_model->upload_photo_model();
    }
    */
    /**
     * [caption_profile_update method for updating the caption of the profile picture after uploading it]
     * @return void
     */
    public function caption_profile_update()
    {
        $this->User_functions_model->caption_profile_update_model();
    }
    /**
     * [caption_image_update method for updating the caption of the timeline picture after uploading it]
     * @return void
     */
    public function caption_image_update()
    {
        $this->User_functions_model->caption_image_update_model();
    }
    public function notifications_update()
    {
        echo $this->Home_model->notifications_update_model();
    }
    public function get_amount_notifications()
    {
        echo $this->Home_model->show_notifications_number();
    }
}
