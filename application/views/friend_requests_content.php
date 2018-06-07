<?php
// the content for friend Requests
// NOTE: need to change this to just friends_notifications to include both friend requests and acceptances
?>
<div class="row" id="settings_content">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <h3>Friend Requests</h3>
      <h4>Here are your friend requests</h4>
      <h3>Friend Acceptances</h3>
      <h4>Here are your friend acceptances</h4>
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
