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
    <link href="<?php echo base_url(); ?>assets/dropzone/dropzone.css" type="text/css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/dropzone/min/dropzone.min.js"></script>

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
<div class="col-lg-1"><img src="../../assets/images/backward-arrow.png" id="back_arrow_image"></div>
<div class="col-lg-3" style="padding:0.17em 0em 0em 0.4em"><span><img src="../../assets/images/logo.png">&nbsp;<img src="../../assets/images/user.png"></span></div>
<div class="col-lg-4" style="padding:0px">

        <div id="searchBar" class="text-center" style="text-align:center;width:100%"><input type="text" placeholder="Search" name="search" id="search_bar_input" autocomplete="off"></div><span id="search_content_show" style="width:33%">
        </span>
    </div>

<div class="col-lg-3 text-right">
  &nbsp;<button class="side_button" id="messagesButtonOpen"><span class="notifictionsAmountContainer"><img src="../../assets/images/speech-bubble2.png"><sup class="amountOnIcon"><span class="amountOnIconCss">&nbsp;<span id="messagesAmount">9</span>&nbsp;</span></sup></span></button>
  &nbsp;<button class="side_button" id="friendRequestsButtonOpen"><span class="notifictionsAmountContainer"><img src="../../assets/images/group-button.png"><sup class="amountOnIcon"><span class="amountOnIconCss">&nbsp;<span id="friendRequestsAmount">9</span>&nbsp;</span></sup></span></button>
  &nbsp;<button class="side_button" id="notificationsButtonOpen"><span class="notifictionsAmountContainer"><img src="../../assets/images/notification.png"><sup class="amountOnIcon"><span class="amountOnIconCss">&nbsp;<span id="notificationsAmount">9</span>&nbsp;</span></sup></span></button>
  &nbsp;<span id="settings_container"><button class="side_button" id="settingsButtonOpen"><img src="../../assets/images/interface4.png"></button><span id="settings_content_show">hi</span></span>
</div>
<div class="col-lg-1"></div>
</div>


<div id="user_email" style="display:none"><?php echo $email;?></div>
<div id="top_header_spacing"></div>
<div id="mainContent">
</div>


<div id="notification_pop_up">
<h3>Upload an Image
</h3>
<br>
<h1></h1>


  <form action="<?php echo site_url('/upload/do_upload_file'); ?>" method="POST" class="dropzone" id="my-dropzone">
         <div class="fallback">
             <input name="file" type="file"/>
             <input type="submit" value="Upload" />
         </div>
 </form>


<!--
<form id="form1" runat="server">
        <input type='file' id="profile_pic_input" />
        <img id="profile_pic_preview" src="#" alt="your image" />
    </form>-->
</div>




<input type="text" hidden id="welcome_screen_value" value="<?php echo $welcome_screen_enabled;?>">
<script>


$("#search_bar_input").focus(function(){
  $("#search_bar_input").animate({"width":"100%"}, 100);
  //$("#search_bar_input").css('width','100%');
});
$("#search_bar_input").focusout(function(){
  $("#search_bar_input").animate({"width":"40%"}, 100);
  //$("#search_bar_input").css('width','100%');
});
  var height_header=$(".main").height();
$("#top_header_spacing").height(height_header+50);

$("#back_arrow_image").hide();
history.pushState({id: 'SOMEID'}, '', '');
$(window).bind('popstate', function(){
  window.location.href = window.location.href;
  });

/*
  var errors2 = false;

  var myDropzone = new Dropzone("#dropzone" , {
      error: function(file, errorMessage) {
          errors2 = true;
      },
      queuecomplete: function() {
          if(errors2) alert("There were errors!");
          else alert("Done Uploading!");
      }
    });
*/


/*
Dropzone.options.myAwesomeDropzone = {
  accept: function(file, done) {
    console.log("uploaded");
    done();
  },
  init: function() {
    this.on("addedfile", function() {
      if (this.files[1]!=null){
        this.removeFile(this.files[0]);
      }
    });
  }
};
*/




//script for removing extra files from the dropzone, just change the #my-dropzone selector
  new Dropzone("#my-dropzone",
   { maxFiles: 1,
     init: function() {
       this.on("maxfilesexceeded", function(file) {
         this.removeFile(file);
         alert('max reached');
       }); }
     });

</script>
