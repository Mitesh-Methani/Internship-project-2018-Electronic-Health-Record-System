<!HTDOCS html>
<?php 
include("session.php");
$w=$_POST['submitted']; ?>
<html>
<head><link rel="stylesheet" href="designhome.css">
<?php
function btn()
 {
	$s=$_POST['dname'];
	$t=$_POST['did'];
	$p=$_POST['dhealth'];
	$conn=mysqli_connect("localhost","root","","ehr_healthcare");
	$q="SELECT doc FROM patients WHERE uidai = $_SESSION[username]";
	$r=mysqli_query($conn,$q);
	$list1=mysqli_fetch_assoc($r);
	$list1['doc'] = substr($list1['doc'], 1);
	$a=explode('_',$list1['doc']);
	$a=array_filter($a);
	
    array_push($a,$t);
	$str = implode("_",$a);
	$q=" UPDATE patients SET doc='$str' WHERE uidai=$_SESSION[username]";
				
				$r=mysqli_query($conn,$q);
 
 $q="SELECT mypatient FROM doctor WHERE d_id = $t";
	$r=mysqli_query($conn,$q);
	$list1=mysqli_fetch_assoc($r);
	$list1['doc'] = substr($list1['doc'], 1);
	$a=array_filter($a);
	$a=explode('_',$list1['mypatient']);
	$a=array_filter($a);
	
    array_push($a,$_SESSION['username']);
	$str = implode("_",$a);
	$q=" UPDATE doctor SET mypatient ='$str' WHERE d_id=$t";
				
				$r=mysqli_query($conn,$q);
   if($r){
	   echo "<script>alert('ADDED')</script>";
   }else{
	   echo mysqli_error($conn);
 }
 }
function btn2()
 {
	$s=$_POST['dname'];
	$t=$_POST['did'];
	$db=mysqli_connect("localhost","root","","ehr_healthcare");
	$q="SELECT myhospital FROM patients WHERE uidai = $_SESSION[username]";
	$r=mysqli_query($db,$q);
	$list1=mysqli_fetch_assoc($r);
	$list1['myhospital'] = substr($list1['myhospital'], 1);
	$a=explode('_',$list1['myhospital']);
	$a=array_filter($a);
    array_push($a,$t);
	$str = implode("_",$a);
	$q=" UPDATE patients SET myhospital='$str' WHERE uidai=$_SESSION[username]";
				
				$r=mysqli_query($db,$q);

 $q="SELECT patients FROM hospital WHERE hospital_id = $t";
	$r=mysqli_query($db,$q);
	$list1=mysqli_fetch_assoc($r);
	$list1['myhospital'] = substr($list1['myhospital'], 1);
	$a=explode('_',$list1['patients']);
	$a= array_filter($a);
    array_push($a,$_SESSION['username']);
	$str = implode("_",$a);
	$q=" UPDATE hospital SET patients='$str' WHERE hospital_id=$t";
				
				$r=mysqli_query($db,$q);
   if($r){
	   echo "<script>alert('ADDED')</script>";
   }else{
	   echo mysqli_error($db);
 }
 } 
 if(isset($_POST['addb']))
 {
	 $w=$_POST['submitted'];
   if($w==1)
	   btn();
   else if ($w==2)
	   btn2();
  }
 ?>
</head>
<?php include("patientdash.php"); ?><br><br><br>
<body>
<div id="main">
<div id="side"> <?php echo file_get_contents("sidebar.php"); ?></div>
<br><br><br><br>
<?php 
if ($w=='1'){ ?>
<center><form id="addaccess" method="post">
<label for="dname">Enter Doctor's name</label>
<input type="text" name="dname" required="required"><br><br>
<label for "did">Enter Doctor's ID&nbsp&nbsp&nbsp&nbsp</label>
<input type="text" required="required" name="did"><br><br>
<label for="dhealth">Health Center name</label>
<input type="text" name="dhealth" ><br><br>
<input type="hidden" name="submitted" value="1" >
<button type="submit" name="addb" class="pbtn">ADD</button> </center>
<?php } ?>
<?php 
if ($w==2){ ?>
<center><form id="addaccess" method="post">
<label for="dname">Enter Hospital name</label>
<input type="text" name="dname" required="required"><br><br>
<label for "did">Enter Hospital ID&nbsp&nbsp&nbsp&nbsp</label>
<input type="text" required="required" name="did"><br><br>
<button type="submit" name="addb" class="pbtn">ADD</button>
<input type="hidden" name="submitted" value="2" >
</form> </center>
<?php } ?>
</body>
</html>