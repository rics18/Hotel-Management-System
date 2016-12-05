<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Book Room</title>
<script type="text/javascript">
function validate()
{
var a;
a=document.forms.frm.date.value;
var b;
b=document.forms.frm.rno.value;
var c;
c=document.forms.frm.nameocc.value;
var d;
d=document.forms.frm.addr.value;
var e;
e=document.forms.frm.nop.value;
if(a==''||a==null)
{
alert("Booking Date Does Not Exist");
return false;
}
else if(b==''||b==null)
{
alert("Room Number Does Not Exist");
return false;
0}
else if(c==''||c==null)
{
alert("Name Of The Occupant Does Not Exist");
return false;
}
 else if(d==''||d==null)
{
alert("Address Of The Occupant Does Not Exist");
return false;
}
else if(e==''||e==null)
{
alert("Please Provide The Total Number of Person");
return false;
}
else if(e>3)
{
alert("Number Of Persons Should Not Excceed 3");
return false;
}
else if(isNaN(e))
{
alert("Not A Number");
return false;
}
else if(!(isNaN(c)))
{
alert("Please Give The Appropriate Name");
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
		<tr align='center'><td class="head"><br><br>Enter Booking Details</font><br><br></td></tr>
</table>
<table border="1" class="book"> 
<tr>
<th>
<form name="frm" method="post" onSubmit="return validate();">
Enter Date of booking:
</th><td> 
<input type="text" name="date">(YYYY-MM-DD)
</td></tr>
<tr><th>Enter Room Number:</th><td> 
 <input type="text" name="rno"></td></tr>
<tr><th>Enter The Name Of The Occupant :</th><td>  
<input type="text" name="nameocc"></td></tr>
<tr><th valign="top">Enter The Address:</th><td> 
<textarea name="addr" cols="35" rows="5"></textarea></td></tr>
<tr><th>Enter Number Of Persons:</th><td>  
<input type="text" name="nop"></td></tr>
<tr align="center"><td colspan="2"><input type="reset" name="clear" value="CLEAR">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="sub" value="BOOK"></form></td></tr><table>
<table class="msg">
<tr>
<td>
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
if($t=='1')
{
header("location:home.php");
}
if($t=='2')
{
if((isset($_POST['sub'])))
{
$date=$_POST['date'];
$room=$_POST['rno'];
$name=$_POST['nameocc'];
$address=$_POST['addr'];
$pn=$_POST['nop'];
$cust=rand();
if($date==''||$date==null)
{
echo '<center>Booking Date Is Mandatory</center>';
header("refresh:2;bookroom.php");
}
 else if($room==''||$room==null)
{
echo '<center>Enter The Valid Room Number</center>';
header("refresh:2;bookroom.php");
}
else if($name==''||$name==null)
{
echo '<center>Name Of The Occupant Should be Provided</center>';
header("refresh:2;bookroom.php");
}
else if($address==''||$address==null)
{
echo '<center>Address Of The Occupant Should be Provided</center>';
header("refresh:2;bookroom.php");
}
else if($pn==''||$pn==null)
{
echo '<center>Number Of Persons Should Be Entered</center>';
header("refresh:2;bookroom.php");
}
else if($pn>3||$pn==0)
{
echo '<center>Number Of Persons Should Not Be More Than Three</center>';
header("refresh:2;bookroom.php");
}



else
{
$p="select room_no,rid from room where room_no='$room'";
if($result=mysqli_query($con,$p))
{
if($row=mysqli_fetch_array($result))
{
if(($row['room_no']==$room) && ($row['rid']==0))
{
$q="insert into occupant(cid,date,room_no,name,address,nop)
 values('$cust','".$date."','".$room."','".$name."','".$address."','$pn')";

if($res=mysqli_query($con,$q))
{
$z="update occupant
    set oid=0
	where room_no='".$room."' and name='".$name."' and cid='$cust'";
$result2=mysqli_query($con,$z);
$r="update room
    set rid=1
	where room_no='".$room."'";
$res1=mysqli_query($con,$r);
echo '<center>Booking is Successfully Done</center>';
header("refresh:2;home.php");
}
}
else
{
echo'<center>Room Is Already Booked</center>';
header("refresh:2;home.php");
}
}

else
{
echo'<center>Entered Room Does Not Exist</center>';
header("refresh:2;home.php");
}
}

}


}
}
}

?>
</td></tr></table>
<hr class="line">
<a href="home.php" class="link">Home</a>
</body>
</html>
<?php
ob_flush();
?>
