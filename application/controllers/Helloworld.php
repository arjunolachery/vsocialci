<?php
    class Helloworld extends CI_Controller{
        function index()
        {
          /*
            $this->load->model('Helloworld_model');

            $data['result'] = $this->Helloworld_model->getData() ;
            $data['page_title'] = "CI Hello World App!";

            $this->load->view('helloworld_view',$data);
          */
          $this->load->view('main');
        }
    }
?>
