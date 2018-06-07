<?php
class Upload_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_functions_model');
    }
    public function index_model()
    {
        $this->load->view('upload_form', array('error' => ' ' ));
    }
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
            //remove set value on all other profile pictures
            $remove_status=$this->User_functions_model->remove_set_profile();
            $insert_db=$this->User_functions_model->insert_profile_pic_db($fileName);
            echo $fileName;
        }
    }
}
