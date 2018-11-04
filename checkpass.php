<?php
$who = $_GET['who'];
$db = mysqli_connect('localhost', 'root', '', 'ehr_healthcare')or die("Not connecting");
$username =$_POST['username'];
$password =$_POST['password'];
$password = md5($password);
if(strcmp($who,"patient")==0)
{
	$sql = "SELECT * FROM `patients` WHERE `uidai`='$username' AND password='$password' " ;
}
elseif(strcmp($who,"doctor")==0)
{
	$sql = "SELECT * FROM `doctor` WHERE `d_id`='$username' AND password='$password'" ;
}
elseif(strcmp($who,"hospital")==0)
{
	$sql = "SELECT * FROM `hospital` WHERE `hospital_id`='$username' AND password='$password' " ;
}
$results = mysqli_query($db, $sql);
if (mysqli_num_rows($results) == 1) {
include("session.php");
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
$_SESSION['whoami'] = $who;
echo "<script>alert('YOU ARE NOW LOGGED IN');</script>";
header("Location: healthrecord.php");
  	}
	else {
if(strcmp($who,"patient")==0)
{
	echo "<script>
    (function() {
        alert('Incorrect username or password');
        window.location = 'login.php?who=patient';
    })();
</script>";
}
elseif(strcmp($who,"doctor")==0)
{
	echo "<script>
    (function() {
        alert('Incorrect username or password');
        window.location = 'login.php?who=doctor';
    })();
</script>";
}
elseif(strcmp($who,"hospital")==0)
{
	echo "<script>
    (function() {
        alert('Incorrect username or password');
        window.location = 'login.php?who=hospital';
    })();
</script>";
}	
  	}

?>