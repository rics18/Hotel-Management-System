<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Customer Details</title>
<link rel="stylesheet" type="text/css" href="main1.css" />
</head>
 <body>
 <p>
 <img src="images/logo.png" class="logo">
 <hr class="b">
</p>
<table align='center' class='menu'>
		<tr align='center'><td class="head"><br><br>Customer Details</font><br><br></td></tr>
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
if($t=='2')
{
header("location:home.php");
}
if($t=='1')
{

echo '<form name="frm" method="post">
<table border="1" class="view">
<tr>
<th>Customer Id</th>
<th>Customer Name</th>
<th>Customer Address</th>
<th>Room Number</th>
<th>Check In Date</th>
<th>Check Out Date</th>

</tr>';
$q="select * from occupant";
$result=mysqli_query($con,$q);
while($row=mysqli_fetch_array($result))
{
if($row['oid']==1)
{
echo '
<tr>
<td>'.$row['cid'].'</td>
<td>'.$row['name'].'</td>

<td>'.$row['address'].'</td>
<td>'.$row['room_no'].'</td>
<td>'.$row['date'].'</td>
<td>'.$row['outdate'].'</td>
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