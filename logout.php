<?php
session_start();
ob_start();
?>
<?php
if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['info']))
{
if($_GET['info']=='logout')
{
session_destroy();
header("location:index.html");

}
}
else
{
header("location:home.php");
}
?>
<?php
ob_flush();
?>