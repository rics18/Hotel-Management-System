<?php
session_start();
ob_start();
?>
<html>
 <head>
<title>Search Rooms By Type</title>
 <script type="text/javascript">
 function validate()
{
var a;
a=document.forms.frm.s.value;
if(a==''||a==null)
{
alert("Room Type Does Not Exist");
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
		<tr align='center'><td class="head"><br><br>Search Room Details</font><br><br></td></tr>
</table>
 <table class="search">
 <form name="frm" method="post" action="search1.php" onSubmit="return validate();">
 <tr>
 <th>Enter Room Type :</th>
 <td><center><select name="s">
 <option></option>
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
if($q="select distinct(type) from room")
{
$res=mysqli_query($con,$q);
while($row=mysqli_fetch_array($res))
{ 
if($row['type']==" " || $row['type']=="null")
{
	echo 'Enter The Room Type Appropriately';
}
echo  '
      <option>'.$row['type'].'</option>';	  
}
}
}
}

?>
 </tr>
 
 <tr>
 <td colspan="2" align="center"><input type="submit" value="SEARCH" name="find"></td>
 </tr>
 </form>
 </table>
 <hr class="line">
 <a href="home.php" class="link">Home</a>
 </center>
 </body>
</html> 
<?php
ob_flush();
?>