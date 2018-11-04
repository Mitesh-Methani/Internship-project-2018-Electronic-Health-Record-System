<?php
session_start();
include 'mails.php';
$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'images'.$ds.$_POST['uidai'].$ds;   //2
if (!file_exists($storeFolder)) {
    mkdir($storeFolder, 0777, true);
}

$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);


$newname=$_POST['uidai'];
//$ran=rand(100, 999);
$name = $newname  . '.'.$ext;
//print_r($name);
//echo "<br>";
 
if ($_FILES['photo']['name']!='') {
     
    $tempFile = $_FILES['photo']['tmp_name'];          //3             
      
    $targetPath =  $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $name;  //5
  
    move_uploaded_file($tempFile,$targetFile);
	
}
$storeFolder = 'aadhar'.$ds.$_POST['uidai'].$ds;   //2
//print_r($storeFolder);
//echo "<br>";
if (!file_exists($storeFolder)) {
    mkdir($storeFolder, 0777, true);
}

$ext = pathinfo($_FILES['aadhar']['name'], PATHINFO_EXTENSION);


$newname=$_POST['uidai'];
//$ran=rand(100, 999);
$name = $newname  . '.'.$ext;
//print_r($name);
//echo "<br>";
 
if ($_FILES['aadhar']['name']!='') {
     
    $tempFile = $_FILES['aadhar']['tmp_name'];          //3             
      
    $targetPath =  $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $name;  //5
  
    move_uploaded_file($tempFile,$targetFile);
	
}
function generateRandomString($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
	
if (isset($_POST['email'])) {
    $email=$_POST['email'];
    $pin = generateRandomString(4);
    $var = sendOTP($email,$pin);
    session_start();
	$_SESSION['otppin']=$pin;
	$_SESSION['user']=$_GET['user'];
	if($_GET['user']=='patient')
	{
	$_SESSION['uidai']=$_POST['uidai'];
	$_SESSION['name']=$_POST['name'];
	$_SESSION['address']=$_POST['address'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['mobile']=$_POST['mobile'];
	$_SESSION['dob']=$_POST['dob'];
	$_SESSION['gender']=$_POST['gender'];
	}
	if($_GET['user']=='doctor')
	{
		
	$_SESSION['age']=$_POST['age'];
	$_SESSION['name']=$_POST['firstname']." ".$_POST['lastname'];
	$_SESSION['address']=$_POST['street1'].",".$_POST['street2'].",".$_POST['city'].",".$_POST['postalcode'].",".$_POST['state'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['mobile']=$_POST['mobile'];
	$_SESSION['dob']=$_POST['dob'];
	$_SESSION['gender']=$_POST['gender'];
	$_SESSION['q']=$_POST['q'];
	$_SESSION['certi']=$_FILES['certi'];
	}
	if($_GET['user']=='hospital')
	{
	$_SESSION['name']=$_POST['name'];
	$_SESSION['street1']=$_POST['street1'];
	$_SESSION['street2']=$_POST['street2'];
	$_SESSION['city']=$_POST['city'];
	$_SESSION['postalcode']=$_POST['postalcode'];
	$_SESSION['state']=$_POST['state'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['mobile']=$_POST['mobile'];
	$_SESSION['license']=$_FILES['license'];
	}
    
}
?>
<script type="text/javascript">
window.location.href = 'http://ehrsystem.co.in/pkhtml/ehrinfo/register/patient2.php';
</script>

