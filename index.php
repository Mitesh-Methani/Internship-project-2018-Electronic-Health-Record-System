<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Electronic Health Record System</title>
<link rel="stylesheet" href="css/designhome.css">
<style>
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#26262c;
  display:none;
}  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:850px;
  display:none;
  z-index:9999;
  padding:20px;
  border-radius: 5px;
  text-align: center;
}
#boxes #dialog {
  width:450px; 
  height:auto;
  padding: 10px 10px 10px 10px;
  background-color:white;
  font-size: 15pt;
}

.agree:hover{
  background-color: #D1D1D1;
}
.popupoption:hover{
 background-color:#D1D1D1;
 color: green;
}
.popupoption2:hover{
 color: red;
}

</style>
</head>
<body>
    <header>
        <div id="logo"></div> 
        <div id="title">Electronic Health Record System</div>
    </header>
    <div class="content">
        <a class="icon patient_register" href="healthrecord.php?who=patient" >
		<div><br><img src="images/patient.png"></div>
            <div class="logo pRegisterl"></div>
            <div class="title pRegistert"> For Patients</div>
        </a>
        <a class="icon hospital_register" href = "healthrecord.php?who=hospital">
		<div><br><img src="images/hospital.png"></div>
            <div class="logo hRegisterl"></div>
            <div class="title hRegistert"> For Hospitals</div>
        </a>
        <a class="icon doctor_register" href = "healthrecord.php?who=doctor">
		    <div><br><img src="images/doctor.png"></div>
            <div class="logo d_registerl"></div>
            <div class="title d_registert">For Doctors</div>
        </a>
		 <a href="guidelines.php"><button id="info">GUIDELINES</button>
    </div>
	<div id="boxes">
<div style="top: 30%; left: 50%; display: none;" id="dialog" class="window"> 
<div id="san">
<a href="#" class="close agree"><img src="images/close-icon.jpg" width="25" style="float:right; margin-right: -10px; margin-top: -10px;"></a>
Welcome to Electronic Health Records System
<img src="images/welcome.jpg"> 
</div>
</div>
<div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;" id="mask"></div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> 
<script src="js/popup.js"></script>
</body>
</html>
