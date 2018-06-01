<?php
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
if ($linkprofilepic =="download.png") {
    $linkprofilepic="../home/download.png";
}
?>

<!doctype html>
<html lang="en">
<head>
<script src="../../jquery-1.12.4.min.js"></script>
<meta charset="utf-8">
<title>vsocial</title>
<link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fauna+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
table.message {
  background-color: #f5f5f5;
  border:thin solid  #c4c4c4;
  color:grey;
  padding: 3px;
  font-family: 'Raleway', sans-serif;
  font-size:18.5px;
  width:100%;
}
span.logo
    {
        font-size:50px;
        font-family:'Montserrat Alternates', sans-serif;
    }
span.n
    {
        font-family: 'Raleway', sans-serif;
        font-size:20px;
    }
table.total
{
	width:100%;
	border-spacing:0px;
	border-collapse:collapse;
	border:none;
}
.overlay{
    opacity:1;
    background-color:rgb(247, 231, 206);
    position:fixed;
    width:100%;
    height:100%;
    top:0px;
    left:0px;
    z-index:1000;
}
table.head
{
	background-color:rgb(247, 231, 206);
	width:100%;
	border:none;
}
body
{
	padding:0px;
	margin:0px;
	background:#eee;
}
/*button.x,button.u,button.postbutton,button.postimage,.general
{
	transition:all ease 0.5s;
	font-size:15px;
	font-family:'Raleway', sans-serif;
	border: thin solid #666;
	background-color:white;
	color:#666;
	border-radius:5%;
}*/
input.settings
{
	transition:all ease 0.5s;
	font-size:15px;
	font-family:'Raleway', sans-serif;
	border: thin solid #666;
	background-color:white;
	color:#666;
	border-radius:5%;
}
/*button.x:hover,button.u:hover,button.postbutton:hover,input.settings:hover,button.postimage:hover,.general:hover
{
	cursor:pointer;
	border:thin solid black;
	color:black;
}*/
textarea#postcontenthandler
{
	font-size:15px;
	font-family:'Raleway', sans-serif;
	border:thin solid #f5f5f5;
	height:50px;
	grid-rows:100;
	outline:none;
	resize:none;
}
textarea#postcontenthandler:active
{
	border:thin solid #c4c4c4;
	height:50px;

}
div.pointer:hover
{
	cursor:pointer;
}
table.post
{
	width:100%;
}
td.postresult,td.settingsresult,#status
{
	font-size:14px;
	color:green;
	font-family:'Raleway', sans-serif;
	text-align:center;
}
span.postcontent
{
	font-size:14px;
	color:black;
	font-family:'Raleway', sans-serif;
}
span.postname
{
	font-size:12.5px;
	color:grey;
	font-family:'Raleway', sans-serif;
}
span.posttime
{
	font-size:12.5px;
	color:grey;
	font-family:'Raleway', sans-serif;
}
hr
{
	border:thin solid #f5f5f5;
	color:#f5f5f5;
	background-color:#f5f5f5;
}
hr.different
{
	border:thin solid #c4c4c4;
	color:#c4c4c4;
	background-color:#c4c4c4;
}
table.settings,table.innersettings
{
	border:none;
	font-size:15px;
	color:black;
	font-family:'Raleway', sans-serif;
}
span.setheading
{
	font-family: 'Carrois Gothic SC', sans-serif;
	font-size:17px;
}

.g2
{
	font-family: 'Raleway', sans-serif;
    font-size:25px;
}
span.labelhead
{
	font-family: 'Raleway', sans-serif;
    font-size:22px;
	border: thin solid #A0A0A0;
	background-color:#F4F4F4;
	border-radius:5px;
}
span.labelname
{
	font-family: 'Raleway', sans-serif;
    font-size:25px;
	text-decoration:underline;
}
span.label
{
	font-family: 'Raleway', sans-serif;
    font-size:20px;
	color:#999;
}
span.point
{
	font-family: 'Raleway', sans-serif;
    font-size:20px;
	color:black;
}
td.tdline
{
	border-left:thin solid #E2E2E2;
}
.bstop
{
	background:#EFEFEF;
}
#resultmessages
{
  height: 100%;
  max-height: 300px;
  overflow-y: scroll;
}
</style>


