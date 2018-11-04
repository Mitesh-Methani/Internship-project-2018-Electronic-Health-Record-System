<?php
session_start();
if(!(isset($_SESSION['username']) AND isset($_SESSION['whoami']))){
	$path="Location:login.php?who=".$_GET['who'];
header($path);
}
error_reporting(0);
?>