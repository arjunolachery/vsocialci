<?php
// the content for private messages
?>
<div class="row" id="settings_content">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <h3>Messages</h3>
      <h4>Here are your messages</h4>
      <center><button class="side_button" id="button_close"><img src="<?php echo base_url()?>assets/images/error.png"></button></center>
    </div>
    <div class="col-lg-3"></div>
</div>

<!-- closes the friend requests content and opens up posts content as defined in scripts.js -->
<script>
$("#button_close").click(function(){
$.fn.openContent(4);
});
</script>
