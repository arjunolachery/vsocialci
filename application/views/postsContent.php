<div class="row" id="postsContent">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <br>
      <h4 style="display:inline">Posts from <span id="circleDefinition">everyone</span>&nbsp;<button class="sideButton" id="circleChangeButton"><img src="../../assets/images/levels.png"></button></h4><br>
      <div id="circleChangeContent"><ul><li>asas</li><li>asas</li><li>asas</li></ul>
      <center><button class="sideButton" id="circleChangeClose"><img src="../../assets/images/error.png"></button></center>
    </div>
      <br>


      <div class="row fromto">
      <div class="col-lg-12"><!--To Everyone,--></div>
      </div>

      <div class="row">
      <div class="col-lg-12 textareadivclass"><textarea class="droplinetext" width="100%" name="droplinetext" id="textareamail" placeholder="Type here to post." cols="100%" onclick="openMail()"></textarea></input></div>
      </div>

      <div class="row fromto">
      <div class="col-lg-12"><!--From,<br>arjun--><br><button class="sideButton" id="postConfirm"><img src="../../assets/images/check.png"></button><button class="sideButton" id="postClose"><img src="../../assets/images/error.png"></button></div>
      </div>

      <div class="row">
      <div class="col-12 fromtoend"></div>
      </div>
      <br><hr><br><br>

      <div class="row">
      <div class="col-12" id="postsViewer"></div>
      </div>

    </div>
    <div class="col-lg-3 text-center"><br><h4 style="display:inline">Online<button class="sideButton"><img src="../../assets/images/levels.png"></button></h4></div>
</div>


<script>
var hostAddress=document.location.origin+'/vsocialci';
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

$("#postsBar").keyup(function(){
  alert('hi');
});

//code for textarea
$('textarea').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});

  $(".fromto").hide();
  var count=0;
$("#textareamail").keypress(function(){
  if(count==0)
  {
    $("#textareamail").css("text-align","left");
    $(".textareadivclass").css("text-align","left");
    $(".fromto").fadeIn("slow");
    count++;
  }
});
$("#postClose").click(function(){
  count=0;
  $(".fromto").hide();
  $("#textareamail").hide();
  $("#textareamail").val('');
  $("#textareamail").css("text-align","center");
  $(".textareadivclass").css("text-align","center");
  $("#textareamail").fadeIn();
});

$("#postConfirm").click(function(){
  var textPostNotify="Successfully Posted.";
  var textPostColor="green";
  var data=$("#textareamail").val();
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
    $("#textareamail").val('');
    $("#textareamail").fadeIn();
   };
   window.setTimeout( show_popup, 1500 );


});

$.fn.postData=function(data){
  $.post(hostAddress+"/index.php/user/postdata",{message:data},
  function(response,status){
  if(response ==1)
  {
    textPostNotify="Successfully Posted.";
    textPostColor="green";
    $("#postsViewer").load(hostAddress+"/index.php/user/postscontentview");
  }
  else {
    textPostNotify="Technical error. Try again.";
    textPostColor="red";
  }
  });
};

$("#postsViewer").load(hostAddress+"/index.php/user/postscontentview");
</script>
