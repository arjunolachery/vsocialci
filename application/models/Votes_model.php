<?php
/**
 * [Votes_model the model that is used by the Votes controller to manage the upvoting and downvoting of posts]
 */
class Votes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    /**
     * [up_vote_model contains the database operations that are essential for a successful upvote]
     * @return [str] [the total votes value of a post]
     */
    public function up_vote_model()
    {
      //inputs for the method to work
      $postid=$_POST['data'];
      $uid=$this->session->userdata('uid');
      //check_vote returns a 'none' value if not found or the val of the vote is displayed or 'max', 'min'
        $check_vote_result=$this->check_vote();
        if($check_vote_result=='max')
        {
          //cannot upvote
          echo "(Max) +";
        }
        else
        {
          //can upvote as it's not max (5)
        if ($check_vote_result=='none') {
            //insert into db if the user hasn't given a vote on the post before
            $data_insert=array(
              'u_id'=>$uid,
              'post_id'=>$postid,
              'val'=>1,
              'time_vote'=>time()
            );
            $this->db->insert('votes', $data_insert);
        } else {
            //update val if the record exists
            if($check_vote_result=='min')
            {
              $check_vote_result=-5;
            }
            $check_vote_result_updated=$check_vote_result+1;
            $data_vote_result=array(
            'val'=>$check_vote_result_updated,
            'time_vote'=>time()
          );
            $this->db->where('u_id', $uid);
            $this->db->where('post_id', $postid);
            $this->db->update('votes', $data_vote_result);
        }
      }
      //echo total votes result
        echo $this->get_vote_result();
    }
    /**
     * [down_vote_model contains code that allows the user to down vote the post]
     * @return [str] [the votes of the post]
     */
    public function down_vote_model()
    {
        //inputs for the method to work
        $postid=$_POST['data'];
        $uid=$this->session->userdata('uid');
        //check_vote returns a 'none' value if not found or the val of the vote is displayed or 'max', 'min'
        $check_vote_result=$this->check_vote();

        if($check_vote_result=='min')
        {
          //cannot downvote
          echo "(Min) ";
        }
        else
        {
        //able to downvote
        if ($check_vote_result=='none') {
            //insert into db if record doesn't exist
            $data_insert=array(
              'u_id'=>$uid,
              'post_id'=>$postid,
              'val'=>-1,
              'time_vote'=>time()
            );
            $this->db->insert('votes', $data_insert);
        } else {
            //update val if record exists
            if($check_vote_result=='max')
            {
              $check_vote_result=5;
            }
            $check_vote_result_updated=$check_vote_result-1;
            $data_vote_result=array(
            'val'=>$check_vote_result_updated,
            'time_vote'=>time()
          );
            $this->db->where('u_id', $uid);
            $this->db->where('post_id', $postid);
            $this->db->update('votes', $data_vote_result);
        }
        }
        //echo total votes result
        echo $this->get_vote_result();

    }
    /**
     * [check_vote returns a 'none' value or the val is displayed if the vote done by the user for a specific post is found]
     * used in the beginning of the up_vote,down_vote methods
     * @return [type] [description]
     */
    public function check_vote()
    {
        //inputs for the method to work
        $postid=$_POST['data'];
        $uid=$this->session->userdata('uid');
        //selects the user's vote related to a specific post id
        $select_vote=$this->db->query("SELECT * FROM votes WHERE post_id=$postid AND u_id=$uid");
        $select_vote_array=$select_vote->result_array();
        //max votes is set to +5,-5 per user
        if (empty($select_vote_array)) {
            return 'none';
        } else {
            if($select_vote_array[0]['val']>4)
            {
              return 'max';
            }
            else if($select_vote_array[0]['val']<-4)
            {
              return 'min';
            }
            else {
              return $select_vote_array[0]['val'];
            }
        }
    }
    /**
     * [get_vote_result returns the result of all the votes added up from all users for a specific post ]
     * @return [str] [total votes amount]
     */
    public function get_vote_result()
    {
        //input for the method to work
        $postid=$_POST['data'];
        //selects all votes for a specific post and adds it up to get total value
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
