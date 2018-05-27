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
<div style="background:red">
Settings<br>
Logout<br>
<center><button class="side_button" id="settings_button_close"><img src="../../assets/images/error.png"></button></center>
</div>
<!-- closes the settings content and opens up posts content when the close button is clicked as defined in scripts.js -->
<script>
$("#settings_button_close").click(function(){
  $("#settings_content_show").hide();
});
</script>
