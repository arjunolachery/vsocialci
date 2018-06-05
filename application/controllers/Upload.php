<?php

   class Upload extends CI_Controller
   {
       public function __construct()
       {
           parent::__construct();
           $this->load->helper(array('form', 'url'));
           $this->load->model('User_functions_model');
       }

       public function index()
       {
           $this->load->view('upload_form', array('error' => ' ' ));
       }

       public function do_upload_file()
       {
           /*$config['upload_path']   = './uploads/';
           $config['allowed_types'] = 'gif|jpg|png';
           $config['max_size']      = 10000000;
           $config['max_width']     = 10240;
           $config['max_height']    = 76800;
           $this->upload->initialize($config);

           if ( ! $this->upload->do_upload('userfile')) {
              $error = array('error' => $this->upload->display_errors());
              echo $config['upload_path'];
              $this->load->view('upload_form', $error);
           }

           else {
              $data = array('upload_data' => $this->upload->data());
              $this->load->view('upload_success', $data);
           }
           */

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
