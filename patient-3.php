<?php 
include("session.php");
$who=$_SESSION['whoami'];
if(strcmp($who,"patient")==0)
{
	$u=$_SESSION['username'];
	$p="Location: patient-3.php";
	include("patientdash.php");
}
else if(strcmp($who,"doctor")==0)
{
   $u=$_GET['id'];
   $p="Location: patient-3.php?id=".$_GET['id'];
   include("doctordash.php");
}   
$db=mysqli_connect("localhost","root","","ehr_healthcare")OR die("died");
$q="SELECT * FROM `generalhealth` WHERE `uidai` = '$u' ";

$r=mysqli_query($db,$q);
$list=mysqli_fetch_assoc($r);
$dis=explode('_',$list['diseases']);
			if(isset($_POST['Sub'])){
				
				$u=$_POST['user'];
				$dis2=array($_POST['disease1'],$_POST['disease2'],$_POST['disease3'],$_POST['disease4'],$_POST['other']);
				$d=implode('_',$dis2);
				$w= $_POST['weight'];
				$q=" UPDATE `generalhealth` SET weight = $w , feet=$_POST[feets] , inches=$_POST[inches] , bmi=$_POST[bmi], blood='$_POST[blood]', eright=$_POST[right], eleft=$_POST[left], diseases='$d', allergy='$_POST[allergies]' WHERE uidai='$u' ";
				
				$r=mysqli_query($db,$q);
				if($r){
					header($p); 
				}else{
					echo mysqli_error($db).'  q  '.$q;
				}
				
				
			}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>fitness details</title>
	<link rel="stylesheet" href="css/css/index.css?1529572706">
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" href="css/designhome.css">
	<!-- UIkit CSS -->
	<!-- UIkit CSS -->
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/uikit-rtl.min.css" />
    <!-- UIkit JS -->
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
	<script type="text/javascript" src="register/js/index.js?1529572706"></script>
	<style> 
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px inset;
}
input[type=button] {
    width: 50%;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 3px outset;
}
#savebtn
{
	height:50px;
	width:80px;
	background-color:#8e1909;
	color:white;
	border-radius:5px;
}
#fitnessform
{
 width:100%;
 height:100%;
 box-sizing: border-box;
 padding: 12px 20px;
    box-sizing: border-box;
    border: 3px solid #8e1909;
    border-radius: 4px;
    font-size: 16px;
	color:black;
}
</style>
</head>
<body  style="margin:0 0">
	<div>

</div>
<br><br><br><br><br><br>
	<div class="uk-padding-small" >
		<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m" style="width:650px; margin:auto">
			<form class="uk-form-width-1-2@m uk-form uk-text-primary" action="" method="POST"  id="fitnessform" >
			<?php $q="SELECT * FROM `generalhealth` WHERE `uidai` = '$u' ";

$r=mysqli_query($db,$q);
$list=mysqli_fetch_assoc($r); ?>

				<h1 class="uk-card-title">Fitness Details</h1>

				Weight:<br>
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" name="weight" value="<?php echo $list['weight']; ?>">
				<span>(kGs)</span><br/>
				
				Height:<br>
				<input type="text" class="uk-input uk-width-5-6 uk-margin-small" name="feets" value="<?php echo $list['feet']; ?>">
				<span>(feets)</span><br>
				
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" name="inches" value="<?php echo $list['inches']; ?>">
				<span>(Inches)</span><br/>
                BMI:<br>
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" name="bmi" value="<?php echo $list['bmi']; ?>"><br/>
                
                Blood Group:<br>
<select name="blood" style="width:490px" id ="blood_group">
<option <?php if($list['blood']=='A+'){ echo "selected";} ?> value="A+">A+</option>
<option <?php if($list['blood']=='A-'){ echo "selected";} ?> value="A-">A-</option>
<option <?php if($list['blood']=='B+'){ echo "selected";} ?> value="B-+">B+</option>
<option <?php if($list['blood']=='B-'){ echo "selected";} ?>  value="B-">B-</option>
<option <?php if($list['blood']=='O+'){ echo "selected";} ?>  value="O+">O+</option>
<option <?php if($list['blood']=='O-'){ echo "selected";} ?>  value="O-">O-</option>
<option <?php if($list['blood']=='AB+'){ echo "selected";} ?>  value="AB+">AB+</option>
<option <?php if($list['blood']=='AB-'){ echo "selected";} ?>  value="AB-">AB-</option>
</select><br/><br/>
Eyesight:<br>
<input type="number" class="uk-input uk-margin-small uk-width-5-6" id="right" name="right" value="<?php echo $list['eright']; ?>">&nbsp(right)<br>
<input type="number" class="uk-input uk-margin-small uk-width-5-6" id="left" name="left" value="<?php echo $list['eleft']; ?>">&nbsp(left)
<br><br>
Diseases:<br>
  <input <?php if($dis[0]!=''){ echo "checked";} ?>  type="checkbox" name="disease1" value="blood-pressure">Blood-Pressure<br>
  <input <?php if($dis[1]!=''){ echo "checked";} ?>  type="checkbox" name="disease2"  value="diabetes">Diabetes<br>
  <input <?php if($dis[2]!=''){ echo "checked";} ?>  type="checkbox" name="disease3" value="asthma">Asthma<br>
  <input <?php if($dis[3]!=''){ echo "checked";} ?>  type="checkbox" name="disease4" value="cardiovascular">Cardiovascular Diseases<br>
  <input type="text" class="uk-input uk-margin-small uk-width-5-6" name="other" placeholder="any other please specify" value="<?php echo $dis[4]; ?>"><br><br> 
  Allergies: <br><input type="text" class="uk-input uk-margin-small uk-width-5-6" id="allergies" name="allergies" placeholder=" Any known allergies? " value="<?php echo $list['allergy']; ?>">
  
  <input type='hidden' value=1 name ='Sub' />
  <input type='hidden' value=<?php echo $u; ?> name ='user' />

				<br><br>
				<center><input style="border-radius: 5px;" type="submit" class="uk-button-primary uk-text-bold uk-text-large " 

value="SAVE" id="savebtn"></center>

			</form>
			<?php 

			
			?>
		</div>
	</div>
</body>
</html>