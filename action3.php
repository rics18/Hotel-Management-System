<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Checking Out</title></head>
<body>

<?php
require("con1.php");
if(!(isset($_SESSION['un']) && ($_SESSION['ut'])))
{
header("location:index.php");
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
$cdate=gmdate('d-M-Y H:I:S A');
$action=$_GET['action'];
$r=$_GET['check'];
if($action=="checkout")
{
mysqli_query($con,"update occupant set approve=1 where room_no='$r'");
header("location:bill.php");
}

$p="select rid from room where room_no='$r'";
$res=mysqli_query($con,$p);
if($row=mysqli_fetch_array($res))
{

$a="select * from occupant where room_no='$r'";
$result=mysqli_query($con,$a);
if($i=mysqli_fetch_array($result))
{
$bdate=$i['date'];
$d1=explode('-',$bdate);
$bookdate=$d1[2].'-'.$d1[1].'-'.$d1[0];
$room=$i['room_no'];
$occ=$i['name'];
$add=$i['address'];
}
$b="select type,cost from room where room_no='$r'";
$result1=mysqli_query($con,$b);
if($j=mysqli_fetch_array($result1))
{
$type=$j['type'];
$cost=$j['cost'];
}
$days = date_diff($bookdate,$cdate);

echo $days;
$total=($cost*$days);
echo '<center><table height="300px" width="300px">
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
<td><center>'.$days.'</center></td>
</tr>
</table>
</center>';




}
}
}
}
}
?>
<br>
<br>
<br>
<MARQUEE SCROLLing="YES" BEHAVIOUR="RIGHT"><h2><font face="verdana" color="cyan"><center>THANK YOU FOR VISIING.....<br><br>PLEASE VISIT AGAIN!!!!!
</center></font></h2></marquee>

<?php
ob_flush();
?>