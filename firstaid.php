<!DOCTYPE html>
<html>
<head>
	<?php
	include("session.php");
	$who=$_SESSION['whoami'];
	if(strcmp($who,"patient")==0)
{
	$u=$_SESSION['username'];
	$p="Location: firstaid.php";
	include("patientdash.php");
}
else if(strcmp($who,"doctor")==0)
{
   $u=$_GET['id'];
   $p="Location: firstaid.php?id=".$_GET['id'];
   include("doctordash.php");
}   
	$host = "localhost";
	$user = "root";
	$databaseName = "ehr_healthcare";
	$password="";
    $connect = mysqli_connect($host,$user,$password,$databaseName);
	?>
<title>Page Titlefirst aid health records</title>
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
#firstaidform
{
 width:100%;
 height:100%;
 box-sizing: border-box;
 padding: 12px 20px;
    box-sizing: border-box;
    border: 3px solid #8e1909;
    border-radius: 4px;
    font-size: 16px;
}
</style>


</head>



<body style="margin: 0px; padding: 0px;">
<div>
<?php  ?>
</div>
<br><br><br><br><br><br>
<div style="width:650px; margin:auto;background-color:white;padding:30px;">
	<?php
	if(isset($_POST['submitted'])){
		$q="INSERT INTO `firstaid` (uidai,rid,pc,hpc,oa,oe,alg,imp,tx,plan,rp,cp,rr,egcs,vgcs,mgcs,cmeds,maj_inj,min_inj) VALUES ('$_POST[uidai]','$_POST[rid]','$_POST[pc]','$_POST[hpc]','$_POST[oa]','$_POST[oe]','$_POST[alg]','$_POST[imp]','$_POST[tx]','$_POST[plan]','$_POST[rp]','$_POST[cp]','$_POST[rr]','$_POST[egcs]','$_POST[vgcs]','$_POST[mgcs]','$_POST[cmeds]','$_POST[maj_inj]','$_POST[min_inj]')";
		$r=mysqli_query($connect,$q);
		if($r){
			echo"<script>
    (function() {
        alert('PREVIOUS RECORD WAS SUCCESSFULLY ADDED');
    })();
</script>";
			echo "<alert alert-success><center><h3>PREVIOUS RECORD WAS SUCCESSFULLY ADDED</h3></center></alert>";
			
		}else{
			echo mysqli_error($connect)."<br>querry:".$q;
		}
	}
	
	?>
<form method="post" action=""  id="firstaidform">
ID:<input type="text" id="uidai" name="uidai" placeholder="UIDAI" value=<?php echo $u; ?> >
RECORDER ID:<input type="text" id="rid" name="rid"  placeholder="Recorder's UIDAI">
PC: <input type="text" id="pc" name="pc" placeholder=" Presenting complaint">
HPC: <input type="text" id="hpc" name="hpc" placeholder="History of Presenting Complaint">
O/A: <input type="text" id="oa" name="oa" placeholder=" on arrival">
O/E: <input type="text" id="oe" name="oe" placeholder=" on examination">
ALLERGIES <input type="text" id="allergies" name="alg" placeholder=" Any known allergies? ">
IMP: <input type="text" id="imp" name="imp" placeholder=" Your impression of the patient / problem ">
TX: <input type="text" id="tx" name="tx" placeholder="  Specific treatment carried out by you">
PLAN: <input type="text" id="plan" name="plan" placeholder=" What’s the plan for this patient? Handover? Transport?">
<fieldset>
<legend>PULSE:</legend>
RADIAL:<input type="text" id="radial" name="rp" >
Carotid:<input type="text" id="carotid" name="cp" >
</fieldset>
respiratory rate::<input type="text" id="respiratory" name="rr" >
<fieldset>
<legend>The Glasgow Coma Scale (GCS):</legend>
EYES:<input type="text" id="eyes" name="egcs" >
VERBAL:<input type="text" id="verbal" name="vgcs" >
MOTAR:<input type="text" id="motar" name="mgcs" >
MEDICAL CONDITION:<input type="text" id="cmeds" name="cmeds" placeholder="Medical Condition">
</fieldset>
INJURIES:

<fieldset>
<legend>injuries</legend>
major:<input type="text" id="major" name="maj_inj" >
minor:<input type="text" id="minor" name="min_inj" >
</fieldset>
<br>
<center><button type="submit" value="save" id="savebtn">SAVE</button></center>
	<input type="hidden" name="submitted" value="1" />
	
	<input type="hidden" name="uidai"  id="uidai" value="<?php echo $u; ?>" />
</form>
</div>
</body>
</html>