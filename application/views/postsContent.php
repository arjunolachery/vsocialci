<div class="row" id="postsContent">
  <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <br>
      <h3 style="display:inline">Posts from <span id="circleDefinition">everyone</span>&nbsp;<button class="sideButton" id="circleChangeButton"><img src="../../assets/images/levels.png"></button></h3><br>
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

    </div>
    <div class="col-lg-3"><br><h3 style="display:inline">Online<button class="sideButton"><img src="../../assets/images/levels.png"></button></h3></div>
</div>
<script>

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
  //alert("hi");
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
  var data=$("#textareamail").val();
  $.fn.postData(data);
  //alert(data);
  count=0;
  $(".fromto").hide();
  $("#textareamail").hide();
  $("#textareamail").css("color","green");
  $("#textareamail").val('Successfully Posted');
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
  alert(data);
}
/*

    $(".fromtobutton").click(function(){
      $.fn.ajaxSubmitFunction();
    });

    $.fn.ajaxSubmitFunction = function(){
      var message = $("#textareamail").val();
      var urlmessage = window.location.href;
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = 'message='+ message +'&urlmessage='+urlmessage;
      if(message=='')
      {
      alert("Please Fill the Field");
      }
      else
      {
        //alert('hello');
      // AJAX Code To Submit Form.
      $.ajax({
      type: "POST",
      url: "entryProcessMessage.php",
      data: dataString,
      cache: false,
      success: function(result){
      //alert(result);
      if(result=='1')
      {
        //$(".fromtoend").html("Thanks!");
        $('#textareamail').prop('readonly', true);
        $("#textareamail").val("Thanks!");
        $("#textareamail").css("text-align","center");
        $(".textareadivclass").css("text-align","center");
        $(".fromto").hide();

      }
      else {
        $('.fromtoend').html("Error"+result);
      }
      }
      });
      }
    };
*/
</script>
