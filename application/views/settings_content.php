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
<div id="clickable_settings" class="flex_container clickable_settings">&nbsp;
<img src="../../assets/images/settings.png" style="vertical-align:middle">&nbsp;<span>Settings&nbsp;</span></div>
<div id="clickable_logout" class="flex_container clickable_settings">&nbsp;<img src="../../assets/images/logout.png" style="vertical-align:middle">&nbsp;<span style="color:red">Logout&nbsp;</span></div>
<div id="bottom_dropdown"><center><button class="side_button" id="settings_button_close"><img src="../../assets/images/error.png"></button></center>
</div>
<!-- closes the settings content and opens up posts content when the close button is clicked as defined in scripts.js -->
<script>
$("#settings_button_close").click(function(){
  $("#settings_content_show").hide();
});
$("#clickable_settings").click(function(){
  $("#settings_content_show").hide();
  $.fn.openContent(9);
  //alert('hi');
});
$("#clickable_logout").click(function(){
  var r=confirm("Are you sure?");
  if(r==true)
  {
  $.fn.openContent(11);
  }
  $("#settings_content_show").hide();
  //alert('hi');
});
</script>
