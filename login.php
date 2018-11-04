<!DOCTYPE html>
<html>
<head>
  <title>Log in:EHR</title>
        <meta charset="UTF-8" >
		<link rel="stylesheet" type="text/css" href="css/style.css">
    
  <?php
	if($_GET['who']=="patient") {
    $who="patient";
	$str="register\patient1.php?user=".$who;
	$string="AADHAR NO.";
	$heading="PATIENT LOGIN";
}   
elseif($_GET['who']=="hospital") {
    $who="hospital";
	$str="register\hospital.php?user=".$who;
	$string="USER ID";
	$heading="HOSPITAL LOGIN";
}   
elseif($_GET['who']=="doctor") {
    $who="doctor";
	$str="register\doctor.php?user=".$who;
	$string="USER ID";
	$heading="DOCTOR LOGIN";
} 
?> 
<style>

      
form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #8e1909;
    color: white;
    font-size: 17px;
    border: 1px solid #8e1909;
    border-left: none;
    cursor: pointer;
}
</style>
        
    </head>
<body style="margin:0;">
    
    
<!-- header --> 
<div class="head">
<h1>Electronic Health Record Sytem</h1>
</div>
<div class="nav">
<nav>
<ul>
<li><a href="index.php">Home</a></li>
</ul>
</nav>
</div>
<br><br> 
<center><h2><?php echo $heading; ?></h2><center> 
  <div class="header">
  	<h2 style="background-color:#8e1909;">Login</h2>
  </div>
  
  <form method="post"  action="checkpass.php?who=<?php echo $who; ?>" >
  
  	<div class="input-group">
  		<label><?php echo $string; ?></label>
  		<input type="text" name="username" required="required" >
  	</div>
  	<div class="input-group">
  		<label>PASSWORD</label>
  		<input type="password" name="password" required="required" >
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet registered? <a href= "<?php  echo $str; ?>">Sign up</a><br>
		<a href= "<?php echo "forgot.php?user=".$who; ?>">Forgot Password</a>
  	</p>
  </form>
</body>
</html>