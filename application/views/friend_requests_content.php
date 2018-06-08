<?php
// the content for friend Requests
// NOTE: need to change this to just friends_notifications to include both friend requests and acceptances
?>
<div class="row" id="settings_content">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <h3>Friend Requests</h3>
      <?php
      if(empty($friend_requests))
      {
        echo "You have no new friend requests.";
      }
      else {
        //there are friend Requests
        foreach ($friend_requests as $key) {
          if($key['time_friend']>$checked_on[0]['time_checked_on'])
          {
            echo "<a href='".site_url()."/user/profile?email=".$key['email']."'><div class='flex_container name_friend_list_container_new'><img src='".base_url()."uploads/".$key['profile_pic_file_name']."' width='128px'><div>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='name_friend_list'>".$key['name']."</div><div>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='friend_new'>new</div></div></a>";
          }
          else {
            echo "<a href='".site_url()."/user/profile?email=".$key['email']."'><div class='flex_container name_friend_list_container'><img src='".base_url()."uploads/".$key['profile_pic_file_name']."' width='128px'><div>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='name_friend_list'>".$key['name']."</div></div></a>";
          }
        }
      }
      ?>
      <h3>Friend Acceptances</h3>
      <?php
      if(empty($friend_acceptances))
      {
        echo "You have no new friend acceptances.";
      }
      else {
        //there are friend Requests
        foreach ($friend_acceptances as $key) {
          if($key['time_friend']>$checked_on[0]['time_checked_on'])
          {
            echo "<a href='".site_url()."/user/profile?email=".$key['email']."'><div class='flex_container name_friend_list_container_new'><img src='".base_url()."uploads/".$key['profile_pic_file_name']."' width='128px'><div>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='name_friend_list'>".$key['name']."</div><div>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='friend_new'>new</div></div></a>";
          }
          else {
            echo "<a href='".site_url()."/user/profile?email=".$key['email']."'><div class='flex_container name_friend_list_container'><img src='".base_url()."uploads/".$key['profile_pic_file_name']."' width='128px'><div>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='name_friend_list'>".$key['name']."</div></div></a>";
          }
        }
      }
      ?>
      <center><!--<button class="side_button" id="button_close"><img src="../../assets/images/error.png"></button>--></center>
    </div>
  <div class="col-lg-3"></div>
</div>

<!-- closes the friend requests content and opens up posts content as defined in scripts.js -->
<script>
$("#button_close").click(function(){
  $.fn.openContent(4);
});
</script>
