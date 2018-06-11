<?php
// the content for notifications
//check all the posts users has posted and find the upvotes
$uid=$this->session->userdata("uid");
$select_posts=$this->db->query("SELECT * FROM posts WHERE u_id=$uid");
$select_posts_id=$select_posts->result_array();
$post_ids='';

$select_checked_on_time_notifications=$this->db->query("SELECT * FROM checked_on WHERE type_checked_on='n' AND u_id=$uid");
$select_checked_on_time_notifications_array=$select_checked_on_time_notifications->result_array();
$time_checked_notifications=$select_checked_on_time_notifications_array[0]['time_checked_on'];

foreach ($select_posts_id as $key) {
    $post_ids=$post_ids.",".$key['id'];
}
$post_ids = ltrim($post_ids, ',');
//echo $post_ids;
//print_r($select_posts_id);
//$matches = implode(',', $select_posts_id[0]);
//echo $matches;
$select_posts_votes=$this->db->query("SELECT * FROM votes WHERE post_id IN ($post_ids) ORDER BY time_vote DESC");
$select_posts_votes_result=$select_posts_votes->result_array();

?>
<div class="row" id="settings_content">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <h3>Notifications</h3>
      <?php
      foreach ($select_posts_votes_result as $key) {
          $uid_voter=$key['u_id'];
          $select_profile_pic=$this->db->query("SELECT * FROM profile_pic,users WHERE profile_pic.set_profile_pic=1 AND profile_pic.u_id=$uid_voter AND users.user_id=$uid_voter");
          $select_profile_pic_array=$select_profile_pic->result_array();
          $profile_pic_link_user=base_url()."uploads/".$select_profile_pic_array[0]['profile_pic_file_name'];
          $user_name=$select_profile_pic_array[0]['name'];
          $email=$select_profile_pic_array[0]['email'];
          $postid=$key['post_id'];

          $select_post=$this->db->query("SELECT * FROM posts WHERE id=$postid");
          $select_post_query=$select_post->result_array();
          //echo "<br><hr><br>";

          $picture_id=$select_post_query[0]['picture_id'];
          if ($picture_id!=0) {
              if (strpos($picture_id, 'p') !== false) {
                  //profile pic
                  $picture_id=substr($picture_id, 0, -1);
                  $sql ="SELECT * FROM profile_pic WHERE id='$picture_id'";
                  $query = $this->db->query($sql);
                  $query_array=$query->result_array();
                  $pic_link=base_url()."uploads/".$query_array[0]['profile_pic_file_name'];
                  $content=$query_array[0]['caption']."<br>"."<img src='".$pic_link."' width='100%'>";

                  $message_type="profile picture";
              } else {
                  //timeline pic
                  $sql ="SELECT * FROM pictures WHERE id='$picture_id'";
                  $query = $this->db->query($sql);
                  $query_array=$query->result_array();
                  $pic_link=base_url()."uploads/".$query_array[0]['pic_file_name'];
                  $content=$query_array[0]['image_caption']."<br>"."<img src='".$pic_link."' width='100%'>";

                  $message_type="timeline picture";
              }
              //picture exists
          //check if picture belongs to profile or timeline by searching for p in pic id
          } else {
              //normal post
              $message_type="recent post";
          }

          $vote_status="upvoted";
          if ($key['val']>0) {
              $vote_status="upvoted";
          } elseif ($key['val']<0) {
              $vote_status="downvoted";
          } else {
              $vote_status="upvoted";
          }


          if ($key['val']>=0) {
              $key['val']="+".$key['val'];
          }
          if ($key['time_vote']>$time_checked_notifications) {
              $new="&nbsp;&nbsp;<span class='friend_new' style='font-size:1em'>new</span>";
          } else {
              $new="";
          }
          //print_r($select_post_query);

          //$posts_query=$this->db->query("SELECT * FROM posts WHERE ")

          //echo "You got votes for post: ".$key['post_id']." from: ".$user_name." with a vote count of: ".$key['val']."<br>";
          echo "<a href='".site_url()."/user/profile?email=".$email."'><div class='flex_container name_friend_list_container'><img src='".$profile_pic_link_user."' width='64px'><div>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='name_friend_list'>".$user_name." ".$vote_status." your ".$message_type." by ".$key['val'].$new."</div></div></a>";
      }
      ?>

      <center><!--<button class="side_button" id="button_close"><img src="<?php echo base_url()?>assets/images/error.png"></button>--></center>
    </div>
  <div class="col-lg-3"></div>
</div>

<!-- closes the notifications content and opens up posts content as defined in scripts.js -->
<script>
$("#button_close").click(function(){
$.fn.openContent(4);
});
</script>
