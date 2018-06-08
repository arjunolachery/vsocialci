<?php
class Votes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function up_vote_model()
    {
        $postid=$_POST['data'];
        $uid=$this->session->userdata('uid');
        $check_vote_result=$this->check_vote();
        //echo $uid.$postid;
        //check if the vote exists
        //if it does, update and increase the vote value,
        //else, proceed to insertion
        if ($check_vote_result=='none') {
            //insert into db
            //echo "Not found in DB";
            $data_insert=array(
              'u_id'=>$uid,
              'post_id'=>$postid,
              'val'=>1,
              'time_vote'=>time()
            );
            $this->db->insert('votes', $data_insert);
        } else {
            //update
            $check_vote_result_updated=$check_vote_result+1;
            $data_vote_result=array(
            'val'=>$check_vote_result_updated,
            'time_vote'=>time()
          );
            $this->db->where('u_id', $uid);
            $this->db->where('post_id', $postid);
            $this->db->update('votes', $data_vote_result);
        }
        echo $this->get_vote_result();
    }
    /**
     * [check_vote returns a 'none' value if not found or the val is displayed]
     * @return [type] [description]
     */
    public function check_vote()
    {
        $postid=$_POST['data'];
        $uid=$this->session->userdata('uid');
        $select_vote=$this->db->query("SELECT * FROM votes WHERE post_id=$postid AND u_id=$uid");
        $select_vote_array=$select_vote->result_array();
        if (empty($select_vote_array)) {
            return 'none';
        } else {
            return $select_vote_array[0]['val'];
        }
    }
    public function get_vote_result()
    {
        $postid=$_POST['data'];
        $select_vote_result=$this->db->query("SELECT * FROM votes WHERE post_id=$postid");
        $select_vote_result_array=$select_vote_result->result_array();
        if (empty($select_vote_result_array)) {
            return 0;
        } else {
            $total_val_2=0;
            foreach ($select_vote_result_array as $key) {
                $total_val_2=$total_val_2+$key['val'];
            }
            return $total_val_2;
        }
    }
}
