<div class="row" id="settingsContent">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <h3>Settings</h3>
      <h4>Here are your updates</h4>
      <center><button class="sideButton" id="settingsButtonClose"><img src="../../assets/images/error.png"></button></center>
    </div>
    <div class="col-lg-3"></div>
</div>
<script>
$("#settingsButtonClose").click(function(){
  $.fn.openContent(4);
});
</script>
