<?php
$time=time();
$u_time = $_GET['time'];
//	error_reporting(0);
	$host = "localhost";
	$user = "root";
	$databaseName = "ehr_healthcare";

	$connect = mysqli_connect($host, $user, '', $databaseName);
	$p=md5($_POST['']);
	if($_GET['who']=='patient'){
	$id='uidai';
	$w='patients';
	}else if($_GET['who']=='doctor'){
	$id='d_id';
	
	$w='doctor';}
	else{
	$id='hospital_id';
	
	$w='hospital';
	}
	if(isset($_POST['sub'])){
	$q="UPDATE $w SET password = '$p' WHERE $id='$_GET[user]'";
		
	$r=mysqli_query($connect,$q);
	echo $q;
	header("home.php");
	}
if($time-$u_time<=1200){?>
	<form method="post" action="#">
		<input type="password" name="" id="" />
		<input type="hidden" name="sub" id="sub" value="1" />
	
		<button class="btn" type="submit"  id="submit"> Submit </button>
	</form>

<?php }
else{
	echo "more than 20 minutes";
}
?>

