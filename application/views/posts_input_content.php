<!-- this is the content for the posts -->
<!-- contains both the posting input area as well as the posts viewer - posts gets loaded to [#posts_viewer] -->
<div class="row" id="postsContent">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <br>
      <div class="borderPostInput" style="padding:1em;">

      <br>
      <h4 style="display:inline"><span id="circleDefinition"><button class="side_button" id="circleChangeButton">everyone</button></span>&nbsp;<button class="side_button" id="imageUploadButton"><img src="../../assets/images/photo.png"></button></h4><br>
      <div id="circleChangeContent"><ul><li>asas</li><li>asas</li><li>asas</li></ul>
      <center><button class="side_button" id="circleChangeClose"><img src="../../assets/images/error.png"></button></center>
      </div>
      <br>

      <div id="userPostTextContainer">

      <div class="row ">
      <div class="col-lg-12 textareadivclass" ><textarea class="droplinetext" width="100%" name="droplinetext" id="textareamail" placeholder="Type here to post." cols="100%" onclick="openMail()"></textarea></input></div>
      </div>

      <div class="row fromto">
      <div class="col-lg-12"><!--From,<br>arjun--><br><button class="side_button" id="postConfirm"><img src="../../assets/images/check.png"></button><button class="side_button" id="postClose"><img src="../../assets/images/error.png"></button></div>
      </div>

      <div class="row">
      <div class="col-12 fromtoend"></div>
      </div>
      </div>
      <div id="userPostImageContainer">
      <div id="imageUploadWrapper" class="text-center">
        <button class="side_button"><img src="<?php echo base_url();?>assets/images/cloud-computing.png"></button>
        <br><br>
      </div>
      </div>
    </div>
      <br><br>


      <div class="row">
      <div class="col-12" id="posts_viewer">hi</div>
      </div>

    </div>
    <div class="col-lg-3 text-center"><br><h4 style="display:inline">Online<button class="side_button"><img src="../../assets/images/levels.png"></button></h4></div>
</div>


<script>
var hostAddress='<?php echo base_url()?>';
// script related to circlechanging
$("#circleChangeContent").hide();
$("#circleChangeButton").mouseenter(function(){
  $("#circleDefinition").css("text-decoration","underline");
});

$("#circleChangeButton").mouseleave(function(){
  $("#circleDefinition").css("text-decoration","none");
});

$("#circleChangeButton").click(function(){
  $("#circleChangeContent").fadeIn();
});

$("#circleChangeClose").click(function(){
  $("#circleChangeContent").hide();
});

//code for textarea (adaptive size change)
$('textarea').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});

  $(".fromto").hide();
  var count=0;
// based on the [#textareamail] events such as focus and focusout, the borders change
$("#textareamail").focusout(function(){
  $(".borderPostInput").css('border-color','rgb(237, 237, 237)');
});
$("#textareamail").focus(function(){
  $(".borderPostInput").css('border-color','#0099CC');
});
// when the user starts typing on the textarea of post input, the following things mentioned in the script happen
$("#textareamail").keypress(function(){
  if(count==0)
  {
    $("#textareamail").css("text-align","left");
    $(".textareadivclass").css("text-align","left");
    $(".fromto").fadeIn("slow");
    count++;
  }
});
//closing of post input when [#postClose] button is pressed
$("#postClose").click(function(){
  count=0;
  $(".fromto").hide();
  $("#textareamail").hide();
  $("#textareamail").val('');
  $("#textareamail").css("text-align","center");
  $(".textareadivclass").css("text-align","center");
  $("#textareamail").fadeIn();
});
// OPTIMIZE: script below can be optimized
// text posting script when the user presses [#postConfirm]
$("#postConfirm").click(function(){
  var textPostNotify="Successfully Posted.";
  var textPostColor="green";
  var data=$("#textareamail").val();
  $(".borderPostInput").css('border-color','green');
  $("#posts_viewer").load(hostAddress+"/index.php/user/posts_content");
  $.fn.postData(data);
  count=0;
  $(".fromto").hide();
  $("#textareamail").hide();
  $("#textareamail").css("color",textPostColor);
  $("#textareamail").val(textPostNotify);
  $("#textareamail").css("text-align","center");
  $(".textareadivclass").css("text-align","center");
  $("#textareamail").fadeIn();
  function show_popup(){
    $("#textareamail").hide();
    $("#textareamail").css("color","black");
    $(".borderPostInput").css('border-color','rgb(237, 237, 237)');
    $("#textareamail").val('');
    $("#textareamail").fadeIn();
   };
   window.setTimeout( show_popup, 1500 );


});

// additional text posting script when the user presses [#postConfirm]
$.fn.postData=function(data){
  $.post(hostAddress+"/index.php/user/post_data",{message:data},
  function(response,status){
  if(response ==1)
  {
    textPostNotify="Successfully Posted.";
    textPostColor="green";
    $("#posts_viewer").load(hostAddress+"/index.php/user/posts_content");
  }
  else {
    textPostNotify="Technical error. Try again.";
    textPostColor="red";
  }
  });
};

//switch between text and image type of posts
$("#userPostImageContainer").hide();
var imageButtonSet=0;
$("#imageUploadButton").click(function(){
  imageButtonSet=!imageButtonSet;
  if(imageButtonSet)
  {
    $("#imageUploadButton").html("<img src='../../assets/images/photo(1).png'>");
    $.fn.changeToPostImage();
  }
  else
  {
    $.fn.changeToPostText();
  }
});

//to swich between icons (black and white) and (color) depending on state of post input
$("#imageUploadButton").hover(function(){
  $("#imageUploadButton").html("<img src='../../assets/images/photo(1).png'>");
});

$("#imageUploadButton").mouseleave(function(){
  if(!imageButtonSet)
  $("#imageUploadButton").html("<img src='../../assets/images/photo.png'>");
});

//functions to switch between text and image posting
$.fn.changeToPostImage=function()
{
  $("#userPostTextContainer").hide();
  $("#userPostImageContainer").fadeIn();
  $(".borderPostInput").css("background-color","rgb(237, 237, 237)");
};
$.fn.changeToPostText=function()
{
  $("#userPostImageContainer").hide();
  $("#userPostTextContainer").fadeIn();
  $(".borderPostInput").css("background-color","white");
};

//drag and drop images scripts
$(".borderPostInput").on('dragenter', function (e){
 //$("#userPostImageContainer").html('dragenter');
});

$("body").on('dragover', function (e){
 e.preventDefault();
 $("#userPostImageContainer").html("<div id='imageUploadWrapper' class='text-center'><button class='side_button'><img src='<?php echo base_url();?>assets/images/cloud-computing.png'></button><br>Drag Here<br></div>");
 $(".borderPostInput").css("border"," dotted black");

});

$(".borderPostInput").on('drop', function (e){
 //$(this).css('background', '#D8F9D3');
 e.preventDefault();
 //var image = e.originalEvent.dataTransfer.files;
 //createFormData(image);
 $("#userPostImageContainer").html('drop');
});

//load posts into [#posts_viewer] on load of this page
$("#posts_viewer").load(hostAddress+"/index.php/user/posts_content");
</script>
