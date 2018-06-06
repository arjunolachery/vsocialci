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
 </div>
</div>

  <div class="col-lg-3"></div>
</div>


</div>
  <div class="col-lg-6"><br><br><br>

<div id="friendship_status">
<?php echo $friend_status['message']."<br>".$friend_status['button']?>
</div>
    <br>
<br>
  </div>
  <div class="col-lg-3"></div>
</div>

<?php
$link_send=site_url().'/friend/send_friend_request';
$link_remove=site_url().'/friend/remove_friend';
$link_accept=site_url().'/friend/accept_friend_request';
$link_get_status=site_url().'/friend/get_friendship_status';
//$friend_uid;
?>

<script>
$("#send_friend_request").click(function(){
//alert('clicked');
$.post("<?php echo $link_send?>",{'friend_id':<?php echo $friend_uid?>},function(data){
  //alert("Data Loaded: "+data);
  location.reload();
});
});
$("#remove_friend").click(function(){
  $.post("<?php echo $link_remove?>",{'friend_id':<?php echo $friend_uid?>},function(data){
    //alert("Data Loaded: "+data);
    location.reload();
  });
});
$("#accept_friend_request").click(function(){
  alert('Accept');
  $.post("<?php echo $link_accept?>",{'friend_id':<?php echo $friend_uid?>},function(data){
    alert("Data Loaded: "+data);
    location.reload();
  });
});
/*
$.post("<?php echo $link_get_status?>",{'email':<?php echo $retrieved_settings[0]['email']?>},function(data){
  $("#friendship_status").html(data);
});
*/
</script>
