<!-- this is the view for the sign up form -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  </head>
  <body>
<div class="col-lg-3"></div>
    <div class="col-lg-6">
      <center><h1>Vsocial | Sign Up</h1><br><br></center>
      <!-- displays success and error messages set in session -->
      <?php if(isset($_SESSION['success']))
      {
        ?><div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

      <?php }

      if(isset($_SESSION['error']))
      {
        ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>

      <?php }

      echo validation_errors("<div class='alert alert-danger'>","</div>");?>
      <!-- the main form and sign up content -->
      <form action="" method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" name="name" id="name" type="text">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" name="email" id="email" type="text">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" name="password" id="password" type="password">
      </div>
      <div class="form-group">
        <label for="passwordconf">Confirm Password:</label>
        <input class="form-control" name="passwordconf" id="passwordconf" type="password">
      </div>
      <div>
        <button class="btn btn-primary" name="register">Register</button>
      </div>
    </form>
    </div>
<div class="col-lg-3"></div>
  </body>
</html>
