<!-- this is the main profile content where everything else loads into [#mainContent] -->
<?php
//connected to Friend.php and User.php controllers under profile_specific()
?>
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
   <div class="col-lg-12" id="friendship_status_2"></div>
 </div>
</div>

  <div class="col-lg-3"></div>
</div>


</div>
  <div class="col-lg-6"><br><br><br>

<div id="friendship_status">
</div>
<br>
<div id="posts_user">
</div>
<br>
  </div>
  <div class="col-lg-3"></div>
</div>

<?php
$link_send=site_url().'/friend/send_friend_request';
$link_remove=site_url().'/friend/remove_friend';
$link_accept=site_url().'/friend/accept_friend_request';
$link_get_status=site_url().'/friend/get_friendship_status';
$link_get_status_2=site_url().'/friend/get_friendship_status_2';
$link_posts=site_url().'/friend/get_posts';
//$friend_uid;
?>

<script>
get_friendship_status_2();
//get_friendship_status_2();
//get_posts_user();

function send_friend_request(){
//alert('clicked');
$.post("<?php echo $link_send?>",{'friend_id':<?php echo $friend_uid?>},function(data){
  //alert("Data Loaded: "+data);
  get_friendship_status();
});
};

function remove_friend(){
  var r=confirm("Are you sure?");
  if(r==true)
  {
  $.post("<?php echo $link_remove?>",{'friend_id':<?php echo $friend_uid?>},function(data){
    //alert("Data Loaded: "+data);
    get_friendship_status();
    $("#friendship_status_2").html('');
    //remove posts
    $("#posts_user").hide();
  });
}
};

function remove_friend_request(){
  var r=confirm("Are you sure?");
  if(r==true)
  {
  $.post("<?php echo $link_remove?>",{'friend_id':<?php echo $friend_uid?>},function(data){
    //alert("Data Loaded: "+data);
    get_friendship_status();
  });
}
};

function accept_friend_request(){
  //alert('Accept');
  $.post("<?php echo $link_accept?>",{'friend_id':<?php echo $friend_uid?>},function(data){
    get_friendship_status_2();
    $("#friendship_status").html('');
  });
  //load posts
  get_posts_user();
};

//to display accept, remove, add friend request at top
function get_friendship_status(){
$.post("<?php echo $link_get_status?>",{'email':'<?php echo $retrieved_settings[0]['email'];?>'},function(data){
  $("#friendship_status").html("<br><br><br><br>"+data);
});
};

//the decider between 1 and 3
function get_friendship_status_2(){
$.post("<?php echo $link_get_status_2?>",{'email':'<?php echo $retrieved_settings[0]['email'];?>'},function(data){
  if(data!=3)
  {
  get_friendship_status();
  }
  else {
    get_friendship_status_3();
  }
});
};

//to display remove friend on the left side
function get_friendship_status_3(){
$.post("<?php echo $link_get_status?>",{'email':'<?php echo $retrieved_settings[0]['email'];?>'},function(data){
  $("#friendship_status_2").html(data);
  get_posts_user();
});
};

function get_posts_user(){
$.post("<?php echo $link_posts?>",{'email':'<?php echo $retrieved_settings[0]['email'];?>'},function(data){
  $("#posts_user").html(data);
});
};

</script>
