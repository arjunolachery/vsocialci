<?php
/**
 * [Upload the upload controller where all the file uploading is associated to]
 */
   class Upload extends CI_Controller
   {
       public function __construct()
       {
           parent::__construct();
           $this->load->helper(array('form', 'url'));
           $this->load->model('Upload_model');
       }
       // TODO: see if the function below can be removed
       /**
        * [index this was a prototype in the beginning to check if the uploads worked]
        * @return void
        */
       public function index()
       {
           $this->Upload_model->index_model();
       }
       /**
        * [do_upload_file the main controller for the profile picture uploading]
        * @return void
        */
       public function do_upload_file()
       {
           $this->Upload_model->do_upload_file_model();
       }
       /**
        * [do_upload_file_timeline the main controller for the timeline picture uploading]
        * @return void
        */
       public function do_upload_file_timeline()
       {
           $this->Upload_model->do_upload_file_timeline_model();
       }
   }
