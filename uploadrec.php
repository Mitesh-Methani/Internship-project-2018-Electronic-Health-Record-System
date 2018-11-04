<!DOCTYPE html>
<html>
<head>
<?php 
include("session.php");
$who = $_SESSION['whoami'];
?>
<?php 
error_reporting(0);
?>

<?php 
$db=mysqli_connect("localhost","root","","ehr_healthcare")OR die("died");
?>
<title>Upload REC</title>
<script src="js/dropzone.js"></script>
<link rel="stylesheet" href="css/dropzone.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
<?php
if(isset($_GET['upload'])){
	$u=$_GET['upload']; ?>
	<?php if($u=='1'){?>
		<script>
			alert("file uploaded");
		</script>
	<?php } ?>
	<?php if($u=='0'){?>
		<script>
			alert("You don't have upload access to this User ID. please ask patient to grant access");
		</script>
	<?php } ?>
	<?php if($u=='2'){?>
		<script>
			alert("Select File");
		</script>
	<?php } ?>



<?php }?>


<style> 
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    
}
input[type=button] {
    width: 50%;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 3px outset;
    background-color:lime;
}
.header ul{
  margin: 0;
  padding: 15px;
  list-style-type: none; 
  background-color: #dddddd;
}
.header a.active {
  background-color: white;
}

.header li{
  display: inline;
  text-align: center;
  padding: 14px 16px;
  font-size: 20px;
  
}
.header li a{
  color: black;
  padding: 8px;
  text-decoration:none;
  border-radius: 4px;
}
.header li a:hover {
  background-color: #e87696;
  color: blue;
}
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;

}

.upload-btn-wrapper :hover{


}
</style>




</head>
<body style=" margin: 0px; padding: 0px;">
<?php 
if(strcmp($who,"patient")==0)
{
	include("patientdash.php");
	$u=$_SESSION['username'];
	$d="disabled";
}
elseif(strcmp($who,"doctor")==0)
{
	include("doctordash.php");
	$u=""; $d="";
	
}
else
{
	include("hospitaldash.php");
	$u=""; $d="";
	
}
 ?></div><br><br><br><br><br>
<div style="width:650px; margin:auto;background-color:white;padding:30px;box-shadow:5px 5px 5pxs #696969;">

<form class="uk-form-width-1-2@m uk-form uk-text-primary" action="upload.php" enctype="multipart/form-data" method="POST"   
 
onsubmit="return checkform(this);"> 
 
                <!--<h1 class="uk-card-title">Fitness Details</h1>--> 
 
                UIDAI:<br> 
                <?php
				if(strcmp($who,"patient")==0)
            {
				$user= $_SESSION['username'];
				echo "<input type='text' class='uk-input uk-margin-small uk-width-5-6'  id='uidai'  value= $user  name='uidai' disabled ><br><br> ";
            }
			else
            {
				echo "<input type='text' class='uk-input uk-margin-small uk-width-5-6'  id='uidai'  name='uidai'  placeholder='Aadhar Number'><br><br> ";
            }

            ?>     
                Illness:<br> 
                <input type="text" class="uk-input uk-width-5-6 uk-margin-small" id="ilns" name="ilns" placeholder="Name of ILLNESS"><br> <br><br>
                 
                 
                Category:<br> 
  <select name="des" id="des" class="uk-select" style="width:650px;font-size:20px;">
  <option value="Heart">Heart</option>
    <option value="Abdomen">Abdomen</option>
    <option value="Bladder">Bladder</option>
    <option value="Bones">Bones</option>
    <option value="Brain and spinal cord">Brain and spinal cord</option>
    <option value="Bronchial muscles">Bronchial muscles</option>
    <option value="Ear">Ear</option>
    <option value="Eye">Eye</option>
    <option value="Immune system of the body">Immune system of the body</option>
    <option value="Intestine">Intestine</option>
    <option value="Joints">Joints</option>
    <option value="Liver">Liver</option>
    <option value="Lungs">Lungs</option>
    <option value="Nerves">Nerves</option>
    <option value="Nerves and limb">Nerves and limb</option>
    <option value="Nose">Nose</option>
    <option value="Pancreas and blood">Pancreas and blood</option>
    <option value="Skin">Skin</option>
    <option value="Spinal cord">Spinal cord</option>
    <option value="Spleen">Spleen</option>
    <option value="Stomach">Stomach</option>
    <option value="Teeth">Teeth</option>
    <option value="Throat">Throat</option>
    <option value="Thyroid gland">Thyroid gland</option>
    <option value="Tongue">Tongue</option>
    <option value="Tonsils">Tonsils</option>

  </select>
  
<br><br><br><br>

<center><div class="">
  <!--<button class="btn" style="background-color:#8e1909;color:white;border:none">Upload a file</button>-->
  
  <input type="file" name="file" style="background-color:#8e1909;color:white;border:none" />
</div>
</center> <br>
<center>
	<button class="btn" type="submit"  id="submit" style="background-color:#8e1909;color:white;border:none"> Submit </button>
</center>
<!--
<center><div class="upload-btn-wrapper">
  <button class="btn">Upload a file</button>
  <input type="file" name="myfile" />
</div>
</center> -->
 
            </form> 
        </div> 
    </div> 
        <br><br><br><br><br><br>
</body> 
</html>