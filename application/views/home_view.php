<!-- this is the main profile content where everything else loads into [#mainContent] -->
<?php
$num_files_done=0;
$num_files=0;
?>
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

<div class="container-fluid" id="height_header_main">
<div class="row main">
<div class="col-lg-1"><img src="../../assets/images/backward-arrow.png" id="back_arrow_image"></div>
<div class="col-lg-3" style="padding:0.17em 0em 0em 0.4em"><span><img src="../../assets/images/logo.png">&nbsp;<img src="<?php echo $profile_pic_file_name?>" width="32px" height="32px" id="top_profile_pic"></span></div>
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
</div>


<div id="user_email" style="display:none"><?php echo $email;?></div>
<div id="top_header_spacing"></div>
<div id="mainContent">
</div>


<div id="notification_pop_up">
<span class="settings_title_theme">Upload an Image
</span><br>
<br>
<h1></h1>


  <form action="<?php echo site_url('/upload/do_upload_file'); ?>" method="POST" class="dropzone" id="my-dropzone">
         <div class="fallback">
             <input name="file" type="file"/>
             <input type="submit" value="Upload" />
         </div>
 </form>
 <br>
 <form id="caption_submit">
   <div id="caption_submit_input">
   </div>
   <div id="caption_submit_button">
   </div>
   <div id="caption_submit_result" hidden>
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
$("#top_header_spacing").height(height_header+15);

$("#back_arrow_image").hide();
/*
history.pushState({id: 'SOMEID'}, '', '');
$(window).bind('popstate', function(){
  window.location.href = window.location.href;
  });
*/

  var errors2 = false;
  var num_files=0;
  var num_files_done=0;
  var set_profile_pic=0;
  var myDropzone = new Dropzone("#my-dropzone" ,
  {
    maxFiles: 10,
    init: function() {
        this.on("success", function(file, responseText) {
            num_files_done++;
            //alert(responseText);
            this.removeAllFiles();
            var profile_pic_name=responseText;
            $("#top_profile_pic").attr("src", "<?php echo base_url().'uploads/'?>"+profile_pic_name);
              $("#setting_side_profile_pic").attr("src", "<?php echo base_url().'uploads/'?>"+profile_pic_name);
              <?php
              $num_files_done=$num_files_done+1;
              ?>
             $("#caption_submit_result").append(<?php echo $num_files_done?>);
             $("#preview"+num_files_done).attr('src',"<?php echo base_url().'uploads/'?>"+responseText);
             $("#preview"+num_files_done).attr('width',"128px");
             //$("#options"+num_files_done).append("&nbsp;<img src='<?php echo base_url().'assets/images/error.png'?>' class='side_button_setting' id='"delete_button"+num_files_done'>");
             if(num_files==num_files_done)
             {
               $("#submit_button_profile").removeAttr("disabled");
               $("#submit_button_profile").attr("enabled");
             }
              });
        this.on("addedfile",function(file){
          num_files++;
          $("#caption_submit_input").append("<br><br><img src='../../assets/images/loading.gif' width='32px' id='preview"+num_files+"'>&nbsp;<input type='text' class='image_caption_input' placeholder='Add a caption' id='pic"+num_files+"'><span id='options"+num_files+"'></span>");
          if(num_files==1)
          {
          $("#caption_submit_button").append("<br><input type='button' disabled id='submit_button_profile' onclick='submit_profile_pic()' value='Submit'>");
        }
        if(num_files != num_files_done)
        {
          $("#submit_button_profile").removeAttr("enabled");
          $("#submit_button_profile").attr("disabled");
        }
      });
      this.on("maxfilesexceeded", function(file) {
        //this.removeFile(file);
        alert('max reached');
      }); },
      error: function(file, errorMessage)
      {
          errors2 = true;
      },
      queuecomplete: function() {
          if(errors2) {
            alert("There were errors!");
            errors2=false;
          }
          else {
            //alert("Done Uploading!");

          }
      }
});


function submit_profile_pic()
{
  //var data;
  var current_data={};
  var value_submit=$("#caption_submit_result").html();
  value_submit=value_submit.length - 4;
  alert(value_submit);
  var i=1;
  for(i=1;i<=value_submit;i++)
  {
    current_data[i-1]=$("#pic"+i).val();
  }
  $.post("<?php echo site_url().'/user_functions/caption_profile_update'?>",{'data_caption':current_data},function(response){
    alert(response);
  });
  //alert(current_data[0]+current_data[1]);
}



var height_notification_pop_up=$(window).height();
$("#notification_pop_up").css("height",height_notification_pop_up-200);
</script>
