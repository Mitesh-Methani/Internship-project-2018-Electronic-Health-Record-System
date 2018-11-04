<!DOCTYPE HTML>
<?php 
include("session.php");
$u=$_SESSION['username'];
?>
<html>
<head>
<meta charset="UTF-8">
<title>Electronic Health Record System</title>
<link rel="stylesheet" href="css/designhome.css">
</head>
<body>
<header>
        <div id="logo"></div> 
        <div id="title">Electronic Health Record System</div>
<nav class="header">
<ul>
<li><a href="index.php">Home</a></li>
<li>|</li>
<li><a href="healthrecord.php">Patient Records</a></li>
<li>|</li>
<li><a href="uploadrec.php">Upload Health Records</a></li>
<li>|</li>
<li><a href="peracc.php">Privacy and Settings</a></li>
<li>|</li>
<li><a href="guidelines.php">Guidelines</a></li>
<li id="avatar" style="margin-left:100px;font-size:20px;"><button id="profile"><center><b>
<?php 
$db = mysqli_connect('localhost', 'root', '', 'ehr_healthcare')or die("Not connecting");
$sql = "SELECT name FROM `doctor` WHERE `d_id`='$u'";
$r=mysqli_query($db,$sql);
		if($r){
		$list1=mysqli_fetch_assoc($r);
		echo $list1['name'][0];
		}
	?>	</b>	
</center></button></li>
</ul>
</nav>
<br><br>
</header>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
	<center><b style="font-size:50px;"><?php echo $list1['name'][0]; ?></b><br><br>
	<?php
	$conn=mysqli_connect("localhost","root","","ehr_healthcare");
	$q="SELECT * FROM doctor WHERE d_id = $_SESSION[username]";
	$r=mysqli_query($conn,$q);
	$list=mysqli_fetch_assoc($r);
	echo "Doctor ID: ".$list['d_id']."<br>";
	echo "NAME: ".$list['name']."<br>";
	echo "E-mail: ".$list['email']."<br><br>";
	?>
	<a href="destroy.php"><button id="logout" style="width:100px;height:50px;background-color:#8e1909;border-radius:3px;">LOGOUT</button></a></center>
  </div>

</div>
<script>
var modal = document.getElementById('myModal');
var btn = document.getElementById("profile");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<br><br><br>
<!--<div id="detail">
My Profile details:
<button>REGISTER</button>
<button>SIGN OUT</button>
</div>-->
</body>
</html>

