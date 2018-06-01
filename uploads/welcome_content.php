<!-- this is the content for the welcome message -->
<div class="row" id="welcomeMessageContent">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <h3>Hey, Arjun!</h3>
      <h4>Thanks for signing up! First of all, welcome to vsocial, a social network that helps you get ahead in every way possible. What you're about to see and experience for a while is vsocial in its initial stages; we have a lot more features to bring forth. Just to give you a heads up, you can edit your profile and post content, for now. Happy vsocializing!</h4>
      <?php echo $this->session->userdata('verify_email_message');?>

      <br><br><center><button class="side_button" id="welcomeMessageClose"><img src="../../assets/images/error.png"></button></center>
    </div>
    <div class="col-lg-3"></div>
</div>
<!-- closes the welcome message content and opens up posts content when the close button is clicked as defined in scripts.js -->
<script>
$("#welcomeMessageClose").click(function(){
$.fn.openContent(4);
});
</script>
