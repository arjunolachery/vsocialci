<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Page</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<? echo base_url();?>/assets/css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/profile.js"></script>
  </head>
  <body>
<div class="row main">
<div class="col-lg-4" style="padding:0.17em 0em 0em 0.4em">vsocial</div>
<div class="col-lg-4 text-center">

        <input type="text" placeholder="Search" name="search" id="searchBar">
    </div>

<div class="col-lg-4 text-right">
  &nbsp;<button class="sideButton" id="messagesButtonOpen"><span class="notifictionsAmountContainer"><img src="../../assets/images/chat.png"><sup class="amountOnIcon"><span class="amountOnIconCss">&nbsp;<span id="messagesAmount">99</span>&nbsp;</span></sup></span></button>
  &nbsp;<button class="sideButton" id="friendRequestsButtonOpen"><span class="notifictionsAmountContainer"><img src="../../assets/images/friend-request.png"><sup class="amountOnIcon"><span class="amountOnIconCss">&nbsp;<span id="friendRequestsAmount">99</span>&nbsp;</span></sup></span></button>
  &nbsp;<button class="sideButton" id="notificationsButtonOpen"><span class="notifictionsAmountContainer"><img src="../../assets/images/notification.png"><sup class="amountOnIcon"><span class="amountOnIconCss">&nbsp;<span id="notificationsAmount">99</span>&nbsp;</span></sup></span></button>
  &nbsp;<button class="sideButton" id="settingsButtonOpen"><img src="../../assets/images/settings.png"></button>
</div>
</div>

</div>

<div id="mainContent">
</div>







  </body>
</html>
