<?php
class Redirect_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function go_home()
    {
        redirect("user/home", "refresh");
    }
}
