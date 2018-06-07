<?php
   class Upload extends CI_Controller
   {
       public function __construct()
       {
           parent::__construct();
           $this->load->helper(array('form', 'url'));
           $this->load->model('Upload_model');
       }

       public function index()
       {
           $this->Upload_model->index_model();
       }

       public function do_upload_file()
       {
           $this->Upload_model->do_upload_file_model();
       }
   }
