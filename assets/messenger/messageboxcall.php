<?php
//messageboxcall.php

$frienduserid=$_POST['frienduserid'];
include '../connection.php';
session_start();
$username=$_SESSION['username'];
if (isset($_SESSION['state'])) {
    $state=$_SESSION['state'];
}
$sql="SELECT userid FROM usera WHERE username='$username'";
$result = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
$row = mysqli_fetch_array($result);
$id=$row[0];
$sql2="SELECT name FROM primaryinfo WHERE userid='$id'";
$result2 = mysqli_query($conn, $sql2) or die("Error: ".mysqli_error($conn));
$row2 = mysqli_fetch_array($result2);
$name=$row2[0];
$sql3="SELECT link FROM profilepic WHERE userid='$id' ORDER BY id DESC LIMIT 1";
$result3 = mysqli_query($conn, $sql3) or die("Error: ".mysqli_error($conn));
$row3 = mysqli_fetch_array($result3);
$linkprofilepic=$row3[0];
if ($linkprofilepic =="") {
    $linkprofilepic="http://vsocial2016.netne.net/uploads/30blank-profile-picture-973460_960_720.png";
}
$sql4="SELECT link FROM profilepic WHERE userid='$frienduserid' ORDER BY id DESC LIMIT 1";
$result4 = mysqli_query($conn, $sql4) or die("Error: ".mysqli_error($conn));
$resultfetch4=mysqli_fetch_array($result4) or die(mysqli_error($conn));

$sql5="SELECT name FROM primaryinfo WHERE userid='$frienduserid'";
$result5=mysqli_query($conn, $sql5) or die(mysqli_error($conn));
$resultfetch5=mysqli_fetch_array($result5);

$sql6="SELECT * FROM message WHERE (userid='$id' AND friendid='$frienduserid') OR (friendid='$id' AND userid='$frienduserid')";
$result6=mysqli_query($conn, $sql6) or die(mysqli_error($conn));

if ($resultfetch4['link']=="download.png") {
    $resultfetch4['link']="../home/download.png";
}
echo
"
<div class='container'>
<div class='row'>
<div class='col-xs-12 col-md-3'>

      <div class='thumbnail'>
        <a href='../user/index.php?target=".$frienduserid."' target='_blank'>
          <img src='".$resultfetch4['link']."' style='width:100%' class='img-responsive'>
          <div class='caption text-center'>
            <p class='lead' style='color:grey'>".$resultfetch5['name']."</p>
          </div>
        </a>
      </div>

</div>
<div class='col-xs-12 col-md-6'><span class='text-center'><h3>Messages</h3></span><br><div id='resultmessages'>";

//messages
while ($rf6=mysqli_fetch_array($result6)) {
    $messageres=$rf6['content'];
    $userid1=$rf6['userid'];
    $friendid1=$rf6['friendid'];
    if ($friendid1==$id) {
        echo"<div class='text-left'>".$messageres."</div>";
    } else {
        echo"<div class='text-right'>".$messageres."</div>";
    }
}

echo"<br><br></div></div>
</div>
<div class='row'>
<div class='col-md-3'></div>
<div class='col-md-6'>


  <input type='text' class='form-control message' id='message' value='' placeholder='Type a message and press enter'>

</div>
</div>
</div>
<br>
";
echo"<script type='text/javascript'>
$('input.message').keypress(function(e) {
    if(e.which == 13) {

		var frienduserid = ".$frienduserid.";
		var message1= $('input.message').val();
        $.post('messagesend.php', {frienduserid:frienduserid,message:message1}, function(resultt){
		$('input.message').val('');
		$('div#resultmessages').html(resultt);
    });
	$('#resultmessages').animate({ scrollTop: $('#resultmessages').prop('scrollHeight')}, 1000);
	}
});
</script>";
