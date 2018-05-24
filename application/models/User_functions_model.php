<?php
/**
 * [User_functions_model the operations that are used in User_functions controller]
 * these include more specific functions
 */
class User_functions_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * [deleteUserPost is executed whenever the user pressed the delete button]
     * @param  [int] $postid [the unique id of post]
     * @return [void]
     */
    public function deleteUserPost($postid)
    {
        $this->db->where('id', $postid);
        $this->db->delete('posts');
    }
    /**
     * [retrieve_posts posts is retrieved after joining the result from  both tables to get name as well]
     * @return [type] [description]
     */
    public function retrieve_posts()
    {
        $query = $this->db->query('SELECT * FROM users INNER JOIN posts on users.user_id = posts.u_id');
        return $query->result_array();
    }
    public function retrieve_search_results($search_data)
    {
        //return $this->session->userdata('uid').$search_data;
        $query_string="SELECT * FROM users WHERE name LIKE '".$search_data."%' LIMIT 25";
        $query = $this->db->query($query_string);
        return $query->result_array();
    }
}
