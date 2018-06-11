<?php
/**
 * [Votes the controller that is associated with the voting scheme of vsocial]
 */
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
    /**
     * [up_vote the function that gets executed on the click of the upvote button on a post]
     * @return [str] [the amount of total votes gets displayed onto the post]
     */
    public function up_vote()
    {
        $this->Votes_model->up_vote_model();
    }
    /**
    * [down_vote the function that gets executed on the click of the downvote button on a post]
    * @return [str] [the amount of total votes gets displayed onto the post]
    */
    public function down_vote()
    {
        $this->Votes_model->down_vote_model();
    }
}
