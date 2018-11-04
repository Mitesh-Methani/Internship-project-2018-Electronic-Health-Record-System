<?php
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Electronic Health Record System</title>
	<link rel="stylesheet" href="css/index.css?1529743817">
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<!-- UIkit CSS -->
	<!-- UIkit CSS -->
    <link rel="stylesheet" href="../css/uikit.min.css" />
    <link rel="stylesheet" href="../css/uikit-rtl.min.css" />
    <!-- UIkit JS -->
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
	<script type="text/javascript" src="js/index.js?1529743817"></script>
</head>
<body onload="onLoad()">
	<!-- <header>
			<div id="logo"></div> 
			<div id="title">Electronic Health Record System</div>
	</header> -->
	<div class="uk-background-secondary uk-light uk-padding-small uk-margin-small">
		<h1 class="uk-heading-line"><span>Electronic Health Record System</span></h1>
	</div>
	<center><div class="uk-padding-small">
		<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
			<form class="uk-form-width-1-2@m uk-form uk-text-primary" action="index.php" method="POST"  onsubmit="return checkform(this);">

				<h1 class="uk-card-title">Hospital Registration</h1>

				Registration Number:<br />
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" name="registration_no">
				<span class="required">*</span><br/>
				
				Hospital Name:<br />
				<input type="text" class="uk-input uk-width-5-6 uk-margin-small" name="hospital_name" required>
				<span class="required">*</span><br />
				
				Street Name:<br />
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" name="street_1" required>
				<span class="required">*</span><br/>
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" name="street_2"><br/>

				City/Town Name:<br />
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" name="city_town" required>
				<span class="required">*</span><br/>

				State:<br />
				<select required class="uk-select uk-margin-small uk-width-5-6" name="state">
					<option value="">------------Select State------------</option>
					<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
					<option value="Andhra Pradesh">Andhra Pradesh</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Assam">Assam</option>
					<option value="Bihar">Bihar</option>
					<option value="Chandigarh">Chandigarh</option>
					<option value="Chhattisgarh">Chhattisgarh</option>
					<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
					<option value="Daman and Diu">Daman and Diu</option>
					<option value="Delhi">Delhi</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="Jammu and Kashmir">Jammu and Kashmir</option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Karnataka">Karnataka</option>
					<option value="Kerala">Kerala</option>
					<option value="Lakshadweep">Lakshadweep</option>
					<option value="Madhya Pradesh">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Manipur">Manipur</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Orissa">Orissa</option>
					<option value="Pondicherry">Pondicherry</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Tamil Nadu">Tamil Nadu</option>
					<option value="Tripura">Tripura</option>
					<option value="Uttaranchal">Uttaranchal</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="West Bengal">West Bengal</option>
				</select>
				<span class="required">*</span><br/>

				Postal Code:<br />
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" pattern="[0-9]{6}$" name="postal_code" required>
				<span class="required">*</span><br/>

				Contact Number:<br />
				<input type="text" class="uk-input uk-margin-small uk-width-5-6" pattern="[0-9]{10}$" name="contact_number" required>
				<span class="required">*</span><br/>
				
				Email Address:<br />
				<input type="email" class="uk-input uk-margin-small uk-width-5-6" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" required>
				<span class="required">*</span><br/>

	<!-- START CAPTCHA -->
				Captcha:<br />
				<div class="capbox">

					<div id="CaptchaDiv"></div>

						<div class="capbox-inner">
							Type the above number: <br/>

							<input type="hidden" id="txtCaptcha">
							<input type="text" name="CaptchaInput" id="CaptchaInput" size="15"><br>

					</div>

				</div><br /><br />
	<!-- END CAPTCHA -->
				
				<input type="submit" class="uk-button-primary uk-text-bold uk-text-large uk-width-5-6" value="Register">

			</form>
		</div>
	</div></center>
</body>
</html>