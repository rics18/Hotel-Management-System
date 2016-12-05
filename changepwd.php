<?php
session_start();
ob_start();
require("con1.php");
?>
<html>
<head><title>Change Password</title>
<script type="text/javascript">
function validate()
{
var a;
a=document.forms.f.p1.value;
var b;
b=document.forms.f.p2.value;
var c;
c=document.forms.f.pass.value;
if(a==''||a==null)
{
alert("Password Does Not Exist");
return false;
}

else if(b==''||b==null)
{
alert("New Password Does Not Exist");
return false;
}
if(c==''||c==null)
{
alert("Confirm Password Does Not Exist");
return false;
}
return true;
}
</script> 
<link rel="stylesheet" type="text/css" href="main1.css" />
</head>
 <body>
 <p>
 <img src="images/logo.png" class="logo">
 <hr class="b">
</p>
<table align='center' class='menu'>
		<tr align='center'><td class="head"><br><br>Change Your Password</font><br><br></td></tr>
</table>
<form name="f" method="post" onSubmit="return validate();">
<table class="pass">
<tr><th>Current Password :</th>
<td><input type="password" name="p1"></td></tr>
<tr><th>New Password :</th> 
<td><input type="password" name="p2"></td></tr>
<tr><th>Confirm Password :</th> 
<td><input type="password" name="pass"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="sub" value="Change">
<?php
if(isset($_SESSION['un']) && isset($_SESSION['ut']))
{
  if(isset($_POST['sub']))
  {
    $x=$_POST['p1'];
    $x1=$_POST['p2'];
	$x2=$_POST['pass'];
 if($x==''||$x==null)
{
echo '<center>Enter The Valid  Password</center>';
header("refresh:2;changepwd.php");
}
 else if($x1==''||$x1==null)
{
echo '<center>Enter The New Password Correctly</center>';
header("refresh:2;changepwd.php");
}
 else if($x2==''||$x2==null)
{
echo '<center>Enter The Password To Be Confirmed Correctly</center>';
header("refresh:2;changepwd.php");
}
else
{
     
        $uname=$_SESSION['un'];
		$p="select password from userentry where username='$uname'";
		if($res=mysqli_query($con,$p))
		{
		if($row=mysqli_fetch_array($res))
		{
	   if($x1==$x2 && $row['password']==$x)
	   {
	        $q1="update userentry set password='$x1' where password='$x' and username='$uname'";
			$res=mysqli_query($con,$q1);
			echo'<center>Password Changed Successfully<center>';
			header("refresh:2;home.php");
		}
       
	   
      else
          {
		   echo '<center>Check Again!!</center>';
		   header("refresh:2;changepwd.php");
		  } 
		}
		}
	}

}
}
elseif(!(isset($_SESSION['un']) && isset($_SESSION['ut'])))
{
     header("location:index.html");
}
?></td></tr>
</table>
</form>
<a href="home.php" class="link">Home</a>
<hr class="line">
</body>
</html>
<?php
ob_flush();
?>	 		   