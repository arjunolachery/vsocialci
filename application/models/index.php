<?php
include "../../connection.php";
include "../../visits.php";
?>
<!doctype html>
<html>
<head>
<title>Arjun Olachery</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Crimson+Text|Montserrat|Open+Sans|Roboto:300,500" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">
<!--
font-family: 'Montserrat', sans-serif;
font-family: 'Roboto', sans-serif;
font-family: 'Crimson Text', serif;
-->

  <meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
body
{
  margin:0;
}
.head
{
  padding:1.5%;
  border-bottom:thin solid black;
  background-image: url('../../spiration dark.png');
}
.navbar
{
  border-right:thin solid black;
  border-bottom:thin solid black;
}
.enter {
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid black;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
    background: black;
    color:white;
}
.enter:hover {
    border: 3px solid #555;
    background: white;
    color:black;
}
/*
.headtext
{
  font-size: 2em;
  color:white;
  font-family: 'Montserrat', sans-serif;
}
*/
.headtextdupe
{
  font-size: 2em;
  color:white;
  font-family: 'Montserrat', sans-serif;
}
.headtext2
{
  font-size: 1.7em;
  color:black;
  font-family: 'Montserrat', sans-serif;
}
/*
.tagline
{
  font-size: 1.35em;
  color:black;
  font-family: 'Montserrat', sans-serif;
}
*/
.sidehead
{
  font-size: 1.5em;
}
#contentidenty
{
  padding:2%;
}
body
{
  font-family: 'Montserrat', sans-serif;
}
/*
.texttop
{
  font-size: 1.35em;
  font-weight: bold;
  font-family: 'Roboto:500', sans-serif;
}
*/
/*
.texttopside
{
  font-size: 1em;
  color:white;
  font-weight: bold;
  font-family: 'Montserrat', sans-serif;
}
*/
.texttop2
{
  font-size: 1.15em;
  font-family: 'Roboto:500', sans-serif;
  font-style: italic;
  font-weight: bold;
}
.texttop3
{
  font-size: 1.35em;
  font-family: 'Roboto:500', sans-serif;
}
.textcontent
{
  font-size: 1.35em;
  font-family: 'Crimson Text', serif;
  position: relative;
  left:20px;
}
.textcontent2
{
  font-family: 'Open Sans', sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 2;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    text-align:center;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;

}

