<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Action For Deleting Users</title>
<link rel="stylesheet" type="text/css" href="main1.css" />
</head>
 <body>
<body>
<?php
require("con1.php");
if(!(isset($_SESSION['un']) && ($_SESSION['ut'])))
{
header("location:index.html");
}
$action=$_GET['action'];
$u=$_GET['user'];
if($action=="delete")
{
$q="delete from userentry where username='$u'";
mysqli_query($con,$q);
echo '<table class="msg2"><tr><td><font color="green">User Details is Deleted!!!</font></td></tr></table>';
header("refresh:2;viewuser.php");
}
?>
<?php
ob_flush();
?>