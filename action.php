<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Action For Deleting Rooms</title>
<link rel="stylesheet" type="text/css" href="main1.css" />
</head>
<body>
<?php
require("con1.php");
if(!(isset($_SESSION['un']) && ($_SESSION['ut'])))
{
header("location:index.html");
}
$action=$_GET['action'];
$r=$_GET['head'];
if($action=="delete")
{
$q="delete from room where room_no='$r'";
mysqli_query($con,$q);
echo'<table class="msg2"><tr><td><font color="green">Room is Successfully Deleted!!!</font></td></tr></table>';
header("refresh:10;viewroom.php");
}
?>
<?php
ob_flush();
?>