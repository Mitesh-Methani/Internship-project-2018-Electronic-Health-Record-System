<?php include("session.php");
$who = $_SESSION['whoami'];?>
<!HTDOCS html>
<html>
<head><link rel="stylesheet" href="designhome.css">
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
<?php
function btn()
 {
	$who = $_SESSION['whoami']; 
	$s=$_SESSION['username'];
	$t=$_POST['pass1'];
	$t=md5($t);
	$c=md5($_POST['current']);
	 if(strcmp($who,"patient")==0)
{
 $s = "SELECT `password` FROM `patients` WHERE `patients`.`uidai` = '$_SESSION[username]' " ;
 $sql = " UPDATE `patients` SET `password` = '$t' WHERE `patients`.`uidai` = '$_SESSION[username]' ";
}
else if(strcmp($who,"doctor")==0)
{
$s = "SELECT `password` FROM `doctor` WHERE `doctor`.`d_id` = '$_SESSION[username]' " ;
 $sql = " UPDATE `doctor` SET `password` = '$t' WHERE `doctor`.`d_id` = '$_SESSION[username]' ";
}
else if(strcmp($who,"hospital")==0)
{
$s = "SELECT `password` FROM `hospital` WHERE `hospital`.`hospital_id` = '$_SESSION[username]' " ;
 $sql = " UPDATE `hospital` SET `password` = '$t' WHERE `hospital`.`hospital_id` = '$_SESSION[username]' ";
}
	$conn=mysqli_connect("localhost","root","","ehr_healthcare");
    $r=mysqli_query($conn,$s);
		if($r){
			$list1=mysqli_fetch_assoc($r);
		if(strcmp($list1['password'],$c)==0)
		{
	$r=mysqli_query($conn,$sql);
	if($r){
	   echo "<script>alert('Password changed')</script>";
   }else{
	   echo mysqli_error($conn);
 }
 }
else{
echo "<script>alert('Current password is incorrect')</script>";}
  }
  $_POST['S']=0;}
 if(isset($_POST['S']))
 {
   btn();
  }
 ?>
 </head>
<body>
<?php if(strcmp($who,"patient")==0)
{
echo "<div>"; 
include("patientdash.php");
echo "</div><br><br><br>";
echo "<div id='main'><div id='side'> ";
 echo file_get_contents("sidebar.php");
 echo "</div>";
}
else if(strcmp($who,"doctor")==0)
{
echo "<div>"; 
include("doctordash.php");
echo "</div><br><br><br>";
echo "<div id='main'>";
}
else if(strcmp($who,"hospital")==0)
{
echo "<div>"; 
include("hospitaldash.php");
echo "</div><br><br><br>";
echo "<div id='main'>";
}
?>
<form id="chpwd" method="post" style="font-size:25px" action="peracc.php">
<br><br><br><br>
<div align="center">
<label>User ID&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
<input type="text" name="uid" required="required" style="width:200px;" disabled value="<?php echo $_SESSION['username']; ?>"><br><br>
<label>Enter Current Password</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="password" required="required" id="current" name="current" style="width:200px;"><br><br>
<div class="fieldWrapper">
            <label for="pass1">New Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
			
            <input type="password" name="pass1" id="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" style="width:200px"><br><br>
			Password must contain atleast 8 characters ( Atleast one digit, one lowercase and one uppercase alphabet )
        </div><br>
		
        <div class="fieldWrapper">
            <label for="pass2">Confirm Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			</label>
            <input type="password" name="pass2" id="pass2" onkeyup="checkPass(); return false;" style="width:200px;">
			<br><br>
            <span id="confirmMessage" class="confirmMessage"></span>
        </div><br>
<button type="submit" name="set" style="height:50px;width:100px;background-color:#8e1909;border-radius:5px;">CHANGE</button>
<input class="form-control mb-2" type="hidden" name="S" value="1"/>
</div>	
 </form> 
</body>
</html>