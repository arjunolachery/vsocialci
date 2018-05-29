<!-- this is the content for the settings area -->
<!--<div class="row" id="settings_content">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <h3>Settings</h3>
      <h4>Here are your updates</h4>
      <center><button class="side_button" id="settings_button_close"><img src="../../assets/images/error.png"></button></center>
    </div>
    <div class="col-lg-3"></div>
</div>-->
<div class="row">
  <div class="col-lg-3"></div>
  <div class="col-lg-6">
    <br>

    <table width="100%"><tr class="settings_option_title_tr"><td width="1%"><h3 style="display:inline;white-space:nowrap;">Personal Info</h3></td><td width="98%"></td><td width="1%"><div style="display:inline" align="right"><button class="side_button" id="settings_button_actual_close"><img src="../../assets/images/error.png"></button></div></td></tr></table>
    <br>
    <center>

    <table class="settings_table_content" width="100%">
      <tr>
        <td width="10%"></td>
      <td width="25%" style="text-align:right"><span class="settings_sub_title">Email</span></td>
      <td width="10%"></td>
      <td width="45%"><span class="settings_information"><?php echo $retrieved_settings['0']['email'];?></span></td>
      <td width="10%"></td>
    </tr>

    <tr>
      <td width="10%"></td>
    <td width="25%" style="text-align:right"><span class="settings_sub_title">
      Gender
    </span></td>
    <td width="10%"></td>
    <td width="45%"><span class="settings_information">

      <select name="gender" class="gender_select" id="gender_select">
  <option value="M" <?php if ($retrieved_settings['0']['gender']=='M') {
    echo "selected='selected'";
}?> >Male</option>
  <option value="F" <?php if ($retrieved_settings['0']['gender']=='F') {
    echo "selected='selected'";
}?>>Female</option>
</select>

  </td>
    <td width="10%"></td>
  </tr>

  <tr>
    <td width="10%"></td>
  <td width="25%" style="text-align:right"><span class="settings_sub_title">Date of Birth</span></td>
  <td width="10%"></td>
  <td width="45%"><span class="settings_information"><input id="date_birth" type="date" value="<?php echo $retrieved_settings['0']['date_birth'];?>"></span></td>
  <td width="10%"></td>
</tr>
<tr><td colspan="5"><br><center><div id="save_personal_information_container"><button class="btn btn-success save_button" id="save_personal_information">Save Changes</button></div><div id="save_personal_information_container2"></div></center></td></tr>
  </table>
  <br>

</center>

<table width="100%"><tr class="settings_option_title_tr"><td width="1%"><h3 style="display:inline;">Preferences</h3></td><td width="99%"></td></tr></table>
<br>
<center>

  <table class="settings_table_content" cellpadding="200" width="100%">
    <tr>
      <td width="10%"></td>
    <td width="25%" style="text-align:right"><span class="settings_sub_title">Auto Login</span></td>
    <td width="10%"></td>
    <td width="45%"><span class="settings_information" id="auto_login_toggle"><img src='<?php echo base_url().'assets/images/switch-on2.png'?>'></span></td>
    <td width="10%"></td>
  </tr>
  <tr>
    <td width="10%"></td>
  <td width="25%" style="text-align:right"><span class="settings_sub_title">Welcome Screen</span></td>
  <td width="10%"></td>
  <td width="45%"><span class="settings_information" id="welcome_screen_toggle"><img src='<?php echo base_url().'assets/images/switch-on2.png'?>'></span></td>
  <td width="10%"></td>
</tr>

</table>

</center><br><br><br
  </div>
  <div class="col-lg-3"></div>
</div>
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

updateasd();

$("#auto_login_toggle").click(function(){
  select_val=1;

  if(auto_login_val==1)
  {
  $("#auto_login_toggle").html("<img src='<?php echo base_url().'assets/images/switch-off2.png'?>'>");
  auto_login_val=0;
  }
  else
  {
  $("#auto_login_toggle").html("<img src='<?php echo base_url().'assets/images/switch-on2.png'?>'>");
  auto_login_val=1;
  }
  $.fn.update_preferences();
});

$("#welcome_screen_toggle").click(function(){
  select_val=2;
  if(welcome_screen_val==1)
  {
  $("#welcome_screen_toggle").html("<img src='<?php echo base_url().'assets/images/switch-off2.png'?>'>");
  welcome_screen_val=0;
  }
  else
  {
  $("#welcome_screen_toggle").html("<img src='<?php echo base_url().'assets/images/switch-on2.png'?>'>");
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


function updateasd()
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

</script>
