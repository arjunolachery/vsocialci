<!-- this is the content for the settings area -->
<!--<div class="row" id="settings_content">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <span>Settings</span>
      <h4>Here are your updates</h4>
      <center><button class="side_button" id="settings_button_close"><img src="../../assets/images/error.png"></button></center>
    </div>
    <div class="col-lg-3"></div>
</div>-->
<div class="row">
  <div class="col-lg-3">
    <div class="row">
      <div class="col-lg-3"></div>
  <div class="col-lg-6"><br><br><br>
    <br>
    <div class="row back_white">
      <div class="col-lg-12">
     <br><br><center><img id="setting_side_profile_pic" src="<?php echo $profile_pic_file_name?>" style="border:thin solid #ccc;border-radius:100%;" height="128px" width="128px" class="image_user_settings"><br><br><span class="user_name_setting"><?php echo $retrieved_settings['0']['name'];?></span></center><br><br>
   </div>
 </div>
</div>

  <div class="col-lg-3"></div>
</div>
</div>
  <div class="col-lg-6">
    <br>

    <table width="100%"><tr class="settings_option_title_tr"><td class="settings_td settings_td_title" width="1%"><span style="display:inline;white-space:nowrap;" class="settings_title_theme" id="position_upload">Personal Info</span></td><td class="settings_td add_border_settings_tab" width="98%"></td><td class="settings_td add_border_settings_tab" width="1%"><div style="display:inline" align="right"><!--<button class="side_button" id="settings_button_actual_close"><img src="../../assets/images/error.png"></button>--></div></td></tr></table>

    <table class="settings_table_content" width="100%">
      <tr>
        <td colspan="5"><br></td>
      </tr>

      <tr>
        <td class="settings_td" width="10%"></td>
      <td class="settings_td" width="25%" style="text-align:right"><span class="settings_sub_title">Email</span></td>
      <td class="settings_td" width="10%"></td>
      <td class="settings_td" width="45%"><span class="settings_information"><input type="text" readonly value="<?php echo $retrieved_settings['0']['email'];?>"></span></td>
      <td class="settings_td" width="10%"></td>
    </tr>

    <tr>
      <td class="settings_td" width="10%"></td>
    <td class="settings_td" width="25%" style="text-align:right"><span class="settings_sub_title">
      Gender
    </span></td>
    <td class="settings_td" width="10%"></td>
    <td class="settings_td" width="45%"><span class="settings_information">

      <select name="gender" class="gender_select" id="gender_select">
  <option value="M" <?php if ($retrieved_settings['0']['gender']=='M') {
    echo "selected='selected'";
}?> >Male</option>
  <option value="F" <?php if ($retrieved_settings['0']['gender']=='F') {
    echo "selected='selected'";
}?>>Female</option>
</select>

  </td>
    <td class="settings_td" width="10%"></td>
  </tr>

  <tr>
    <td class="settings_td" width="10%"></td>
  <td class="settings_td" width="25%" style="text-align:right"><span class="settings_sub_title">Date of Birth</span></td>
  <td class="settings_td" width="10%"></td>
  <td class="settings_td" width="45%"><span class="settings_information"><input id="date_birth" type="date" value="<?php echo $retrieved_settings['0']['date_birth'];?>"></span></td>
  <td class="settings_td" width="10%"></td>
</tr>
<tr><td class="settings_td" colspan="5"><br><center><div id="save_personal_information_container"><button class="btn btn-success save_button" id="save_personal_information">Save Changes</button></div><div id="save_personal_information_container2"></div></center></td></tr>

<tr>
  <td colspan="5"><br></td>
</tr>

  </table>
  <br>


<table width="100%"><tr class="settings_option_title_tr"><td class="settings_td settings_td_title" width="1%"><span style="display:inline;" class="settings_title_theme">Preferences</span></td><td class="settings_td add_border_settings_tab" width="99%"></td></tr></table>

  <table class="settings_table_content" cellpadding="200" width="100%">

    <tr>
      <td colspan="5"><br></td>
    </tr>

    <tr>
      <td class="settings_td" width="10%"></td>
    <td class="settings_td" width="25%" style="text-align:right"><span class="settings_sub_title">Auto Login</span></td>
    <td class="settings_td" width="10%"></td>
    <td class="settings_td" width="45%"><span class="settings_information" id="auto_login_toggle"><img src='<?php echo base_url().'assets/images/switch-on2.png'?>'></span></td>
    <td class="settings_td" width="10%"></td>
  </tr>
  <tr>
    <td class="settings_td" width="10%"></td>
  <td class="settings_td" width="25%" style="text-align:right"><span class="settings_sub_title">Welcome Screen</span></td>
  <td class="settings_td" width="10%"></td>
  <td class="settings_td" width="45%"><span class="settings_information" id="welcome_screen_toggle"><img src='<?php echo base_url().'assets/images/switch-on2.png'?>'></span></td>
  <td class="settings_td" width="10%"></td>
