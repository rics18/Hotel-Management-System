<?php
session_start();
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nettech International Hotel</title> 
<script type="text/javascript">
function validate()
{
var a;
a=document.forms.form1.uname.value;
var b;
b=document.forms.form1.pass.value;
if(a==''||a==null)
{
alert("Please Give The Username !!!");
return false;
}
else if(b==''||b==null)
{
alert("Please Give The Password !!!");
return false;
}
return true;
}

</script>
</head>
<body background="images/background2.jpg" text="cyan">
<center><img src="images/logo.png"></center><br/>
<hr width="1200">
<p>
<br><br><br><br><br><br>
<table border="1" align="center" width="400" height="150">
<form name="form1" action="" method="post" onSubmit="return validate();">
<tr align="center">
<td colspan="2">
<b>TO LOGIN</b></td></tr>
<tr align="center"><td>
<b>USERNAME :</b></td><td><input name="uname" type="text"/></td></tr>
<tr align="center"><td><b>PASSWORD  :</b></td><td><input name="pass" type="password"/> </td></tr>
<tr align="center"><td colspan="2"><input type="submit" value="Log In" name="sub"></form>
</td></tr></table>

<?php

require("con1.php");

if(isset($_SESSION['un']) && isset($_SESSION['ut']))
{
 header("location:home.php");
} 
if(isset($_POST['sub']))
{
	$uname=$_POST['uname'];
	$un=mysql_real_escape_string($uname);
	$pass=$_POST['pass'];
	$p=mysql_real_escape_string($pass);
 if($uname=='' && $uname==null)
 {
 echo'<center>Please Enter The Username</center>';
 header("refresh:2;login.php");
 }
else if($pass=='' && $pass==null)
 {
 echo'<center>Please Enter The Password</center>';
 header("refresh:2;login.php");
 }
 else
 {
$q="select * from userentry
where username='$un' and password='$p'";
 $res=mysqli_query($con,$q);
 if($row=mysqli_fetch_array($res))
 {
  $_SESSION['un']=$row['username'];
  $_SESSION['ut']=$row['usertype'];
  header("location:home.php");
 }

 else
 {
  echo '<center><font color="red" size="5">Wrong Username or Password !!!</font></center>';
  header("refresh:5;login.php");
} 
}
}?>

<p><br><br><br><br><br></p>
<p><hr width="1200"></p>
<p align="center">
<a href="index.html" style="text-decoration:none"><font color="yellow" size="5"><b>Home</b></font></a></p>
</body>
</html>
<?php
ob_flush();
?>