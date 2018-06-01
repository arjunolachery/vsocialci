<?php

   class Upload extends CI_Controller
   {
       public function __construct()
       {
           parent::__construct();
           $this->load->helper(array('form', 'url'));
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
           if (!empty($_FILES)) {
               $tempFile = $_FILES['file']['tmp_name'];
               $fileName = $_FILES['file']['name'];
               $targetPath = getcwd() . '/uploads/';
               $targetFile = $targetPath . $fileName ;
               move_uploaded_file($tempFile, $targetFile);
           }
       }
   }
