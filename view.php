<?php
session_start();
ob_start();
?>
<html>
<head>
<title>View Users</title>
<link rel="stylesheet" type="text/css" href="main1.css" />
</head>
 <body>
 <p>
 <img src="images/logo.png" class="logo">
 <hr>
</p>
<table align='center' class='menu'>
		<tr align='center'><td class="head"><br><br>User Details</font><br><br></td></tr>
</table>
<?php
require("con1.php");
if(!(isset($_SESSION['un']) && ($_SESSION['ut'])))
{
header("location:index.php");
}
$u=$_GET['user'];
$q="select * from userentry where username='$u'";
$result=mysqli_query($con,$q);
while($row=mysqli_fetch_array($result))
{
echo '
<table class="view" border="1">
<tr>
<th>Username</th>
<th>Password</th>
<th>Usertype</th>
</tr>
<tr>
<td>'.$row[0].'</td>
<td>'.$row[1].'</td>
<td>'.$row[2].'</td>
</tr>';
}
echo '</table><br>
<a href="viewuser.php" class="go">Back</a>';
?>
</body>
</html>
<?php
ob_flush();
?>
