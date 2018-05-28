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

    <table width="100%"><tr><td width="1%"><h3 style="display:inline;white-space:nowrap;">Personal Info</h3></td><td width="98%"><hr class="show showleft"></td><td width="1%"><div style="display:inline" align="right"><button class="side_button" id="settings_button_actual_close"><img src="../../assets/images/error.png"></button></div></td></tr></table>
    <br>
    <center>

    <table class="settings_table_content" cellpadding="200" width="100%">
      <tr>
        <td width="10%"></td>
      <td width="35%" style="text-align:right"><span class="settings_sub_title">Email</span></td>
      <td width="10%"></td>
      <td width="35%"><span class="settings_information"><?php echo $retrieved_settings['0']['email'];?></span></td>
      <td width="10%"></td>
    </tr>

    <tr>
      <td width="10%"></td>
    <td width="35%" style="text-align:right"><span class="settings_sub_title">
      Gender
    </span></td>
    <td width="10%"></td>
    <td width="35%"><span class="settings_information">

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
  <td width="35%" style="text-align:right"><span class="settings_sub_title">Date of Birth</span></td>
  <td width="10%"></td>
  <td width="35%"><span class="settings_information"><input id="date_birth" type="date" value="<?php echo $retrieved_settings['0']['date_birth'];?>"></span></td>
  <td width="10%"></td>
</tr>
<tr><td colspan="5"><br><center><div id="save_personal_information_container"><button class="btn btn-success save_button" id="save_personal_information">Save Changes</button></div></center></td></tr>
  </table>
  <br>

</center>

<table width="100%"><tr><td width="1%"><h3 style="display:inline;">Personalization</h3></td><td width="99%"><hr class="show showleft"></td></tr></table>
<br>
<center>

  <table class="settings_table_content" cellpadding="200" width="100%">
    <tr>
      <td width="10%"></td>
    <td width="35%" style="text-align:right"><span class="settings_sub_title">Auto Log In</span></td>
    <td width="10%"></td>
    <td width="35%"><span class="settings_information"><input type="checkbox" checked class="input_checkbox"></span></td>
    <td width="10%"></td>
  </tr>

</table>

</center>
  </div>
</div>
<!-- closes the settings content and opens up posts content when the close button is clicked as defined in scripts.js -->
<script>
$("#settings_button_actual_close").click(function(){
  $.fn.openContent(4);
});
$("#save_personal_information").click(function(){
  var gender_value=$("#gender_select").val();
  var date_birth=$("#date_birth").val();
  $.post("<?php echo site_url().'/User_functions/update_personal_information';?>",{gender:gender_value,dob:date_birth},
  function(response)
  {
  $("#save_personal_information_container").html("<img src='<?php echo base_url().'assets/images/loading.gif';?>' width='32px'>");
  setTimeout(function () {
    $("#save_personal_information_container").html("<button class='btn btn-success save_button' id='save_personal_information'>Save Changes</button>");
  }, 1000);
  }
);

});
</script>
