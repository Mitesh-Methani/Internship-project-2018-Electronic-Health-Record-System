<!HTDOCS html>
<?php include("session.php");
$who=$_SESSION['whoami'];
?>
<html>
<head><link rel="stylesheet" href="css/designhome.css"></head>
<body>
<div> <?php 
if(strcmp($who,"patient")==0)
{
	include("patientdash.php");
	echo "<br><br><br><br><br><br><br>";
	include("view1.php");
}
elseif(strcmp($who,"doctor")==0)
{
	include("doctordash.php");
	echo "<br><br><br><br><br><br><br>";
$db=mysqli_connect("localhost","root","","ehr_healthcare");
$q="SELECT mypatient FROM doctor WHERE d_id = $_SESSION[username]";
$r=mysqli_query($db,$q);
$list=mysqli_fetch_assoc($r);
if($list['mypatient']!=""){
echo "<div id='table'><center><table border=1>
  <tr>
    <th>Patient's UIDAI</th>
    <th>Name</th> 
    <th>E-mail address</th>
	<th>Contact Number</th>
	<tr>
</tr></center>";	
$dis=explode('_',$list['mypatient']);
$count=sizeof($dis);
$i=0;
$w='patient';
while($count!=0)
{
$query="SELECT * FROM patients WHERE uidai = $dis[$i]";
$r=mysqli_query($db,$query);
$list=mysqli_fetch_assoc($r);
echo "<tr>";
echo "<td>" . $dis[$i] . "</td>";
echo "<td>" . $list['name'] . "</td>";
echo "<td>" . $list['email_id'] . "</td>";
echo "<td>" . $list['mobile'] . "</td>";
echo '<td><a href="view1.php?$id='.$dis[$i].'" ><input type="submit" name="remove"  class="rbtn" value="VIEW RECORDS" style="background-color:#8e1909;color:white;" ></a>';
echo "</tr>";
$i=$i+1;
$count=$count-1;
}
echo "</table><br>";
}
else{
	echo "<center><h2>NO PATIENTS</h2> <br><h3>(You will be able to view and update records of the patients only when they grant access)</h3> </center>";
}
}
elseif(strcmp($who,"hospital")==0)
{
	
	include("uploadrec.php");
}
 ?>
 </div>
</body>
</html>