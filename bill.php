<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Bill</title>
<link rel="stylesheet" type="text/css" href="main1.css" />
</head>
 <body>
 <p>
 <img src="images/logo.png" class="logo">
 <hr class="b">
</p>
<table align='center' class='menu'>
		<tr align='center'><td class="head"><br><br>Bill</font><br><br></td></tr>
</table>
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
$tax=5;
$cdate=gmdate('d-m-Y');
$action=$_GET['action'];
$r=$_GET['check1'];
$a="select * from occupant where cid='$r' and oid=0";
$result=mysqli_query($con,$a);
if($i=mysqli_fetch_array($result))
{
$bdate=$i['date'];
$d1=explode('-',$bdate);
$bookdate=$d1[2].'-'.$d1[1].'-'.$d1[0];
$room=$i['room_no'];
$occ=$i['name'];
$add=$i['address'];

if($row['oid']==0)
{

$b="select type,cost from room where room_no='$room'";
$result1=mysqli_query($con,$b);
if($j=mysqli_fetch_array($result1))
{
$type=$j['type'];
$cost=$j['cost'];
}
$days =(strtotime($cdate) - strtotime($bookdate)) / (60 * 60 * 24);
$time=gmdate('h:i:s:A');
$tm=explode(':',$time);
$c=explode('-',$cdate);
$b=explode('-',$bookdate);
if(($c[0]==$b[0]) && ($c[1]==$b[1]) && ($c[2]==$b[2]))
{
$days=1;
}
else if(($tm[0]<=12) && ($tm[1]>0) && ($tm[2]>0) && ($tm[3]=='PM'))
{
$days =$days+1;
}
else
{
$days=$days;
}
$total=($cost*$days);
$tax1=($total*$tax)/100;
$nettotal=($total+$tax1);
echo '<center><table class="book" border="1">
<tr>
<th><center>Customer Id:</center></th>
<td><center>'.$r.'</center></td>
</tr>
<tr>
<th><center>Date Of Booking:</center></th>
<td><center>'.$bookdate.'</center></td>
</tr>
<tr>
<th><center>Date Of Checking Out:</center></th>
<td><center>'.$cdate.'</center></td>
</tr>
<tr>
<th><center>Name Of The Occupant:</center></th>
<td><center>'.$occ.'</center></td>
</tr>
<tr>
<th><center>Address Of The Occupant:</center></th>
<td><center>'.$add.'</center></td>
</tr>
<tr>
<th><center>Room Number:</center></th>
<td><center>'.$room.'</center></td>
</tr>
<tr>
<th><center>Net Payable Amount:</center></th>
<td><center>'.$total.'</center></td>
</tr>
<tr>
<th><center>Tax(@'.$tax.')%:</center></th>
<td><center>'.$tax1.'</center></td>
</tr>

<tr>
<th><center>Net Payable Amount:</center></th>
<td><center>'.$nettotal.'</center></td>
</tr>
</table>
<input type="button" value="Print" onClick="window.print()"></form></center>';
}

if($action=="checkout")
{
mysqli_query($con,"update occupant set oid=1 where cid='$r'");
$cc="select oid from occupant where cid='$r'";
$rr=mysqli_query($con,$cc);
if($row1=mysqli_fetch_array($rr))
{
if($row1['oid']==1)
{
$p1=explode('-',$cdate);
$cookdate=$p1[2].'-'.$p1[1].'-'.$p1[0];
$cout="update occupant
       set outdate='$cookdate'
	   where cid='$r'";
$c=mysqli_query($con,$cout);
}
}

}
else
{
echo'The Occupant is Already checked Out';
}
}

$p="select rid from room where room_no='$room'";
$res=mysqli_query($con,$p);
if($row=mysqli_fetch_array($res))
{
if($row['rid']==1)
{
$r="update room
    set rid=0
	where room_no='$room'";
$res1=mysqli_query($con,$r);
header("refresh:10;home.php");

}
}
}
}
?>
<br>
<br>
<br><table class="msg"><tr><td>
<font color="magenta">THANK YOU FOR VISIING...<br> PLEASE VISIT AGAIN!!!!!</font>
</td></tr>
</table>
<a href="home.php" class="link">Home</a>
<hr class="line">
<?php
ob_flush();
?>