</tr>

<tr>
  <td colspan="5"><br></td>
</tr>

</table>
<br>

<table width="100%"><tr class="settings_option_title_tr"><td class="settings_td settings_td_title" width="1%" style="white-space: nowrap;"><span style="display:inline;" class="settings_title_theme">Change Password</span></td><td class="settings_td add_border_settings_tab" width="99%"></td></tr></table>

<table class="settings_table_content" cellpadding="200" width="100%">

  <tr>
    <td colspan="5"><br></td>
  </tr>

  <tr>
    <td class="settings_td" width="10%"></td>
  <td class="settings_td" width="25%" style="text-align:right"><span class="settings_sub_title">Current Password</span></td>
  <td class="settings_td" width="10%"></td>
  <td class="settings_td" width="45%"><input type="password" name="current_password" id="current_password" class="input_sub_settings"></td>
  <td class="settings_td" width="10%"></td>
</tr>
<tr>
  <td class="settings_td" width="10%"></td>
<td class="settings_td" width="25%" style="text-align:right"><span class="settings_sub_title">New Password</span></td>
<td class="settings_td" width="10%"></td>
<td class="settings_td" width="45%"><input type="password" name="new_password" id="new_password" class="input_sub_settings"></td>
<td class="settings_td" width="10%"></td>
</tr>
<tr>
  <td class="settings_td" width="10%"></td>
<td class="settings_td" width="25%" style="text-align:right"><span class="settings_sub_title">Confirm New Password</span></td>
<td class="settings_td" width="10%"></td>
<td class="settings_td" width="45%"><input type="password" name="confirm_new_password" id="confirm_new_password" class="input_sub_settings"></td>
<td class="settings_td" width="10%"></td>
</tr>

<tr><td class="settings_td" colspan="5"><br><center><div id="save_password_container"><button class="btn btn-success save_button" id="save_password">Change Password</button></div><div id="save_password_container2"></div></center></td></tr>

<tr>
  <td colspan="5"><br></td>
</tr>

</table>


<br><br><br>
  </div>
  <div class="col-lg-3"></div>
</div>
<div id="image_cover"></div>
<!-- closes the settings content and opens up posts content when the close button is clicked as defined in scripts.js -->
<script>
$("#save_personal_information_container2").hide();
$("#settings_button_actual_close").click(function(){
  $.fn.openContent(4);
});
$("#save_personal_information").click(function(){
  var gender_value=$("#gender_select").val();
  var date_birth=$("#date_birth").val();
  $.post("<?php echo site_url().'/User_functions/update_personal_information';?>",{gender:gender_value,dob:date_birth},
  function(response)
  {
  $("#save_personal_information_container").hide();
  $("#save_personal_information_container2").html("<img src='<?php echo base_url().'assets/images/loading.gif';?>' width='32px'>");
  $("#save_personal_information_container2").show();
  setTimeout(function () {
    if(response==1)
    {
    $("#save_personal_information_container2").html("<img src='<?php echo base_url().'assets/images/checked.png'?>'>");
  }
  else {
    $("#save_personal_information_container2").html("<img src='<?php echo base_url().'assets/images/cancel.png'?>'>");

  }
    //$("#save_personal_information_container").html("<button class='btn btn-success save_button' id='save_personal_information'>Save Changes</button>");
  }, 1000);
  setTimeout(function () {
    $("#save_personal_information_container2").hide();
    $("#save_personal_information_container").fadeIn();
    //$("#save_personal_information_container").html("<button class='btn btn-success save_button' id='save_personal_information'>Save Changes</button>");
  }, 2000);
  }
);

});

var auto_login_val=<?php echo $retrieved_settings['0']['auto_login'];?>;
var welcome_screen_val=<?php echo $retrieved_settings['0']['welcome_screen'];?>;
var select_val=0;

update_initial_buttons();

$("#auto_login_toggle").click(function(){
  select_val=1;
$("#auto_login_toggle").html("<img src='<?php echo base_url().'assets/images/loading.gif';?>' width='32px'>");
setTimeout(function(){
  $("#auto_login_toggle").html("<img src='<?php echo base_url().'assets/images/checked.png'?>'>");
},500);
  if(auto_login_val==1)
  {

  setTimeout(function(){
    $("#auto_login_toggle").hide();
    $("#auto_login_toggle").html("<img src='<?php echo base_url().'assets/images/switch-off2.png'?>'>");
    $("#auto_login_toggle").fadeIn();
  },1000);
  auto_login_val=0;
  }
  else
  {
setTimeout(function(){
  $("#auto_login_toggle").hide();
  $("#auto_login_toggle").html("<img src='<?php echo base_url().'assets/images/switch-on2.png'?>'>");
  $("#auto_login_toggle").fadeIn();
},1000);
  auto_login_val=1;
  }
  $.fn.update_preferences();
});

