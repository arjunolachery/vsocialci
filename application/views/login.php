<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Vsocial | Login</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

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
  </head>
  <body>

<div class="col-lg-3"></div>
    <div class="col-lg-6">
      <center><h1>Vsocial | Login</h1></center><br><br>
      <!--<p>Fill in the details to login</p>-->
      <?php if(isset($_SESSION['success']))
      {
        ?><div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

      <?php }
      if(isset($_SESSION['error']))
      {
        ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>

      <?php }
      echo validation_errors("<div class='alert alert-danger'>","</div>");?>
      <form action="" method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" name="email" id="email" type="text">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" name="password" id="password" type="password">
      </div>

      <div>
        <button class="btn btn-primary" name="login">Login</button>
      </div>
    </form>
    <a href="index.php/auth/register">New here? Sign up</a>
    </div>
<div class="col-lg-3"></div>
  </body>
</html>
