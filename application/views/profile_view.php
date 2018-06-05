<!-- this is the main profile content where everything else loads into [#mainContent] -->



<div class="row">
  <div class="col-lg-3">
    <div class="row">
      <div class="col-lg-3"></div>
  <div class="col-lg-6"><br><br><br>
    <br>
    <div class="row back_white">
      <div class="col-lg-12">
     <br><br><center><img id="setting_side_profile_pic" src="<?php echo $profile_pic_file_name?>" style="border:thin solid #ccc;border-radius:100%;" height="128px" width="128px" class="image_user_settings"><br><br><span class="user_name_setting"><?php echo $retrieved_settings[0]['name'];?></span></center><br><br>
   </div>
 </div>
</div>

  <div class="col-lg-3"></div>
</div>
</div>
  <div class="col-lg-6"><br><br><br>
    <?php
    if(empty($friend))
    {
      $friend_val=0;
      $message="To view the user's posts, add as a friend.";
    }
    else
    {
      if($uid==$friend[0]['u_id'])
      {
        //sent a friend request
        if($friend[0]['status_friend']==0)
        {
          $friend_val=1;
          $message="Friend Request has been sent.";
        }
        else
        {
          $friend_val=2;
          $message="You are friends!";
        }
      }
      else
      {
        //received a friend Request
        if($friend[0]['status_friend']==0)
        {
          $friend_val=3;
          $message="You got a friend request from this user.";
        }
        else
        {
          $friend_val=2;
          $message="You are friends!";
        }
      }
    }
    echo $message.'<br>';

    switch($friend_val)
    {
      case 0:
      echo "<button id='send_friend_request'>Send Friend Request</button>";
      break;

      case 1;
      echo "<button id='cancel_friend_request'>Cancel Friend Request</button>";
      break;

      case 2:
      echo "<button id='remove_friend'>Remove Friend</button>";
      break;

      case 3;
      echo "<button id='accept_friend_request'>Accept Friend Request</button>";
      break;

      default:
      echo "Error";
    }


    //echo $friend[0]['u_id'].$friend[0]['friend_id'].$friend[0]['status_friend'];
    //print_r($friend);
    ?>

    <br>
<br>
  </div>
  <div class="col-lg-3"></div>
</div>

<script>

$("#cancel_friend_request").click(function(){
  alert('Cancel');
});
$("#remove_friend").click(function(){
  alert('Remove');
});
$("#accept_friend_request").click(function(){
  alert('Accept');
});
</script>
