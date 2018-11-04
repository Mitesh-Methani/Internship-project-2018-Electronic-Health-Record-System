<!HTDOCS html>

<html>
<head><link rel="stylesheet" href="designhome.css">
<title>Privacy and Settings</title>
<link rel="stylesheet" href="designhome.css">
</head>
<body id="access">
<?php include("patientdash.php");
include("session.php");?>
<br><br><br>
<div id="main">
<div id="side"> <?php echo file_get_contents("sidebar.php"); ?></div>
<br><br><br><br>
  
 <?php
$db=mysqli_connect("localhost","root","","ehr_healthcare");
$q="SELECT doc FROM patients WHERE uidai = $_SESSION[username]";
$r=mysqli_query($db,$q);
$list1=mysqli_fetch_assoc($r);
if($list1['doc']!=""){
echo "<div id='table'><center><table border=1>
  <tr>
    <th>Doctor's ID</th>
    <th>Name</th> 
    <th>E-mail address</th>
	<th>Contact Number</th>
	<th>Health Center</th>
	<tr>
</tr></center>";	}
else{
	echo "<center>NO DOCTORS ADDED</center>";
}
$dis=explode('_',$list1['doc']);
$count=sizeof($dis);
$i=0;
$w='doc';
while($count!=0 AND $list1['doc']!="")
{
$query="SELECT * FROM doctor WHERE d_id = $dis[$i]";
$r=mysqli_query($db,$query);
$list=mysqli_fetch_assoc($r);
echo "<tr>";
echo "<td>" . $dis[$i] . "</td>";
echo "<td>" . $list['name'] . "</td>";
echo "<td>" . $list['email'] . "</td>";
echo "<td>" . $list['phone'] . "</td>";
echo '<td><a href="remove.php?$id='.$dis[$i].' & $w='.$w.'" ><input type="submit" name="remove"  class="rbtn" value="REMOVE DOCTOR" style="background-color:#8e1909;color:white;" ></a>';
echo "</tr>";
$i=$i+1;
$count=$count-1;
}
echo "</table><br>";
?>
<form method="post" action="add.php">
<input type="hidden" name="submitted" value="1" >
<center><input type="submit" name="add"  class="pbtn" value="+ADD DOCTOR" style="width:auto">&nbsp&nbsp&nbsp&nbsp
</center>
</form>
</div>
<br><br>

  
 <?php

$db=mysqli_connect("localhost","root","","ehr_healthcare");
$q="SELECT myhospital FROM patients WHERE uidai = $_SESSION[username]";
$r=mysqli_query($db,$q);
$list1=mysqli_fetch_assoc($r);
if($list1['myhospital']!=""){
echo "<div id='table'><center><table border=1>
  <tr>
    <th>Hospital ID</th>
    <th>Hospital Name</th> 
    <th>E-mail address</th>
	<th>Contact Number</th>
	<tr>
</tr></center>	";	}
else{
	echo "<center>NO HOSPITAL ADDED</center>";
}
$dis=explode('_',$list1['myhospital']);
$count=sizeof($dis);
$i=0;
$w='hospital';
while($count!=0 AND $list1['myhospital']!="")
{
$query="SELECT * FROM hospital WHERE hospital_id = $dis[$i]";
$r=mysqli_query($db,$query);
$list=mysqli_fetch_assoc($r);
echo "<tr>";
echo "<td>" . $dis[$i] . "</td>";
echo "<td>" . $list['hospital_name'] . "</td>";
echo "<td>" . $list['email'] . "</td>";
echo "<td>" . $list['contact_number'] . "</td>";
echo '<td><a href="remove.php?$id='.$dis[$i].' & $w='.$w.'" ><input type="submit" name="remove"  class="rbtn" value="REMOVE HOSPITAL" style="background-color:#8e1909;color:white;" ></a>';
echo "</tr>";
$i=$i+1;
$count=$count-1;
}
echo "</table><br>";
?>
<form method="post" action="add.php">
<input type="hidden" name="submitted" value="2" >
<center><input type="submit" name="add" class="pbtn" value="+ADD HOSPITAL" style="width:auto" >&nbsp&nbsp&nbsp&nbsp
</center>
</form>
</div>
</div>
</body>
</html>