<?php
$friendsql="SELECT * FROM friend WHERE (userid='$id' OR friendid='$id') AND status=1";
$friendsqlresult=mysqli_query($conn, $friendsql) or die(mysqli_error($conn));
$list="";
while ($friendsqlrow=mysqli_fetch_array($friendsqlresult)) {
    $zid1=$friendsqlrow['userid'];
    $zid2=$friendsqlrow['friendid'];
    if ($zid1==$id) {
        $list=$list.",".$zid2;

        $zxsql="SELECT name FROM primaryinfo WHERE userid='$zid2'";
        $zxresult = mysqli_query($conn, $zxsql) or die("Error: ".mysqli_error($conn));
        $zxrow = mysqli_fetch_array($zxresult);
        $zid2name=$zxrow[0]; ?>
<script type='text/javascript'>
$(document).ready(function(){
	$('button#friend<?php echo $zid2?>').click(function(){
			var frienduserid=<?php echo $zid2?>;
			$.post('messageboxcall.php', {frienduserid:frienduserid}, function(result){
    		$('#result2').html(result);
		});
});
});
</script>
<?php
    } else {
        $list=$list.",".$zid1;

        $zysql="SELECT name FROM primaryinfo WHERE userid='$zid1'";
        $zyresult = mysqli_query($conn, $zysql) or die("Error: ".mysqli_error($conn));
        $zyrow = mysqli_fetch_array($zyresult);
        $zid1name=$zyrow[0]; ?>
<script type='text/javascript'>
$(document).ready(function(){
	$('button#friend<?php echo $zid1?>').click(function(){
			var frienduserid=<?php echo $zid1?>;
			$.post('messageboxcall.php', {frienduserid:frienduserid}, function(result){
    		$('#result2').html(result);
		});
});
});
</script>
<?php
    }
}
?>

</head>

<body>
<div class="container-responsive">
<div class="row bstop">
<div class="col-xs-12 col-md-3">

<h1 class="text-center d-inline">&nbsp;&nbsp;vsocial <small>{<?php echo $name;?>}</small></h1>


</div>
<div class="col-xs-12 col-md-4"></div>
<div class="col-xs-12 col-md-5 text-center">
<h1><div class="btn-group btn-group-md " role="group" aria-label="...">

  <a href="../home" class="btn btn-primary">Home <span class="glyphicon glyphicon-home"></span></a>
  <a href="../search" class="btn btn-primary">Search <span class="glyphicon glyphicon-search"></span></a>
  <a href="../logout.php" class="btn btn-danger">Logout <span class="glyphicon glyphicon-logout"></span></a>
</div></h1>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-md-9 text-center"><div id='result2'><br><br><br><br><h4>Select a friend to message</h3></div></div>
<div class="col-xs-12 col-md-3 text-center"style="background:#D0D0D0;height:90vh"><br><h4>Your friends</h4>

<div class="btn-group-vertical">
<?php
$friendsql="SELECT * FROM friend WHERE (userid='$id' OR friendid='$id') AND status=1";
$friendsqlresult=mysqli_query($conn, $friendsql) or die(mysqli_error($conn));
$list="";
while ($friendsqlrow=mysqli_fetch_array($friendsqlresult)) {
    $zid1=$friendsqlrow['userid'];
    $zid2=$friendsqlrow['friendid'];
    if ($zid1==$id) {
        $list=$list.",".$zid2;

        $zxsql="SELECT name FROM primaryinfo WHERE userid='$zid2'";
        $zxresult = mysqli_query($conn, $zxsql) or die("Error: ".mysqli_error($conn));
        $zxrow = mysqli_fetch_array($zxresult);
        $zid2name=$zxrow[0]; ?>
<button type="button" class='general btn btn-default' id='friend<?php echo $zid2?>'><?php echo $zid2name ?></button>
<?php
    } else {
        $list=$list.",".$zid1;

        $zysql="SELECT name FROM primaryinfo WHERE userid='$zid1'";
        $zyresult = mysqli_query($conn, $zysql) or die("Error: ".mysqli_error($conn));
        $zyrow = mysqli_fetch_array($zyresult);
        $zid1name=$zyrow[0]; ?>

<button type="button" class='general btn btn-default' id='friend<?php echo $zid1?>'><?php echo $zid1name ?></button>
<?php
    }
}
$list = substr($list, 1);
?>
</div>

</div>
</div>
</div>