.sidenav a:hover{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

div.one:hover
{
  background-color:#E0E0E0;
  border-bottom:none;
  color:black;
}
a:hover
{
  text-decoration:none;
}

.navbutton
{
  border-radius:100%;
  background:none;
  border:none;
  color:white;
}

.navbutton:hover
{
  cursor:pointer;
}
/*
.dots
{
  font-size: 2em;
  color:#D3D3D3;
  text-align:center;
  font-family: 'Jura', sans-serif;
}
*/
.dotOne
{
  color:black;
}
.dotTwo:hover,.dotThree:hover,.dotFour:hover
{
  color:black;
  cursor:pointer;
}
/*
textarea.droplinetext
{
  color:black;
  border:none;
  text-align:center;
  resize:vertical;
  max-width: 300px;
}
*/
textarea.droplinetext:focus
{
  outline: none;
}
.textareadivclass
{
  text-align:center;
}
.fromto
{
  color:#A0A0A0;
}
.fromtobutton
{
  border:thin solid black;
  color:black;
}
.backdrop
{
  background-image: url('../../pics/pic2.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center center;
  width: 100%;
  background-size: cover;
  color:black;
  text-align: center;
}
.textonback
{
  background-color: rgb(0, 0, 0);
  /* RGBa with 0.6 opacity */
  background-color: rgba(255, 255, 255, 1);
  opacity:1;
}





/* Smartphones (portrait) ----------- */
@media only screen
and (max-width : 320px) {
/* STYLES GO HERE */
.headtext
{
  font-size: 0.7em;
  color:white;
  font-family: 'Montserrat', sans-serif;
}
.texttopside
{
  font-size: 0.7em;
  color:white;
  font-weight: bold;
  font-family: 'Montserrat', sans-serif;
}
textarea.droplinetext
{
  color:black;
  border:none;
  text-align:center;
  resize:vertical;
  max-width: 300px;
}
.tagline
{
  font-size: 0.8em;
  color:black;
  font-family: 'Montserrat', sans-serif;
}
.texttop
{
  font-size: 0.8em;
  font-weight: bold;
  font-family: 'Roboto:500', sans-serif;
}
.dots
{
  font-size: 1em;
  color:#D3D3D3;
  text-align:center;
  font-family: 'Jura', sans-serif;
}
.backdrop
{
  font-size:1em;
}
}

/* Smartphones (landscape) ----------- */
@media only screen
and (min-width : 321px) {
/* STYLES GO HERE */
.headtext
{
  font-size: 1em;
  color:white;
  font-family: 'Montserrat', sans-serif;
}
.texttopside,.navbutton
{
  font-size: 0.5em;
  color:white;
  font-weight: bold;
  font-family: 'Montserrat', sans-serif;
}
textarea.droplinetext
{
  color:black;
  border:none;
  text-align:center;
  resize:vertical;
  max-width: 300px;
}
.tagline
{
  font-size: 0.8em;
  color:black;
  font-family: 'Montserrat', sans-serif;
}
.texttop
{
  font-size: 0.8em;
  font-weight: bold;
  font-family: 'Roboto:500', sans-serif;
}
.dots
{
  font-size: 1em;
  color:#D3D3D3;
  text-align:center;
  font-family: 'Jura', sans-serif;
}
.backdrop
{
  font-size:1em;
}
}


/* tablets ----------- */
@media only screen
and (min-width : 768px) {
/* STYLES GO HERE */
.headtext
{
  font-size: 1.5em;
  color:white;
  font-family: 'Montserrat', sans-serif;
}
.texttopside
{
  font-size: 1em;
  color:white;
  font-weight: bold;
  font-family: 'Montserrat', sans-serif;
}
textarea.droplinetext
{
  color:black;
  border:none;
  text-align:center;
  resize:vertical;
  max-width: 600px;
}
.tagline
{
  font-size: 1em;
  color:black;
  font-family: 'Montserrat', sans-serif;
}
.texttop
{
  font-size: 1em;
  font-weight: bold;
  font-family: 'Roboto:500', sans-serif;
}
.dots
{
  font-size: 1em;
  color:#D3D3D3;
  text-align:center;
  font-family: 'Jura', sans-serif;
}
.backdrop
{
  font-size:1.5em;
}
}

/* Desktops and laptops ----------- */
@media only screen
and (min-width : 1224px) {
/* STYLES GO HERE */
.headtext
{
  font-size: 2em;
  color:white;
  font-family: 'Montserrat', sans-serif;
}
textarea.droplinetext
{
  color:black;
  border:none;
  text-align:center;
  resize:vertical;
  max-width: 1000px;
}
.texttopside
{
  font-size: 1em;
  color:white;
  font-weight: bold;
  font-family: 'Montserrat', sans-serif;
}
.tagline
{
  font-size: 1.35em;
  color:black;
  font-family: 'Montserrat', sans-serif;
}
.texttop
{
  font-size: 1.35em;
  font-weight: bold;
  font-family: 'Roboto:500', sans-serif;
}
.dots
{
  font-size: 2em;
  color:#D3D3D3;
  text-align:center;
  font-family: 'Jura', sans-serif;
}
.backdrop
{
  font-size:2em;
}
}

</style>
</head>
<body>



<?php
/*
  $cookie_name="user";
  if (isset($_COOKIE[$cookie_name]))
  {
    echo "<h1>Cookie set</h1>";
  }
  else
  {
    echo "<h1>Cookie not set</h1>";
    //setcookie($cookie_name, $name, time() + (86400 * 365), "/"); // 86400 = 1 day
    //header("Location:showcase");
  }
*/
  ?>

<!--
  <script>
  $(document).ready(function(){
    var click=0;
    var textdirection
      $("#navhider").click(function(){
        if (click==0)
        {
          click=1;
          $('.navbar').hide('slide', {direction: 'left'}, 500);
          $("#contentidenty").addClass("col-10");
          $("#contentidentyside").addClass("col-1");
          $("#contentidenty").removeClass("col-8");
        }
        else {
          click=0;
          $('.navbar').show('slide', {direction: 'left'}, 500);
          $("#contentidenty").removeClass("col-10");
          $("#contentidentyside").removeClass("col-1");
          $("#contentidenty").addClass("col-8");
        }

      });
  })
</script>
-->

  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Home</a>
  <a href="#">Blog</a>
  <a href="#">Projects</a>
  <a href="#">Publications</a>
  <a href="#">About</a>
  <br><br><br>
  <a href="http://arjunolachery.com"><div class="headtextdupe" style="color: grey"><center>AO</center></div></center></a>
</div>

<div class="container-fluid">
  <!--<div class="row head align-items-center">
<div class="col-3"><button class="enter" id="navhider" onclick="openNav()">&#x2630;</button></div>
<div class="col-6"><center><span class="headtext">Arjun Olachery</span></center></div>
<div class="col-3 text-right"></div>
</div>-->
<div class="row" id="navone">
  <div class="col-12 topnav" style="position:fixed;z-index:1">
  <div class="row head align-items-center">
<div class="col-4 "><button class="enter" id="navhider" onclick="openNav()">&#x2630;</button></div>
<div class="col-4 "><center><span class="headtext">Arjun Olachery | Drone</span></center></div>
<div class="col-4 text-right" style="text-align:right"></div>
</div>
</div>
</div>

<div class="row" style="visibility:hidden" >
  <div class="col-12 topnav">
  <div class="row head align-items-center">
<div class="col-4"><button class="enter" id="navhider" onclick="openNav()">&#x2630;</button></div>
<div class="col-4"><center><span class="headtext">Arjun Olachery | Drone</span></center></div>
<div class="col-4 text-right"></div>
</div>
</div>
</div>

<div class="row">
<div class="col-12 backdrop"><br><br><span class="textonback">&nbsp;An Arduino-based drone&nbsp;</span><br><br><br></div>
</div>
<br><br>

<div class="row">
<div class="col-1"></div>
<div class="col-10 content"><span class="texttop" id="positionUse">Begin</span><br>sdasdad<br>sdasd<br>sdasdad<br>sdasd<br>sdasdad<br>sdasd<br>sdasdad<br>sdasd<br>sdasdad<br>sdasd<br>sdasdad<br>sdasd<br>sdasdad<br>sdasd<br>sdasdad<br>sdasd<br>sdasdad<br>sdasd</div>
<div class="col-1"></div>
</div>


<br><br>
<br><br>

<div class="row">
<div class="col-1"></div>
<div class="col-10" id="positionUse2"><span class="texttop">Contact</span></div>
<div class="col-1"></div>
</div>
<br><br>



<div class="row fromto">
<div class="col-1"></div>
<div class="col-10">To Arjun,</div>
<div class="col-1"></div>
</div>

<div class="row">
<div class="col-1"></div>
<div class="col-10 textareadivclass"><textarea class="droplinetext" width="100%" name="droplinetext" id="textareamail" placeholder="Type here to drop a line." cols="100%" onclick="openMail()"></textarea></input></div>
<div class="col-1"></div>
</div>

<div class="row fromto">
<div class="col-1"></div>
<div class="col-10">From,<br><?php echo $_COOKIE['name']?><br><input type="button" class="fromtobutton" value="send >"></div>
<div class="col-1"></div>
</div>

<div class="row">
<div class="col-1"></div>
<div class="col-10 fromtoend"></div>
<div class="col-1"></div>
</div>

<br><br>

<div class="row">
<div class="col-1"></div>
<div class="col-2"><center><a href="http://wwww.facebook.com/arjunolachery"><img src="../001-social-media-4.png"></a></center></div>
<div class="col-2"><center><a href="http://www.github.com/arjunolachery"><img src="../002-social-media-3.png"></a></center></div>
<div class="col-2"><center><a href="mailto:hello@arjunolachery.com"><img src="../003-social-media-2.png"></a></center></div>
<div class="col-2"><center><a href="https://ae.linkedin.com/in/arjun-olachery-16250266"><img src="../004-social-media-1.png"></a></center></div>
<div class="col-2"><center><a href="https://twitter.com/arjunolachery"><img src="../005-social-media.png"></a></center></div>
<div class="col-1"></div>
</div>
<br><br><br><br>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<script>
$(document).ready(function(){
var x = $("#positionUse").position();
var x1 = $("#positionUse1").position();
$('#rightNav').hide();
//$('div.topnav').fadeOut();
$(window).scroll(function () {
var valoff=$('.topnav').height();
    if ($(this).scrollTop() >x.top)
    {
      //alert('hi');
      $('.head').css("padding","0%");
      $('.headtext').html("AO | Drone");
      $('#rightNav').html("<span class='texttopside'><input type='button' class='navbutton' id='navbutton1' onclick='myFunction1()' value= '&lt;'>Top Projects<input type='button' class='navbutton' id='navbutton2' onclick='myFunction2()' value='&gt;'> </span>");
$('#rightNav').fadeIn("slow");
    }
    else {
      $('.head').css("padding","1.5%");
      $('.headtext').html("Arjun Olachery | Drone");
      $('#rightNav').fadeOut("slow");

      }
    if($(this).scrollTop() > x1.top-valoff)
    {
      $('#rightNav').html("<span class='texttopside'><input type='button' class='navbutton' id='navbutton3' onclick='myFunction3()' value='&lt;'> Publications <input type='button' class='navbutton' id='navbutton4' onclick='myFunction4()' value='&gt;'> </span>");
    }

    if($(this).scrollTop() > x1.top+valoff)
    {
      $('#rightNav').html("<span class='texttopside'><input type='button' class='navbutton' id='navbutton5' onclick='myFunction5()' value='&lt;'> Contact </span>");
    }



  });
});
  </script>

  <script>
  var count = 1;
  var notransition=0;
  var firstoff=0;

  function transition() {
  if(count == 1) {
  $('#replaceTitleAuthor').html("<br><br>Development of a Social Networking Service as a Web Application for use in the Education Sector. <br><br>Authors: Arjun Olachery, Saurabh Menon, Prashant Singhai, Swarnalatha P.");
  $('.pubpic').html("<img src='Publication1.png' width='100%'>");
  $('.dotOne').html("1").css("color","black");
  $('.dotTwo').html("o").css("color","#D3D3D3");
  $('.dotThree').html("o").css("color","#D3D3D3");
  $('.dotFour').html("o").css("color","#D3D3D3");
  count = 2;
  }
  else if(count == 2) {
  $('#replaceTitleAuthor').html("<br><br>A Reliable License Plate Detection and Recognition Algorithm for Vehicle Identification in a Traffic Light System.<br><br>Authors: Arjun Olachery");
  $('.pubpic').html("<img src='Publication2.png' width='100%'>");
  $('.dotOne').html("o").css("color","#D3D3D3");
  $('.dotTwo').html("2").css("color","black");
  $('.dotThree').html("o").css("color","#D3D3D3");
  $('.dotFour').html("o").css("color","#D3D3D3");
  count = 3;
  }
  else if(count == 3) {
  $('#replaceTitleAuthor').html("<br><br>Surveying an efficient scheduling algorithm with work stealing for a real time application in a grid system.<br><br>Authors: Arjun Olachery, Saquib Mohd.");
  $('.pubpic').html("<img src='Publication3.png' width='100%'>");
  $('.dotOne').html("o").css("color","#D3D3D3");
  $('.dotTwo').html("o").css("color","#D3D3D3");
  $('.dotThree').html("3").css("color","black");
  $('.dotFour').html("o").css("color","#D3D3D3");
  count = 4;
  }
  else if(count == 4) {
  $('#replaceTitleAuthor').html('<br><br>A Review of Green Computing Concepts at code level and compiler level in Cloud Computing Environments.<br><br>Authors: Arjun Olachery, Rohan Kaushal, Sai Surya, Raj Tamakuwala');
  $('.pubpic').html("<img src='Publication4.png' width='100%'>");
  $('.dotOne').html("o").css("color","#D3D3D3");
  $('.dotTwo').html("o").css("color","#D3D3D3");
  $('.dotThree').html("o").css("color","#D3D3D3");
  $('.dotFour').html("4").css("color","black");
  count = 1;
  }
  }
$(".dotOne").mouseover(function(){
count=1;
transition();
});
$(".dotTwo").mouseover(function(){
count=2;
transition();
});
$(".dotThree").mouseover(function(){
count=3;
transition();
});
$(".dotFour").mouseover(function(){
count=4;
transition();
});

  $(".publicationsHover").mouseover(function(){
    var notransition=1;
    //$("#rightNav").html("<span class='texttopside'>"+notransition+"</span>");
    clearInterval(myVar);
    firstoff++;
});
$(".publicationsHover").mouseout(function(){
  var notransition=0;
  if(firstoff>0)
  {
  //var myVar = setInterval(transition, 1000);
  }
  //$("#rightNav").html("<span class='texttopside'>"+notransition+"</span>");
});
if (firstoff==0)
{
var myVar = setInterval(transition, 1000);
}

  </script>

<script>
$(document).ready(function(){
$('textarea').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});
});
</script>

<script>
$(document).ready(function(){
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
});
</script>

<script>
$(document).ready(function(){
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
      url: "../../entryProcessMessage.php",
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
  });
</script>

<script>
function myFunction1() {
  var valoff=$('.topnav').height();
    $('html, body').animate({
        scrollTop: $("#navone").offset().top -valoff
    }, 500);
}
function myFunction2() {
  var valoff=$('.topnav').height();
    $('html, body').animate({
        scrollTop: $("#positionUse1").offset().top -valoff
    }, 500);
}
function myFunction3() {
  var valoff=$('.topnav').height();
    $('html, body').animate({
        scrollTop: $("#positionUse").offset().top -valoff
    }, 500);
}
function myFunction4() {
  var valoff=$('.topnav').height();
    $('html, body').animate({
        scrollTop: $("#positionUse2").offset().top -valoff
    }, 500);
}
function myFunction5() {
  var valoff=$('.topnav').height();
    $('html, body').animate({
        scrollTop: $("#positionUse1").offset().top -valoff
    }, 500);
}

</script>


</body>
</html>