$("#welcome_screen_toggle").click(function(){
  select_val=2;
  $("#welcome_screen_toggle").html("<img src='<?php echo base_url().'assets/images/loading.gif';?>' width='32px'>");
  setTimeout(function(){
    $("#welcome_screen_toggle").html("<img src='<?php echo base_url().'assets/images/checked.png'?>'>");
  },500);
  if(welcome_screen_val==1)
  {
  setTimeout(function(){
    $("#welcome_screen_toggle").hide();
    $("#welcome_screen_toggle").html("<img src='<?php echo base_url().'assets/images/switch-off2.png'?>'>");
    $("#welcome_screen_toggle").fadeIn();
  },1000);
  welcome_screen_val=0;
  }
  else
  {
  setTimeout(function(){
    $("#welcome_screen_toggle").hide();
    $("#welcome_screen_toggle").html("<img src='<?php echo base_url().'assets/images/switch-on2.png'?>'>");
    $("#welcome_screen_toggle").fadeIn();
  },1000);
  welcome_screen_val=1;
  }
  $.fn.update_preferences();
});

$.fn.update_preferences=function()
{
  $.post("<?php echo site_url()?>/user_functions/update_preferences",{'auto_login_val':auto_login_val,'welcome_screen_val':welcome_screen_val,'select_val':select_val},
function(response)
{

}
)
}


function update_initial_buttons()
{
if(auto_login_val==0)
{
$("#auto_login_toggle").html("<img src='<?php echo base_url().'assets/images/switch-off2.png'?>'>");
}
else
{
$("#auto_login_toggle").html("<img src='<?php echo base_url().'assets/images/switch-on2.png'?>'>");
}
if(welcome_screen_val==0)
{
$("#welcome_screen_toggle").html("<img src='<?php echo base_url().'assets/images/switch-off2.png'?>'>");
}
else
{
$("#welcome_screen_toggle").html("<img src='<?php echo base_url().'assets/images/switch-on2.png'?>'>");
}

}

$('#save_password').click(function(){
  $("#save_password_container").hide();
  $("#save_password_container2").html("<img src='<?php echo base_url().'assets/images/loading.gif';?>' width='32px'>");
  $("#save_password_container2").show();
  $.post("<?php echo site_url()?>/user_functions/change_password",{'current_password':$('#current_password').val(),'new_password':$('#new_password').val(),'confirm_new_password':$('#confirm_new_password').val()},
function(response)
{
  var timedelay=500;
  setTimeout(function () {
    timedelay=2000;
    if(response==1)
    {
    $("#save_password_container2").html("<img src='<?php echo base_url().'assets/images/checked.png'?>'>");
  }
  else {
    $("#save_password_container2").html("<img src='<?php echo base_url().'assets/images/cancel.png'?>'>");
    alert(response);
  }
    //$("#save_personal_information_container").html("<button class='btn btn-success save_button' id='save_personal_information'>Save Changes</button>");
  }, 1000);
  setTimeout(function () {
    $("#save_password_container2").hide();
    $("#save_password_container").fadeIn();
    //$("#save_personal_information_container").html("<button class='btn btn-success save_button' id='save_personal_information'>Save Changes</button>");
  }, 2000);

});
});


setTimeout(function () {
  var image_height=$('.image_user_settings').height();
  var image_width=$('.image_user_settings').width();
  $('#image_cover').css('height',image_height);
  $('#image_cover').css('width',image_width);
  var position_image=$('.image_user_settings').offset();
  position_image_top=position_image.top;
  position_image_left=position_image.left;
  $('#image_cover').offset({ top: position_image_top+1, left: position_image_left+1 });
}, 100);

$('#image_cover').click(function(){
  //$('#image_cover').css('background-position','center');
  change_opacity(0);
  $("#notification_pop_up").fadeIn();
  $('body').css('overflow','hidden');

});

function change_opacity(opacity_value)
{
  if(opacity_value==1)
  {
    opacity_value=1;
    Dropzone.forElement("#my-dropzone").removeAllFiles(true);
    //$('#my-dropzone').removeAllFiles(true);
  }
  else {
   opacity_value=0.1;
   }

  $(".main").css("opacity",opacity_value);
  $("#mainContent").css("opacity",opacity_value);
}

$(document).mouseup(function(e)
{
    var container = $("#notification_pop_up");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        container.hide();
        $('body').css('overflow','auto');
        change_opacity(1);
        $("#caption_submit_input").html('');
        $("#caption_submit_button").html('');
        $("#caption_submit_result").html('');
        num_files=0;
        num_files_done=0;
    }
});

//alert($('.image_user_settings').width());
setTimeout(function () {
  var position_upload_offset=$("#position_upload").offset();
  var window_height=$(window).height();
  window_height/=8;
$("#notification_pop_up").css('position','fixed');
  $("#notification_pop_up").css('top',window_height);
  $("#notification_pop_up").css('left',position_upload_offset.left);
}, 10);





</script>
