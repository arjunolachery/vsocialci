<?php
/**
 * [Redirect_model A model that is still in development for implementation of routing based on conditions in the system]
 */
class Redirect_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * [go_home refreshes to the home page]
     * @return void
     */
    public function go_home()
    {
        redirect("user/home", "refresh");
    }
}
