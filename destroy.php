<?php
include("session.php");
$link="Location: login.php?who=".$_SESSION['whoami'];
session_destroy();
header($link);
 ?>