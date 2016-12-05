<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Checkout</title>
<link rel="stylesheet" type="text/css" href="main1.css" />
</head>
 <body>
 <p>
 <img src="images/logo.png" class="logo">
 <hr class="b">
</p>
<table align='center' class='menu'>
		<tr align='center'><td class="head"><br><br>Booking Details</font><br><br></td></tr>
</table>
<?php
if(!(isset($_SESSION['un']) && ($_SESSION['ut'])))
{
header("location:index.html");
}
require("con1.php");
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
$check="bill.php?action=checkout&check1=";
echo '<form name="frm" method="post">
<table border="1" class="check">
<tr>
<th>Customer Id</th>
<th>Date Of Booking</th>
<th>Room Number</th>
<th>Name Of The Occupant</th>
<th>Address</th>
<th>Number Of Persons</th>
<th>Checkout?</th>
</tr>';
$q="select * from occupant";
$result=mysqli_query($con,$q);

while($row=mysqli_fetch_array($result))
{
if($row['oid']==0)
{



echo '
<tr>
<td>'.$row['cid'].'</td>
<td>'.$row['date'].'</td>
<td>'.$row['room_no'].'</td>
<td>'.$row['name'].'</td>
<td>'.$row['address'].'</td>
<td>'.$row['nop'].'</td>
<td><a href='.$check.$row['cid'].' style="text-decoration:none"><font color="red">Checkout</font></a></td>
</tr></form>'; 
}
}
echo '</table>
<br>
<a href="home.php" class="link">Home</a>';
}
}
?>
<hr class="line">
</body>
</html>
<?php
ob_flush();
?>