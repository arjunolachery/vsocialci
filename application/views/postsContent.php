<div class="row" id="postsContent">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <br>
      <h3 style="display:inline">Posts from <span id="circleDefinition">everyone</span>&nbsp;<button class="sideButton" id="circleChangeButton"><img src="../../assets/images/levels.png"></button></h3><br>
      <div id="circleChangeContent"><ul><li>asas</li><li>asas</li><li>asas</li></ul><br>
      <center><button class="sideButton" id="circleChangeClose"><img src="../../assets/images/error.png"></button></center>
    </div>
      <?php if(isset($_SESSION['success']))
      {
        ?><div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

      <?php } ?>
      Hello, <?php echo $_SESSION['userid']; ?>
    </div>
    <div class="col-lg-3"><br><h3 style="display:inline">Online<button class="sideButton"><img src="../../assets/images/levels.png"></button></h3></div>
</div>
<script>
$("#circleChangeContent").hide();
$("#circleChangeButton").mouseenter(function(){
  $("#circleDefinition").css("text-decoration","underline");
});

$("#circleChangeButton").mouseleave(function(){
  $("#circleDefinition").css("text-decoration","none");
});

$("#circleChangeButton").click(function(){
  $("#circleChangeContent").fadeIn();
});

$("#circleChangeClose").click(function(){
  $("#circleChangeContent").hide();
});
</script>
