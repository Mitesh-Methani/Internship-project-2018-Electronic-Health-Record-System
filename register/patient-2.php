<?php
/*
 session_start();
 if($_SESSION['user']=="patient")
 {
 if(isset($_POST['S'])){
	 if($_POST['otp']===$_SESSION['otppin']){

	$password=$_POST['password'];
	$password=md5($password);
        $db = mysqli_connect('localhost', 'root', '', 'ehr_healthcare')or die("Not connecting");
		$q="INSERT INTO `patients` (uidai,name,dob,address,gender,mobile,email_id,password) VALUES ('$_SESSION[uidai]','$_SESSION[name]','$_SESSION[dob]','$_SESSION[address]','$_SESSION[gender]','$_SESSION[mobile]','$_SESSION[email]','$password')";
		$r=mysqli_query($db,$q);
		if($r){
			echo "<alert alert-success><center><h3>Added</h3></center></alert>";
			
		}else{
			echo mysqli_error($connect)."<br>querry:".$q;
		}
		header("Location:fitness.php");
 }else{
	 echo "WRONG OTP";
 }
 }
 }
 else if($_SESSION['user']=="doctor")
 {
	 $str1="Qualification Certificate";
	 $s="certi";
 if(isset($_POST['S'])){
	 if($_POST['otp']===$_SESSION['otppin']){
	
	$password=$_POST['password'];
	$password=md5($password);
        $db = mysqli_connect('localhost', 'root', '', 'ehr_healthcare')or die("Not connecting");
		$q="INSERT INTO `doctor` (name,dob,addrs,gndr,phone,email,password,qualific) VALUES ('$_SESSION[name]','$_SESSION[dob]','$_SESSION[address]','$_SESSION[gender]','$_SESSION[mobile]','$_SESSION[email]','$password','$_SESSION[q]')";
		$r=mysqli_query($db,$q);
		$last_id = mysqli_insert_id($db);
		if($r){
			echo "<alert alert-success><center><h3>Added</h3></center></alert>";
			echo " 
			       <center><h3>YOUR DOCTOR ID IS ".$last_id."<br>Please note it down. You will need your ID to Login to the portal.</h3>
				   <a href='../login.php?who=doctor'><button class='btn' type='submit' >OK NOTED</button></a>
				   </center>
				  ";
			$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'doctorCertificates'.$ds.$last_id.$ds;   //2
if (!file_exists($storeFolder)) {
    mkdir($storeFolder, 0777, true);
}

$ext = pathinfo($_FILES['certi']['name'], PATHINFO_EXTENSION);


$newname=$last_id;
$name = $newname  . '.'.$ext;
if ($_FILES['certi']['name']!='') {
     
    $tempFile = $_FILES['certi']['tmp_name'];          //3             
    $targetPath =  $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $name;  //5
  
    move_uploaded_file($tempFile,$targetFile);
	
}

				   
			
		}else{
			echo mysqli_error($db)."<br>querry:".$q;
		}
		
		
 }else{
	 echo "WRONG OTP";
 }
 }
 }
 else if($_SESSION['user']=="hospital")
 {
	  $str1="Hospital License Certificate";
	 $s="license";
 if(isset($_POST['S'])){
	 if($_POST['otp']===$_SESSION['otppin']){
	
	$password=$_POST['password'];
	$password=md5($password);
        $db = mysqli_connect('localhost', 'root', '', 'ehr_healthcare')or die("Not connecting");
		$q="INSERT INTO `hospital` (hospital_name,street_1,street_2,city_town,state,postal_code,contact_number,email,password) VALUES ('$_SESSION[name]','$_SESSION[street1]','$_SESSION[street2]','$_SESSION[city]','$_SESSION[state]','$_SESSION[postalcode]','$_SESSION[mobile]','$_SESSION[email]','$password')";
		$r=mysqli_query($db,$q);
		$last_id = mysqli_insert_id($db);
		if($r){
			$path="../login.php?who=hospital";
			
			echo "<alert alert-success><center><h3>Added</h3></center></alert>";
			echo "
			       <center><h3>YOUR HOSPITAL ID IS ".$last_id."<br>Please note it down. You will need your ID to Login to the portal.</h3>
				   <a href='../login.php?who=hospital'><button class='btn' type='submit' >OK NOTED</button></a>
				   </center>
				   ";
				$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'HospitalLicense'.$ds.$last_id.$ds;   //2
if (!file_exists($storeFolder)) {
    mkdir($storeFolder, 0777, true);
}


$ext = pathinfo($_FILES['license']['name'], PATHINFO_EXTENSION);


$newname=$last_id;
$name = $newname  . '.'.$ext;
if ($_FILES['license']['name']!='') {
     
    $tempFile = $_FILES['license']['tmp_name'];          //3             
    $targetPath =  $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $name;  //5
  
    move_uploaded_file($tempFile,$targetFile);
	
}

				   
			
		}
			   
			
		else{
			echo mysqli_error($db)."<br>querry:".$q;
		}
		
		
 }else{
	 echo "WRONG OTP";
 }
 }
 }*/
?>

<html>
<head>
<title> </title>
<link rel="stylesheet" href="../css/designhome.css">
<script>
function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
	
    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 
</script>
</head>

<body style="margin:auto;">
<br><br><br><form method="post" action="" enctype="multipart/form-data">
<div style="margin:auto; padding:0px 25px; border:2px solid #8e1909;width:60%">
<br>
<h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Enter OTP(Sent via email):
<input type="number" name="otp" id="otp" required placeholder="- - - -" style="padding:3px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,13}">
</h3>
<div>
            <h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp password:
                            <input type="password" name="password"  required style="padding:5px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,13}" maxlength="13" placeholder="Password" 
                                   id="pass1" style="width=50%; height:5px; padding:10px; border:1px solid #C8C8C8 ">
        					<input class="form-control mb-2" type="hidden" name="S" value="1"/>
                            </div>
                            
                            <div style="inline">
                                <h3> confirm password:
                            <input id="pass2" type="password" style="padding:5px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,13}" maxlength="13" placeholder="confirm Password"  required style="width=50%; height:5px; padding:10px; border:1px solid #C8C8C8 " onkeyup="checkPass(); return false;" ></h3>
                                  <span id="confirmMessage" class="confirmMessage"></span>
        					<h3><p>Password must contain at least one number and one uppercase and lowercase letter, and length:8-13</p></h3>
							<?php if($_SESSION['user']=="doctor" OR $_SESSION['user']=="hospital")
							{
								echo
							"<center><h2 class='uk-text-muted'>---".$str1."---</h2></center>
			<br/>
			Upload License Certificate: <br/></br>
				<center><div class='uk-grid-small' uk-grid>
				<img id='imagefile'  style='height: 100px;' />

<input type='file' 
    onchange='document.getElementById('imagefile').src = window.URL.createObjectURL(this.files[0]) ' name='".$s."'>
				</div></center>";
							}?>
            
            </div>
<br>
<center> <button class="btn" name="submit" type="submit" >register</button> </center>
</form>
<br><br>
</div>
</body>

</html>