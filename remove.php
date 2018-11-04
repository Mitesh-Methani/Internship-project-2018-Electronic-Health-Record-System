<!HTDOCS html>
<html>
<head>
<title>Remove</title>
<script>
if(confirm('Are you sure you want to remove access to this ID ?'))
{
<?php
include("session.php");
$db=mysqli_connect("localhost","root","","ehr_healthcare");
if ($_GET['$w']=="doc")
{
$q="SELECT doc FROM patients WHERE uidai = $_SESSION[username]";
$r=mysqli_query($db,$q);
$list=mysqli_fetch_assoc($r);
$a=explode('_',$list['doc']);
$index=array_search($_GET['$id'],$a);
unset($a[$index]);
$str = implode("_",$a);
	$q=" UPDATE patients SET doc='$str' WHERE uidai=$_SESSION[username]";
	$r=mysqli_query($db,$q);
$q="SELECT mypatient FROM doctor WHERE d_id =".$_GET['$id'];
$r=mysqli_query($db,$q);
$list=mysqli_fetch_assoc($r);
$a=explode('_',$list['mypatient']);
$index=array_search($_SESSION['username'],$a);
unset($a[$index]);
$str = implode("_",$a);
	$q=" UPDATE doctor SET mypatient='$str' WHERE d_id=".$_GET['$id'];
	$r=mysqli_query($db,$q);
} 
else if ($_GET['$w']=="hospital")
{
$q="SELECT myhospital FROM patients WHERE uidai = $_SESSION[username]";
$r=mysqli_query($db,$q);
$list=mysqli_fetch_assoc($r);
$a=explode('_',$list['myhospital']);
$index=array_search($_GET['$id'],$a);
unset($a[$index]);
$str = implode("_",$a);
	$q=" UPDATE patients SET myhospital='$str' WHERE uidai=$_SESSION[username]";
	$r=mysqli_query($db,$q);
$q="SELECT patients FROM hospital WHERE hospital_id =".$_GET['$id'];
$r=mysqli_query($db,$q);
$list=mysqli_fetch_assoc($r);
$a=explode('_',$list['myhospital']);
$index=array_search($_GET['$id'],$a);
unset($a[$index]);
$str = implode("_",$a);
	$q=" UPDATE hospital SET patients='$str' WHERE hospital_id=".$_GET['$id'];
	$r=mysqli_query($db,$q);
}
 header("Location: main.php"); 
?>
}
else
	
	{<?php header("Location: main.php"); ?>}
</script>
</head>
<body>

</body>
</html>
