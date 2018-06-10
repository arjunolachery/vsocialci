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

$timestamp=time();
$friendid=$_POST['frienduserid'];
$message=$_POST['message'];

if ($message!="") {
    $sql1="INSERT INTO message(userid,friendid,content,timestamp) VALUES ('$id','$friendid','$message','$timestamp')";
    $sql1q=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
}
$sql2="SELECT * FROM message WHERE ((userid='$id' AND friendid='$friendid') OR (friendid='$id' AND userid='$friendid'))";
$sql2rq=mysqli_query($conn, $sql2) or die(mysqli_error($conn));
while ($sql2q=mysqli_fetch_array($sql2rq)) {
    $messageres=$sql2q['content'];
    $userid1=$sql2q['userid'];
    $friendid1=$sql2q['friendid'];
    if ($friendid1==$id) {
        echo"<div class='text-left'>".$messageres."</div>";
    } else {
        echo"<div class='text-right'>".$messageres."</div>";
    }
}
echo "<br>";
