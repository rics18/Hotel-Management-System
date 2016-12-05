<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Add Room</title>
<script type="text/javascript">
function validate()
{
var a;
a=document.forms.frm.rno.value;
var b;
b=document.forms.frm.type.value;
var c;
c=document.forms.frm.cost.value;
if(a==''||a==null)
{
alert("Room Number Does Not Exist");
return false;
}

if(b==''||b==null)
{
alert("Room Type Does Not Exist");
return false;
}

if(c==''||c==null)
{
alert("Cost Of The Room Does Not Exist");
return false;
}
else
{
r=/^[0-9]+$/;
if(r.test(document.frm.cost.value))
{
return true;
}
else 
{
alert("The Cost Should  Contain Numbers:");
return false;
}
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
<a href="home.php" class="link">Home</a>
<table align='center' class='menu'>
		<tr align='center'><td class="head"><br><br>Enter Room Details</font><br><br></td></tr>
</table>
<table class="add" align="center">
<tr><th>
<form name="frm" method="post" onSubmit="return validate();">
ENTER ROOM NUMBER:
</th>
<td>
<input type="text" name="rno">
</td>
</tr>
<tr>
<th>ENTER ROOM TYPE:
</th>
<td>
<input type="text" name="type">
</td>
</tr>
<tr>
<th>ENTER COST:
</th>
<td>
<input type="text" name="cost">
</td>
</tr>
<tr><td colspan="2">
<center><input type="submit" value="ADD" name="sub1">
&nbsp;
<input type="reset" value="CLEAR" name="clr"></center>
<br>
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
if((isset($_POST['sub1'])))
{
$r=$_POST['rno'];
$t=$_POST['type'];
$c=$_POST['cost'];
if($r==''||$r==null)
{
echo '<center>Enter The Valid Room Number</center>';
header("refresh:2;addroom.php");
}
 else if($t==''||$t==null)
{
echo '<center>Enter The Valid Room Type</center>';
header("refresh:2;addroom.php");
}
else if($c==''||$c==null || $c==0)
{
echo '<center>Enter The Valid Room Cost</center>';
header("refresh:2;addroom.php");
}
else
{
$q="insert into room(room_no,type,cost)
 values('".$r."','".$t."','".$c."')";
if($res=mysqli_query($con,$q))
{
$r="update room
    set rid=0
	where room_no='".$r."'";
$res1=mysqli_query($con,$r);
echo '<center>Room Is Successfully Added</center>';
header("refresh:2;home.php");
}
else
{
echo '<center>Room Can Not Be Added</center>';
header("refresh:2;addroom.php");
}
}
}
}
}

?>
</td>
</tr>
</form><br>
</table>
<hr class="line">
</body>
</html>
<?php
ob_flush();
?>
