<html>
   <head>
      <title>Upload Form</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/profile.css">
      <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
   </head>
   <body>
      <?php echo $error;?>
      <?php echo form_open_multipart('upload/do_upload');?>

      <form action = "" method = "">
         <input type = "file" name = "userfile" size = "20" />
         <br /><br />
         <input type = "submit" id="submit" value = "upload" />
      </form>

   </body>

</html>
<script>
$('#submit').submit(function(e){
    e.preventDefault();
         $.ajax({
             url:'upload/do_upload',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                  alert(data);
           }
         });
    });
</script>
