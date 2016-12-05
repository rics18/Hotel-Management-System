<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Users</title>
<link rel="stylesheet" type="text/css" href="main1.css" />
</head>
 <body>
 <p>
 <img src="images/logo.png" class="logo">
 <hr class="b">
</p>
<table align='center' class='menu'>
		<tr align='center'><td class="head"><br><br>User Details</font><br><br></td></tr>
</table>
<body>
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
$del="action1.php?action=delete&user=";
echo '<form name="frm" method="post">
<table border="1" class="view">
<tr>
<th>Sl.No.</th>
<th>Username</th>
<th>Password</th>
<th>Usertype</th>
<th>Delete?</th>
</tr>';
$q="select * from userentry";
$result=mysqli_query($con,$q);
$count=1;
while($row=mysqli_fetch_array($result))
{
if($row['usertype']==1)
{
$u="Admin User";
}
else if($row['usertype']==2)
{
$u="Normal User";
}
echo '
<tr>
<td>'.$count++.'</td>
<td>'.$row['username'].'</td>
<td>'.$row['password'].'</td>
<td>'.$u.'</td>

<td><a href="action1.php?action=delete&user='.$row['username'].'" style="text-decoration:none"><font color="Red">DELETE</font></a></td>
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