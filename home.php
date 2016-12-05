<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Nettech International Hotel</title>
<link rel="stylesheet" type="text/css" href="main2.css" />
</head>
 <body>
 <p>
 <img src="images/logo.png" class="logo">
 <hr class="b">
</p>
<?php
if(!(isset($_SESSION['un']) && ($_SESSION['ut'])))
{
header("location:index.html");
}
require("con1.php");
if(isset($_SESSION['un']) && isset($_SESSION['ut']))
{
  $u=$_SESSION['un'];
  echo"
  <table align='center' class='menu'>
		<tr align='center'>
		<td class='head'><br><br>Welcome ".$u."<br>
		<br></td>
		</tr>
		</table>";
  echo "<table class='content'>
	    <tr><td>";
  if($_SESSION['ut']==1)
  {  
    echo '
        <ul>
		 <li><a href="addroom.php" class="main">Add Rooms</a></li><br>
         <li><a href="viewroom.php" class="main">View Rooms</a></li><br>
		 <li><a href="adduser.php" class="main">Add user</a></li><br>
		 <li><a href="viewuser.php" class="main">View Users</a></li><br>
		  <li><a href="customer.php" class="main">Visited Customers</a></li><br>
		 <li><a href="changepwd.php" class="main">Change Password</a></li><br>
		 <li><a href="logout.php?info=logout" class="main">Logout</a></li>
	    </ul>';
  }
  else
  {
    echo '  
        <ul>
         <li><a href="search.php" class="main">Search Rooms</a></li><br> 
		 <li><a href="bookroom.php" class="main">Book Rooms</a></li><br>
		 <li><a href="check.php" class="main">Checkout</a></li><br>
		  <li><a href="changepwd.php" class="main">Change Password</a></li><br>
		 <li><a href="logout.php?info=logout" class="main">Logout</a></li>
	    </ul>';
  }
} 
echo "</tr></td></table>";
?>
<hr class="line">
</center>
</body>
 </html>
<?php 
ob_flush();
?>