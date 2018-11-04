	<!DOCTYPE html>
<?php include("session.php");
$who=$_SESSION['whoami'];

?>
<html>
	<head>
		<title>Display|FirstAid</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<?php
	error_reporting(0);
	$host = "localhost";
	$user = "root";
	$password="";
	$databaseName = "ehr_healthcare";

	$connect = mysqli_connect($host,$user,$password,$databaseName);
	?>
	</head>
	<body>
	<?php 
if(strcmp($who,"patient")==0)
{
	include("patientdash.php");
	$show=$_SESSION['username'];
	$p="patient-3.php";
	$q="firstaid.php";
}
elseif(strcmp($who,"doctor")==0)
{
	include("doctordash.php");
	$show=$_GET['id'];
	$p="patient-3.php?id=".$_GET['id'];
	$q="firstaid.php?id=".$_GET['id'];
}
 ?></div><br><br><br><br><br>
		<div class="container" style="border:2px solid #8e1909; background-color: white;">
		<center>General Health</center>
		<div class="row">
			<form class="form-inline mb-2" method="post" action="" style="margin-left:20px;margin-top:14px;">
				<input class="form-control mb-2" type="text" value=
				"<?php echo $show; ?>"
				name="uidai" 
				disabled />
				<pre>       </pre>
				<input class="form-control mb-2" type="hidden" name="S" value="1"/>
				<button class="form-control  mb-2" type="submit">Display</button>
				<pre>                                                                             </pre>
			</form>	
			<a href=<?php echo $p; ?> style="text-decoration:none;"><button class="form-control  mb-2" type="submit">Update Record</button></a>
		</div>
		<?php
	if(isset($_POST['S'])){
		$q="SELECT * FROM generalhealth WHERE uidai='$show'";
		$r=mysqli_query($connect,$q);
		if($r){
			$list1=mysqli_fetch_assoc($r);?> 
		<div class="row" style="border:2px solid #8e1909;">

			<div class="col-md-4" style="border:1px solid #8e1909; padding:5px;">
				<input class="form-control mb-2" type="text" disabled value="UIDAI"/>
				<input class="form-control mb-2" type="text" disabled value="Weight"/>
				<input class="form-control mb-2" type="text" disabled value="Height(feets)"/>
				<input class="form-control mb-2" type="text" disabled value="Height(inches)"/>
				<input class="form-control mb-2" type="text" disabled value="BMI"/>
				<input class="form-control mb-2" type="text" disabled value="Blood Group"/>
				<input class="form-control mb-2" type="text" disabled value="Eyesight (right)"/>
				<input class="form-control mb-2" type="text" disabled value="Eyesight (left)"/>
				<input class="form-control mb-2" type="text" disabled value="Diseases"/>
				<input class="form-control mb-2" type="text" disabled value="Allergies"/>
			</div>
			<div class="col-md-8" style="border:1px solid #8e1909; padding:5px;">
				<input class="form-control mb-2" type="text" disabled value="<?php echo $_SESSION['username']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list1['weight']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list1['feet']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list1['inches']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list1['bmi']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list1['blood']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list1['eright']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list1['eleft']; ?>"/>
				<?php $str=str_replace("__",",",$list1['diseases']); ?>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $str; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list1['allergy']; ?>"/>
			</div>
			</div>
			<?php
						
		}else{
			echo mysqli_error($connect)."<br>querry:".$q;
		} }?>
		</div>
		
		
		<!--first aid-->
		<br><br><br>
		<div class="container" style="border:2px solid #8e1909; background-color: white;">
		<center>First Aid Record</center>
		<div class="row">
			<form class="form-inline mb-2" method="post" action="" style="margin-left:20px;margin-top:14px;">
				<input class="form-control mb-2" type="text" value="<?php echo $show;?>" name="uidai" disabled />
				<pre>       </pre>
				<input class="form-control mb-2" type="hidden" name="S1" value="1"/>
				<button class="form-control  mb-2" type="submit" onclick="firstaid();">Display</button>
				<pre>                                                                             </pre>
			</form>	
			<a href="<?php echo $q; ?>" style="text-decoration:none;"><button class="form-control  mb-2" type="submit">ADD Record</button></a>
		</div>
	<?php
	if(isset($_POST['S1'])){
		$q="SELECT * FROM firstaid WHERE uidai='$show'";
		$r=mysqli_query($connect,$q);
		if($r){
			
			while($list=mysqli_fetch_assoc($r)){?>
			
		<div class="row" style="border:2px solid #8e1909;">

			<div class="col-md-4" style="border:1px solid #8e1909; padding:5px;">
				<input class="form-control mb-2" type="text" disabled value="UIDAI"/>
				<input class="form-control mb-2" type="text" disabled value="Recorder's ID"/>
				<input class="form-control mb-2" type="text" disabled value="Present Complaint"/>
				<input class="form-control mb-2" type="text" disabled value="History Present Complaint"/>
				<input class="form-control mb-2" type="text" disabled value="On Arival"/>
				<input class="form-control mb-2" type="text" disabled value="On Examination"/>
				<input class="form-control mb-2" type="text" disabled value="Allergies"/>
				<input class="form-control mb-2" type="text" disabled value="Impression"/>
				<input class="form-control mb-2" type="text" disabled value="Treatment"/>
				<input class="form-control mb-2" type="text" disabled value="Plan"/>
				<input class="form-control mb-2" type="text" disabled value="Radia Pluse"/>
				<input class="form-control mb-2" type="text" disabled value="Carotid Pluse"/>
				<input class="form-control mb-2" type="text" disabled value="Respiratory Rate"/>
				<input class="form-control mb-2" type="text" disabled value="Eyes Glasgow Coma Scale"/>
				<input class="form-control mb-2" type="text" disabled value="Verbal Glasgow Coma Scale"/>
				<input class="form-control mb-2" type="text" disabled value="Motar Glasgow Coma Scale"/>
				<input class="form-control mb-2" type="text" disabled value="Medical Condition"/>
				<input class="form-control mb-2" type="text" disabled value="Major Injuery"/>
				<input class="form-control mb-2" type="text" disabled value="Minor Injuery"/>
			</div>
			<div class="col-md-8" style="border:1px solid #8e1909; padding:5px;">
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['uidai']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['rid']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['pc']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['hpc']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['oa']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['oe']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['alg']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['imp']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['tx']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['plan']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['rp']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['cp']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['rr']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['egcs']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['vgcs']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['mgcs']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['cmeds']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['maj_inj']; ?>"/>
				<input class="form-control mb-2" type="text" disabled value="<?php echo $list['min_inj']; ?>"/>
				
			</div>
			
			</div>
			<?php	
		}}else{
			echo mysqli_error($connect)."<br>querry:".$q;
		} }?>
		</div>
	
	</body>
</html>