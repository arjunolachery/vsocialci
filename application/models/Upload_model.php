<?php
/**
 * [Upload_model The model associated with the Upload controller where the image uploading happens]
 */
class Upload_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_functions_model');
    }
    // TODO: see if the function below can be removed
    /**
     * [index_model this was a prototype in the beginning to check if the uploads worked]
     * @return void
     */
    public function index_model()
    {
        $this->load->view('upload_form', array('error' => ' ' ));
    }
    /**
     * [do_upload_file_model the main model for the profile picture uploading]
     * @return void
     */
    public function do_upload_file_model()
    {
        $uid=$this->session->userdata('uid');
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileName=time().$uid.rand(1, 999).$fileName;
            $this->session->set_userdata('profile_pic_value', $fileName);
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);
            //remove set value on all other profile pictures and add set value for the recently uploaded profile picture
            $remove_status=$this->User_functions_model->remove_set_profile();
            $insert_db=$this->User_functions_model->insert_profile_pic_db($fileName);
            echo $fileName;
        }
    }
    /**
     * [do_upload_file_timeline_model the main model for the timeline picture uploading]
     * @return void
     */
    public function do_upload_file_timeline_model()
    {
        $uid=$this->session->userdata('uid');
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileName=time().$uid.rand(1, 999).$fileName;
            $this->session->set_userdata('profile_pic_value', $fileName);
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);
            //insert into database that the timeline picture has been uploaded as well as the posts table
            $insert_db=$this->User_functions_model->insert_timeline_pic_db($fileName);
            echo $fileName;
        }
    }
}
