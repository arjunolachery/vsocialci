<!-- this is the main profile content where everything else loads into [#mainContent] -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <?php
    if ($profile==1) {
        ?>
  <script src="<?php echo base_url(); ?>assets/js/profile2.js"></script>
      <?php
    } else {
        ?>
<script src="<?php echo base_url(); ?>assets/js/profile.js"></script>
      <?php
    }
     ?>

  </head>
  <body>

<div class="row main">
<div class="col-lg-1"></div>
<div class="col-lg-3" style="padding:0.17em 0em 0em 0.4em"><span>vsocial </span></div>
<div class="col-lg-4" style="padding:0px">

        <div id="searchBar" class="text-center" style="text-align:center;width:100%"><input type="text" placeholder="Search" name="search" id="search_bar_input" autocomplete="off"></div><span id="search_content_show" style="width:33%">
        </span>
    </div>

<div class="col-lg-3 text-right">
  &nbsp;<button class="side_button" id="messagesButtonOpen"><span class="notifictionsAmountContainer"><img src="../../assets/images/speech-bubble2.png"><sup class="amountOnIcon"><span class="amountOnIconCss">&nbsp;<span id="messagesAmount">9</span>&nbsp;</span></sup></span></button>
  &nbsp;<button class="side_button" id="friendRequestsButtonOpen"><span class="notifictionsAmountContainer"><img src="../../assets/images/group-button.png"><sup class="amountOnIcon"><span class="amountOnIconCss">&nbsp;<span id="friendRequestsAmount">9</span>&nbsp;</span></sup></span></button>
  &nbsp;<button class="side_button" id="notificationsButtonOpen"><span class="notifictionsAmountContainer"><img src="../../assets/images/notification.png"><sup class="amountOnIcon"><span class="amountOnIconCss">&nbsp;<span id="notificationsAmount">9</span>&nbsp;</span></sup></span></button>
  &nbsp;<span style="border:thin solid red;"><button class="side_button" id="settingsButtonOpen"><img src="../../assets/images/interface4.png"></button><span id="settings_content_show">hi</span></span>
</div>
<div class="col-lg-1"></div>
</div>

<div id="user_email" style="display:none"><?php echo $email;?></div>
<div id="mainContent">
</div>





<script>
$("#search_bar_input").focus(function(){
  $("#search_bar_input").css("border-bottom","thin solid white");
  $("#search_bar_input").animate({"width":"100%"}, 100);
  //$("#search_bar_input").css('width','100%');
});
$("#search_bar_input").focusout(function(){
  $("#search_bar_input").css("border","none");
  $("#search_bar_input").animate({"width":"40%"}, 100);
  //$("#search_bar_input").css('width','100%');
});
</script>
  </body>
</html>
