<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Rooms</title>
<link rel="stylesheet" type="text/css" href="main1.css" />
</head>
 <body>
 <p>
 <img src="images/logo.png" class="logo">
 <hr class="b">
</p>
<table align='center' class='menu'>
		<tr align='center'><td class="head"><br><br>View Room Details</font><br><br></td></tr>
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
$del="action.php?action=delete&head=";
echo '<form name="frm" method="post">
<table border="1" class="view">
<tr>
<th>SL. NO.</th>
<th>Room Number</th>
<th>Room Type</th>
<th>Room Cost</th>
<th>DELETE</th>
</tr>';
$q="select * from room";
$result=mysqli_query($con,$q);
$count=1;
while($row=mysqli_fetch_array($result))
{
echo '
<tr>
<td>'.$count++.'</td>
<td>'.$row['room_no'].'</a></td>
<td>'.$row['type'].'</a></td>
<td>'.$row['cost'].'</a></td>
<td><a href="action.php?action=delete&head='.$row['room_no'].'" style="text-decoration:none"><font color="Red">DELETE</font></a></td>
</tr></form>'; 
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