<?php
class User_functions_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function deleteUserPost($id, $postid)
    {
        //echo 1
        $this->db->where('id', $postid);
        $this->db->delete('posts');
    }
}
