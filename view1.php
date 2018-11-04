<!HTDOCS html>
<?php 
include("session.php");
$who=$_SESSION['whoami']; ?>
<html>
<head><link rel="stylesheet" href="css/designhome.css"></head>
<body>
<?php 
if(strcmp($who,"patient")==0)
{
	$str="dis.php";
	$str1="doc.php";
}
else if(strcmp($who,"doctor")==0)
{
	include("doctordash.php");
	echo "<br><br><br><br><br>";
	$str='dis.php?id='.$_GET['$id'];
	$str1='doc.php?id='.$_GET['$id'];
}
?>	
<div class="content">
        <a class="record" href="<?php echo $str; ?>">
            <div><b><br>GENERAL HEALTH AND FIRST AID RECORD</b></div>
        </a>
        <a class="record" href ="<?php echo $str1; ?>">
            <div><b><br><br>MEDICAL RECORDS</b></div>
        </a>
    </div>
	</body>
	</html>
	