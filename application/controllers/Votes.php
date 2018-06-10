<?php
class Votes extends CI_Controller
{
    /**
     * [__construct loads all the data present in this method to all the other methods]
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Votes_model');
    }
    public function up_vote()
    {
        $this->Votes_model->up_vote_model();
    }
    public function down_vote()
    {
        $this->Votes_model->down_vote_model();
    }
}
