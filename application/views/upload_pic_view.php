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

<script>


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
             //$("#options"+num_files_done).append("&nbsp;<button class='side_button_setting'><img src='<?php echo base_url().'assets/images/error.png'?>'></button>");
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
