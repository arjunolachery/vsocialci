<!-- this is the content for the posts -->
<!-- contains both the posting input area as well as the posts viewer - posts gets loaded to [#posts_viewer] -->
<?php
$num_files_done_2=0;
$num_files_2=0;
 ?>
  <div class="row" id="postsContent">
    <div class="col-lg-3" id="posts_content_left"></div>
    <div class="col-lg-6">
      <br>
      <h3 class="color_theme">What's up, <?php echo $name?>?</h3></br>
      <div class="borderPostInput" style="padding:1em;">
        <br>
        <h4 style="display:inline"><span id="circleDefinition"><button class="side_button" id="circleChangeButton">everyone</button></span>&nbsp;<button class="side_button" id="imageUploadButton"><img src="../../assets/images/photo(1).png"></button></h4><br>
        <div id="circleChangeContent">
          <ul>
            <li>asas</li>
            <li>asas</li>
            <li>asas</li>
          </ul>
          <center><button class="side_button" id="circleChangeClose"><img src="../../assets/images/error.png"></button></center>
        </div>
        <br>
        <div id="userPostTextContainer">
          <div class="row">
            <div class="col-lg-12 textareadivclass"><textarea class="droplinetext" width="100%" name="droplinetext" id="textareamail" placeholder="Type here to post." cols="100%" onclick="openMail()"></textarea></div>
          </div>
          <div class="row fromto">
            <div class="col-lg-12">
              <!--From,<br>arjun--><br><button class="side_button" id="postConfirm"><img src="../../assets/images/check.png"></button><button class="side_button" id="postClose"><img src="../../assets/images/error.png"></button></div>
          </div>
          <div class="row">
            <div class="col-12 fromtoend"></div>
          </div>
        </div>
        <div id="userPostImageContainer">
          <div id="imageUploadWrapper" class="text-center">
            <form action="<?php echo site_url('/upload/do_upload_file_timeline'); ?>" method="POST" class="dropzone" id="my-dropzone-2">
              <div class="fallback">
                <input name="file" type="file" />
                <input type="submit" value="Upload" />
              </div>
            </form>
            <br>
            <!-- dynamic div where the images get loaded once its uploaded so that users can add captions to it-->
            <form id="caption_submit_2">
              <div id="caption_submit_input_2">
              </div>
              <div id="caption_submit_button_2">
              </div>
              <div id="caption_submit_result_2" hidden>
              </div>
            </form>
            <br><br>
          </div>
        </div>
      </div>
      <br><br>
      <table width="100%" id="posts_title">
        <tr>
          <td width="33%" valign="middle">
            <hr class="show showright">
          </td>
          <td width="1%" style="text-align:center;white-space:nowrap;" valign="middle">
            <h4> &nbsp;Top Posts&nbsp;</h4>
          </td>
          <td width="33%" valign="middle">
            <hr class="show showleft">
          </td>
        </tr>
      </table>
      <br>
      <div class="row">
        <div class="col-lg-12" id="posts_viewer">hi</div>
      </div>
    </div>
    <div class="col-lg-3 text-center" id="posts_content_right"><br>
      <!--<h4 style="display:inline">Online<button class="side_button"><img src="../../assets/images/levels.png"></button></h4>--></div>
  </div>
  <script>
    var hostAddress = '<?php echo base_url()?>';
    // script related to circlechanging
    $("#circleChangeContent").hide();
    $("#circleChangeButton").mouseenter(function() {
      $("#circleDefinition").css("text-decoration", "underline");
    });
    $("#circleChangeButton").mouseleave(function() {
      $("#circleDefinition").css("text-decoration", "none");
    });
    $("#circleChangeButton").click(function() {
      $("#circleChangeContent").fadeIn();
    });
    $("#circleChangeClose").click(function() {
      $("#circleChangeContent").hide();
    });
    //code for textarea (adaptive size change)
    $('textarea').each(function() {
      this.setAttribute('style', 'height:' + (this.scrollHeight + 40) + 'px;overflow-y:hidden;');
    }).on('input', function() {
      this.style.height = 'auto';
      this.style.height = (this.scrollHeight) + 'px';
    });
    $(".fromto").hide();
    var count = 0;
    // based on the [#textareamail] events such as focus and focusout, the borders change
    //$(".borderPostInput").css('border-color','white');
    $("#textareamail").focusout(function() {
      $(".borderPostInput").css('border', 'thin solid #ccc');
      $.fn.opacity_background_reduce(0);
    });
    $("#textareamail").focus(function() {
      $(".borderPostInput").css('border', '0.2em solid #0099CC');
      $.fn.opacity_background_reduce(1);
    });
    // when the user starts typing on the textarea of post input, the following things mentioned in the script happen
    $("#textareamail").keypress(function() {
      if (count == 0) {
        $("#textareamail").css("text-align", "left");
        $(".textareadivclass").css("text-align", "left");
        $(".fromto").fadeIn("slow");
        count++;
      }
    });
    //closing of post input when [#postClose] button is pressed
    $("#postClose").click(function() {
      count = 0;
      $(".fromto").hide();
      $("#textareamail").hide();
      $("#textareamail").val('');
      $("#textareamail").css("text-align", "center");
      $(".textareadivclass").css("text-align", "center");
      $(".droplinetext").attr('style', 'height:40px');
      $("#textareamail").fadeIn();
    });
    $.fn.opacity_background_reduce = function(i) {
      var opacity_value = 0.1;
      if (i == 1) {
        $(".borderPostInput").css('opacity', '1');
        $(".main").css("opacity", opacity_value);
        $("#posts_viewer").css("opacity", opacity_value);
        $("#posts_content_left").css("opacity", opacity_value);
        $("#posts_content_right").css("opacity", opacity_value);
        $("#posts_title").css("opacity", opacity_value);
      } else {
        $(".borderPostInput").css('opacity', '1');
        $(".main").css("opacity", '1');
        $("#posts_viewer").css("opacity", '1');
        $("#posts_content_left").css("opacity", '1');
        $("#posts_content_right").css("opacity", '1');
        $("#posts_title").css("opacity", '1');
      }
    }
    // OPTIMIZE: script below can be optimized
    // text posting script when the user presses [#postConfirm]
    $("#postConfirm").click(function() {
      var textPostNotify = "Successfully Posted.";
      var textPostColor = "green";
      var data = $("#textareamail").val();
      $(".droplinetext").attr('style', 'height:40px');
      $(".borderPostInput").css('border', '0.2em solid green');
      $("#posts_viewer").load(hostAddress + "/index.php/user/posts_content");
      $.fn.postData(data);
      count = 0;
      $(".fromto").hide();
      $("#textareamail").hide();
      $("#textareamail").css("color", textPostColor);
      $("#textareamail").val(textPostNotify);
      $("#textareamail").css("text-align", "center");
      $(".textareadivclass").css("text-align", "center");
      $("#textareamail").fadeIn();

      function show_popup() {
        $("#textareamail").hide();
        $("#textareamail").css("color", "black");
        $(".borderPostInput").css('border', 'thin solid #ccc');
        $("#textareamail").val('');
        $("#textareamail").fadeIn();
      };
      window.setTimeout(show_popup, 1500);
    });
    // additional text posting script when the user presses [#postConfirm]
    $.fn.postData = function(data) {
      $.post(hostAddress + "/index.php/user/post_data", {
          message: data
        },
        function(response, status) {
          if (response == 1) {
            textPostNotify = "Successfully Posted.";
            textPostColor = "green";
            $("#posts_viewer").load(hostAddress + "/index.php/user/posts_content");
          } else {
            textPostNotify = "Technical error. Try again.";
            textPostColor = "red";
          }
        });
    };
    //switch between text and image type of posts
    $("#userPostImageContainer").hide();
    var imageButtonSet = 0;
    $("#imageUploadButton").click(function() {
      imageButtonSet = !imageButtonSet;
      if (imageButtonSet) {
        $.fn.changeToPostImage();
      } else {
        $.fn.changeToPostText();
      }
    });
    //to swich between icons (black and white) and (color) depending on state of post input
    //functions to switch between text and image posting
    $.fn.changeToPostImage = function() {
      $("#userPostTextContainer").hide();
      $("#userPostImageContainer").fadeIn();
      $(".borderPostInput").css("background-color", "rgb(237, 237, 237)");
    };
    $.fn.changeToPostText = function() {
      $("#userPostImageContainer").hide();
      $("#userPostTextContainer").fadeIn();
      $(".borderPostInput").css("background-color", "white");
    };
    //load posts into [#posts_viewer] on load of this page
    $("#posts_viewer").load(hostAddress + "/index.php/user/posts_content");
    //dropzone script
    var errors2_2 = false;
    var num_files_2 = 0;
    var num_files_done_2 = 0;
    var set_profile_pic = 0;
    var myDropzone_2 = new Dropzone("#my-dropzone-2", {
      maxFiles: 1,
      init: function() {
        this.on("maxfilesexceeded", function(file) {
          this.removeFile(file);
          alert('max reached');
        });
        this.on("success", function(file, responseText) {
          num_files_done_2++;
          //alert(responseText);
          this.removeAllFiles();
          var profile_pic_name = responseText;
          <?php
        $num_files_done_2=$num_files_done_2+1;
        ?>
          $("#caption_submit_result_2").append(<?php echo $num_files_done_2?>);
          $("#preview" + num_files_done_2).attr('src', "<?php echo base_url().'uploads/'?>" + responseText);
          $("#preview" + num_files_done_2).attr('width', "128px");
          if (num_files_2 == num_files_done_2) {
            $("#submit_button_profile_2").removeAttr("disabled");
            $("#submit_button_profile_2").attr("enabled");
          }
        });
        this.on("addedfile", function(file) {
          num_files_2++;
          $("#caption_submit_input_2").append("<br><br><div class='flex_container' id='pic_show'" + num_files_2 + "><img src='../../assets/images/loading.gif' width='32px' id='preview" + num_files_2 +
            "'>&nbsp;<textarea class='image_caption_input' placeholder='Add a caption' id='pic" + num_files_2 + "'></textarea><span id='options" + num_files_2 + "'></span></div>");
          if (num_files_2 == 1) {
            $("#caption_submit_button_2").append("<br><input type='button' disabled id='submit_button_profile_2' onclick='submit_timeline_pic()' value='Submit'>");
          }
          if (num_files_2 != num_files_done_2) {
            $("#submit_button_profile_2").removeAttr("enabled");
            $("#submit_button_profile_2").attr("disabled");
          }
        });
      },
      error: function(file, errorMessage) {
        errors2_2 = true;
      },
      queuecomplete: function() {
        if (errors2_2) {
          alert("There were errors!");
          errors2_2 = false;
        } else {}
      }
    });
  </script>
