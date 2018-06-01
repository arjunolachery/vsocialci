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
<div id="hide" class="col-lg-8 col-xs-8">
   <label class="hand-cursor">
    <input type="file" nv-file-select uploader="$ctrl.uploader" id="profile_pic_input"/>
    <span class="fa fa-camera"></span>
    <span class="photo_text hidden-xs">Choose from your device</span>
  </label><br>
    <center><span id="load_wait_image"><img src="../../assets/images/loading.gif" width="32px"></span>
     <img id="profile_pic_preview" src="#" alt="" /></center>
</div>
<br>
<h1></h1>
<form action="<?php echo site_url('/upload/do_upload_file'); ?>" class="dropzone">



<!--
<form id="form1" runat="server">
        <input type='file' id="profile_pic_input" />
        <img id="profile_pic_preview" src="#" alt="your image" />
    </form>-->
</div>





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

$("#notification_pop_up").hide();
$("#load_wait_image").hide();

function readURL(input) {
       if (input.files && input.files[0]) {
         $("#load_wait_image").show();
         setTimeout(function () {

           var reader = new FileReader();

           reader.onload = function (e) {
               $('#profile_pic_preview').attr('src', e.target.result);
           }

           reader.readAsDataURL(input.files[0]);

         }, 1000);
          setTimeout(function () {
            $("#load_wait_image").hide();
          }, 500);
       }
   }

   $("#profile_pic_input").change(function(){
       readURL(this);
   });


   $(function () {
                  $('#btn').click(function () {
                    alert('ok');
                      $('.myprogress').css('width', '0');
                      $('.msg').text('');
                      var myfile = $('#userfile').val();
                      alert(myfile);
                      var data = new FormData(document.getElementById("userfile"));
                      //var formData = new FormData( $("#myform")[0] );alert(formData);
                      $('#btn').attr('disabled', 'disabled');
                       $('.msg').text('Uploading in progress...');
                      alert('ok2');
                      $.ajax({
                          //url: '<?php echo site_url()?>/user_functions/upload_photo',
                          url: '<?php echo site_url()?>/upload/do_upload',
                          type: 'POST',
                          data: formData,
                          async : false,
                          cache : false,
                          contentType : false,
                          processData : false,
                          //this part is progress bar
                          xhr: function () {
                            alert('ok xhr');
                              var xhr = new window.XMLHttpRequest();
                              xhr.upload.addEventListener("progress", function (evt) {
                                  if (evt.lengthComputable) {
                                      var percentComplete = evt.loaded / evt.total;
                                      percentComplete = parseInt(percentComplete * 100);
                                      $('.myprogress').text(percentComplete + '%');
                                      $('.myprogress').css('width', percentComplete + '%');
                                  }
                              }, false);
                              return xhr;
                          },
                          success: function (data) {
                              $('.msg').text(data);
                              $('#btn').removeAttr('disabled');
                              alert('done');
                              $('.myprogress').css('width',0 + '%');
                          }
                      });
                  });
              });
              </script>
