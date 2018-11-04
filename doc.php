<!DOCTYPE HTML>
<?php include("session.php");
?>

<?php 
$db=mysqli_connect("localhost","root","","ehr_healthcare")OR die("died");
?>
<html>
<head>
<meta charset="UTF-8">
<title>Electronic Health Record System</title>
<link rel="stylesheet" href="css/index.css?<?php echo time();?>">
<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Source+Sans+Pro|Lato" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<style>
	.doct{
		width: 900px;
		height: 700px;
		border: 1px solid black;
	}
</style>

</head>
<body>
<?php 
$who=$_SESSION['whoami'];
if(strcmp($who,"patient")==0)
{
	include("patientdash.php");
	$u=$_SESSION['username'];
}
elseif(strcmp($who,"doctor")==0)
{
	include("doctordash.php");
	$u=$_GET['id'];
}
 ?></div><br><br><br>
   	<div class="row" style="margin-left:25px">
   		<form class="form-inline" method="get" action="">
			<input type="text" class="form-control mb-2 mr-sm-2" id="uidai" name="uidai" value="<?php echo $u;?>" disabled placeholder="Uidai">
			  <select name="des" id="des" class="form-control mb-2 mr-sm-2" style="width:490px" value="<?php echo $_POST['des'];?>">
				<option <?php if($_GET['des']=="Heart"){echo "selected";}?> value="Heart">Heart</option>
				<option <?php if($_GET['des']=="Abdomen"){echo "selected";}?>  value="Abdomen">Abdomen</option>
				<option <?php if($_GET['des']=="Bladder"){echo "selected";}?>  value="Bladder">Bladder</option>
				<option <?php if($_GET['des']=="Bones"){echo "selected";}?>  value="Bones">Bones</option>
				<option <?php if($_GET['des']=="Brain and spinal cord"){echo "selected";}?>  value="Brain and spinal cord">Brain and spinal cord</option>
				<option <?php if($_GET['des']=="Bronchial muscles"){echo "selected";}?>  value="Bronchial muscles">Bronchial muscles</option>
				<option <?php if($_GET['des']=="Ear"){echo "selected";}?>  value="Ear">Ear</option>
				<option  <?php if($_GET['des']=="Eye"){echo "selected";}?> value="Eye">Eye</option>
				<option  <?php if($_GET['des']=="Immune system of the body"){echo "selected";}?> value="Immune system of the body">Immune system of the body</option>
				<option  <?php if($_GET['des']=="Intestine"){echo "selected";}?> value="Intestine">Intestine</option>
				<option  <?php if($_GET['des']=="Joints"){echo "selected";}?> value="Joints">Joints</option>
				<option  <?php if($_GET['des']=="Liver"){echo "selected";}?> value="Liver">Liver</option>
				<option  <?php if($_GET['des']=="Lungs"){echo "selected";}?> value="Lungs">Lungs</option>
				<option  <?php if($_GET['des']=="Nerves"){echo "selected";}?> value="Nerves">Nerves</option>
				<option  <?php if($_GET['des']=="Nerves and limb"){echo "selected";}?> value="Nerves and limb">Nerves and limb</option>
				<option  <?php if($_GET['des']=="Nose"){echo "selected";}?> value="Nose">Nose</option>
				<option  <?php if($_GET['des']=="Pancreas and blood"){echo "selected";}?> value="Pancreas and blood">Pancreas and blood</option>
				<option  <?php if($_GET['des']=="Skin"){echo "selected";}?> value="Skin">Skin</option>
				<option  <?php if($_GET['des']=="Spinal cord"){echo "selected";}?> value="Spinal cord">Spinal cord</option>
				<option  <?php if($_GET['des']=="Spleen"){echo "selected";}?> value="Spleen">Spleen</option>
				<option  <?php if($_GET['des']=="Stomach"){echo "selected";}?> value="Stomach">Stomach</option>
				<option  <?php if($_GET['des']=="Teeth"){echo "selected";}?> value="Teeth">Teeth</option>
				<option  <?php if($_GET['des']=="Throat"){echo "selected";}?> value="Throat">Throat</option>
				<option  <?php if($_GET['des']=="Thyroid gland"){echo "selected";}?> value="Thyroid gland">Thyroid gland</option>
				<option  <?php if($_GET['des']=="Tongue"){echo "selected";}?> value="Tongue">Tongue</option>
				<option  <?php if($_GET['des']=="Tonsils"){echo "selected";}?> value="Tonsils">Tonsils</option>

  			</select>

			<input type="hidden" value="1" name="sub" />
			<input type="hidden" value="<?php echo $u; ?>" name="id" />
			
			<button type="submit" class="btn btn-primary mb-2">Submit</button>
   		</form>
   	</div>
		<div class="row" style="margin-left:15px">
			<div class="col-md-3">
				<ul class="list-group">
				<?php
				$des=$_GET['des'];
				$u=$_GET['id'];
				$dir = 'doc/'.$u.'/'.$des;
						echo $dir;
				// Open a directory, and read its contents
				if (is_dir($dir)){
				
				  if ($dh = opendir($dir)){
				    $file = scandir($dir);

					if($file[0]==NULL){?>
					<?php }
					
				    foreach($file as $file) {
				    	if($file!='.' AND $file!=".."){
				    	//$dir.='/'.$file;
						?>
				  <a href="doc.php?des=<?php echo $des;?>&file=<?php echo $file;?>&id=<?php echo $u; ?>" class="list-group-item list-group-item-action flex-column align-items-start ">
				    <div class="d-flex w-100 justify-content-between">
				      <h5 class="mb-1"><?php echo $file;?></h5>
				      
				    </div>
				    <p class="mb-1"><?php echo $file;?></p>
				  </a>
				    <?php }
					}
				    closedir($dh);
				  }
				}else{ 
				
				?>
					<div class="alert alert-danger" role="alert">
 EMPTY FOLDER
</div>
				<?php }?>
				
			</div>
			
			<div class="col-md-9" >
				<?php if(isset($_GET['file'])){?>
					<div class="doct">
						<embed alt="" src="<?php echo $dir.'/'.$_GET['file'];?>" width=100% height=100%/>
								
					</div>
				<?php }  ?>
			</div>
		
		</div>
   
</body>
</html>
<!---->