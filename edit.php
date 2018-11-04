	<html>
<?php include("session.php") ?>
	<head>
		<title>Patient Registration</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/uikit.min.css?1529476471" />
		<script src="js/jquery.js"></script>
		<script src="js/instascan.min.js"></script>
		<script src="js/uikit.min.js"></script>
		<script src="js/uikit-icons.min.js"></script>
		<script src="register/js/patient.js"></script>
		<link rel="stylesheet" type="text/css" href="register/css/addpatient.css?1529476471">
		<link rel="stylesheet"  href="css/designhome.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
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
	width:150px;
	background-color:#8e1909;
	color:white;
	border-radius:5px;
}
#eform
{
 margin-left:100px;
 width:100%;
 height:100%;

 padding: 12px 20px;
    box-sizing: border-box;
    border: 3px solid #8e1909;
    border-radius: 4px;
    font-size: 16px;
	color:black;
	background-color:white;
}
</style>
	</head>

	<body style="background-color:white">
	<?php 
	$db=mysqli_connect("localhost","root","","ehr_healthcare");
	$q="SELECT * FROM `patients` WHERE `uidai` = '$_SESSION[username]' ";

$r=mysqli_query($db,$q);
$list=mysqli_fetch_assoc($r);?>
	
			<ul class="uk-breadcrumb uk-margin-left" >
			<li class="uk-disabled"><a href="#" style="color:blackS; font-size:25px;">Edit Profile</a></li>
			</ul>

	<center><div id="external" class="uk-grid-small" uk-grid >

		<div class="div1 uk-width-1-2@s uk-margin-small" style="background-color:white">

			<div id="div2" class="uk-margin-small uk-card uk-card-default uk-card-body" style="background-color:white">
				<form id="eform" action="savep.php" method="post" ><center>

					<center><h2 class="uk-text-muted">--------Details--------</h2></center><br/>
<!--Name, Address, Email, Mobile-->
					<div>
						<input type="text" class="uk-input" maxlength="50" id="name" placeholder="Patient Name" required value="<?php echo $list['name'];?>"/> <br/><br/>
					
						<textarea class="uk-textarea" rows="4" placeholder="Address" id="add" required  value="<?php echo $list['address'];?>" style="resize: none;"></textarea><br/><br/>

						<div class="uk-inline uk-width-1-1">
							<span style="height:40px;" class="uk-form-icon" uk-icon="icon: mail" ></span>
							<input type="email" class="uk-input" placeholder="Email id" id="email" required value="<?php echo $list['email_id'];?>" /><br/><br/>
						</div>

						<div class="uk-grid-small" uk-grid>
							<div class="uk-width-1-6">
								<input class="uk-input" value="+91" id="country_code" disabled>
							</div>
							<div class="uk-width-1-2@s">
								<input type="number" class="uk-input" minlength="10" maxlength="10" placeholder="Mobile No"  value="<?php echo $list['mobile'];?>" id="mob" required/> <br/><br/>
							</div>
						</div>

						
					</div>

<!--PIN, DOB-->
						<div class="uk-grid-small" uk-grid>
							<div class="uk-width-1-2@s">
								Date Of Birth :	<input type="date" class="uk-input" id="dob"/ required value="<?php echo $list['dob'];?>" >	<br/><br/>
							</div>
						</div>
					
<!--Gender -->
						<div class="uk-grid-small" uk-grid>
							 &nbsp&nbsp
								Gender :&nbsp&nbsp&nbsp&nbsp
                            <div class="uk-width-1-2@s"required>
								<input type="radio" name="gender" class="uk-radio" value="Male" label="Male" id="male"/>Male &nbsp&nbsp&nbsp
								<input type="radio" name="gender" class="uk-radio" value="Female" name="Female" id="female"/>Female &nbsp&nbsp&nbsp
                               <br> <input type="radio" name="gender" class="uk-radio" value="Other" label="Other" id="other"/>Other<br/><br/>
							</div>

                            
                         
	
                    </div>
<!--Submit Button
	<br/><br/>
	<div class="uk-width-1-3@s" style="display:none">
								<button class="uk-button uk-button-primary" id="submit" style="background-color:#8e1909;color:white;border-radius:8px;" ><b>Next</b></button>
							</div>
	<input type="submit" class="uk-button uk-button-primary"  id="submit" style="background-color:#8e1909;color:white;border-radius:8px;" href="patient-2.php" value="NEXT">-->
				
			</div>
		</div>
	<br><br>
<center><button class="uk-width-1-4 uk-text-large uk-button uk-button-primary uk-button-large" type="button" id="savebtn">SAVE</button></center></center>
	</form>
				<!--Submit Button-->
	<br/><br/>
	
	</div></center>			

	</body>

</html>