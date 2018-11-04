<?php 
session_start();
if(isset($_POST['Sub'])){
				
				$u=$_SESSION['uidai'];
				print_r($_POST);
				$db=mysqli_connect("localhost","root","","ehr_healthcare")OR die("died");
				$dis2=array($_POST['disease1'],$_POST['disease2'],$_POST['disease3'],$_POST['disease4'],$_POST['other']);
				$d=implode('_',$dis2);
				$w= $_POST['weight'];
				$q=" INSERT INTO `generalhealth`  (weight, feet, inches, bmi, blood, eright, eleft, diseases, allergy ,uidai) VALUES ($w, $_POST[feets] , $_POST[inches] ,$_POST[bmi],'$_POST[blood]','$_POST[right]','$_POST[left]','$d','$_POST[allergies]', '$u' )";
				
				$r=mysqli_query($db,$q);
				if($r){
					header("Location:../login.php?who=patient"); 
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
	<link rel="stylesheet" href="../css/css/index.css?1529572706">
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" href="../css/designhome.css">
	<!-- UIkit CSS -->
	<!-- UIkit CSS -->
    <link rel="stylesheet" href="../css/uikit.min.css" />
    <link rel="stylesheet" href="../css/uikit-rtl.min.css" />
    <!-- UIkit JS -->
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
	<script type="text/javascript" src="js/index.js?1529572706"></script>
	
	<script type="text/javascript">
		    $(function(){

    $('#pointspossible').on('input', function() {
      calculate();
    });
    $('#pointsgiven').on('input', function() {
     calculate();
    });
    function calculate(){
        var pPos = parseInt($('#pointspossible').val()); 
        var pEarned = parseInt($('#pointsgiven').val());
        var perc="";
        if(isNaN(pPos) || isNaN(pEarned)){
            perc=" ";
           }else{
           perc = ((pEarned/pPos) * 100).toFixed(3);
           }

        $('#pointsperc').val(perc);
    }

});
	</script>
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
	<script>
		    $(function(){

    $('#pointspossible').on('input', function() {
      calculate();
    });
    $('#pointsgiven').on('input', function() {
     calculate();
    });
    function calculate(){
        var pPos = parseInt($('#pointspossible').val()); 
        var pEarned = parseInt($('#pointsgiven').val());
        var perc="";
        if(isNaN(pPos) || isNaN(pEarned)){
            perc=" ";
           }else{
           perc = ((pEarned/pPos) * 100).toFixed(3);
           }

        $('#pointsperc').val(perc);
    }

});
	</script>
</head>
<body  style="margin:0 0" text="black">
	<div>

</div>
	<div class="uk-padding-small" >
		<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m" style="width:650px; margin:auto">
			<form class="uk-form-width-1-2@m uk-form" action="" method="POST"  id="fitnessform" >

				<h1 class="uk-card-title">Fitness Details</h1>

				Weight:<br>
				<input id="pointspossible" type="text" class="uk-input uk-margin-small uk-width-5-6" name="weight" >
				<span>(kGs)</span><br/>
				
				Height:<br>
				<input id="pointsgiven" type="text" class="uk-input uk-width-5-6 uk-margin-small" name="feets" >
				<span>(feets)</span><br>
				
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" name="inches" >
				<span>(Inches)</span><br/>
                BMI:<br>
				<input id="pointsperc" type="text" class="uk-input uk-margin-small uk-width-5-6" name="bmi" ><br/>
                
                Blood Group:<br>
<select name="blood" style="width:490px" id ="blood_group">
<option  value="A+">A+</option>
<option value="A-">A-</option>
<option  value="B-+">B+</option>
<option  value="B-">B-</option>
<option  value="O+">O+</option>
<option   value="O-">O-</option>
<option  value="AB+">AB+</option>
<option  value="AB-">AB-</option>
</select><br/><br/>
Eyesight:<br>
<input type="number" step="0.01" class="uk-input uk-margin-small uk-width-5-6" id="right" name="right" >&nbsp(right)<br>
<input type="number" step="0.01" class="uk-input uk-margin-small uk-width-5-6" id="left" name="left" >&nbsp(left)
<br><br>
Diseases:<br>
  <input  type="checkbox" name="disease1" value="blood-pressure">Blood-Pressure<br>
  <input   type="checkbox" name="disease2"  value="diabetes">Diabetes<br>
  <input  type="checkbox" name="disease3" value="asthma">Asthma<br>
  <input   type="checkbox" name="disease4" value="cardiovascular">Cardiovascular Diseases<br>
  <input type="text" class="uk-input uk-margin-small uk-width-5-6" name="other" placeholder="any other please specify"><br><br> 
  Allergies: <br><input type="text" class="uk-input uk-margin-small uk-width-5-6" id="allergies" name="allergies" placeholder=" Any known allergies? " >
  
  <input type='hidden' value=1 name ='Sub' />

				<br><br>
				<center><input style="border-radius: 5px;" type="submit" class="uk-button-primary uk-text-bold uk-text-large " 

value="SAVE" id="savebtn"></center>

			</form>
		</div>
	</div>
</body>
</html>