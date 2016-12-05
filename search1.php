<?php
session_start();
ob_start();
?>
<html>
 <head>
 <title> Search Rooms By Type</title>
 <link rel="stylesheet" type="text/css" href="main1.css" />
</head>
 <body>
 <p>
 <img src="images/logo.png" class="logo">
 <hr class="b">
 </p>
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
if(isset($_POST['find']))
{
$x=$_POST['s'];
if($x==''||$x==null)
{
echo '<table class="msg"><tr><td>Enter the Room Type Appropriately !!!</td></tr></table>';
header("refresh:2;search.php");
}
else
{
 $q="select * from room where type='$x'";
$res=mysqli_query($con,$q);
$r=mysqli_fetch_array($res);
if($r[0]==''||$r[0]==null)
{
echo '<table class="msg"><tr><td>Please Give The Appropriate Room Type !!!</td></tr></table>';
header("refresh:2;search.php");
}
else if($r['rid']==1)
{
echo '<table class="msg"><tr><td>All Rooms Are Booked !!!</td></tr></table>';
header("refresh:2;search.php");
}
else
{
$q="select * from room where type='$x'";
$result=mysqli_query($con,$q);
echo '</td></tr></table>';
echo '<table align="center" class="menu">
		<tr align="center"><td class="head"><br><br>Available Room Details</font><br><br></td></tr>
</table>
<center><table border="1" class="avail">
<tr>
<th>ROOM NUMBER</th>
<th>COST</th>
</tr>';
while($row=mysqli_fetch_array($result))
{
if($row['rid']==0)
{
echo
'<tr>
<td><center><font face="vernada">'.$row['room_no'].'</font></center></td>
<td><center><font face="vernada">'.$row['cost'].'</font></center></td>
</tr>';
}

}


echo'</table></center>';
echo'<br>';
echo'<center><a href="search.php" class="link">Back</a>';
}
}


}

}
}
?>
<hr class="line"
 </body>
</html> 
<?php
ob_flush();
?>