<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Add User</title>
<script type="text/javascript">
function validate()
{
var a;
a=document.forms.frm.uname.value;
var b;
b=document.forms.frm.pass.value;
if(a==''||a==null)
{
alert("Username Does Not Exist");
return false;
}

if(b==''||b==null)
{
alert("Password Does Not Exist");
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
		<tr align='center'><td class="head"><br><br>Enter User Details</font><br><br></td></tr>
</table>
<form name="frm" method="post" onSubmit="return validate();">
<table class="user"> 
<tr>
<th>Username:
</th>
<td>
<input type="text" name="uname">
</td>
</tr>
<tr>
<th>Password:
</th>
<td>
<input type="password" name="pass">
</td>
</tr>
<tr>
<th>User Id:
</th>
<td>
<select name="s1">
<option></option>
<option selected="selected">2</option>
<option>1</option>
</select>
</td>
</tr>
<tr><td colspan="2">
<center><input type="submit" value="Add" name="sub">
&nbsp;
<input type="reset" value="clear" name="clr"></center>

<?php
require("con1.php");
if(!(isset($_SESSION['un']) && ($_SESSION['ut'])))
{
header("location:index.html");
}
if(isset($_SESSION['un']) && ($_SESSION['ut']))
{
$t=$_SESSION['ut'];
$n=$_SESSION['un'];
if($t=='2')
{
header("location:home.php");
}
if($t=='1')
{
if((isset($_POST['sub'])))
{
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$id=$_POST['s1'];
if($uname==''||$uname==null)
{
echo '<table class="msg1"><tr><td>Enter the Username Appropriately</td></tr></table>';
header("refresh:2;adduser.php");
}
 else if($pass==''||$pass==null)
{
echo '<table class="msg1"><tr><td>Enter the valid password</td></tr></table>';
header("refresh:2;adduser.php");
}
else
{
$q="insert into userentry
 values('".$uname."','".$pass."','$id')";
if($res=mysqli_query($con,$q))
{
if($id==1)
{
echo '<table class="msg1"><tr><td>User is Successfully Added As Admin User</td></tr></table>';
header("refresh:2;home.php");
}
if($id==2)
{
echo '<table class="msg1"><tr><td>User is Successfully Added As Normal User</td></tr></table>';
header("refresh:2;home.php");
}
}
else
{
echo '<table class="msg1"><tr><td>User not added</td></tr></table>';
header("refresh:2;adduser.php");
}
}
}
}
}

?>
</td>
</tr>
</table>
</form>
<hr class="line">
<a href="home.php" class="link">Home</a>
</body>
</html>
<?php
ob_flush();
?>
