<?php 
include("session.php");
$db=mysqli_connect("localhost","root","","ehr_healthcare")OR die("died");
$q=" UPDATE `patients` SET name = $_POST['name'] , address= $_POST[add] , email_id =$_POST[mail] , mobile =$_POST[number], dob ='$_POST[dob]', gender =$_POST[right], eleft=$_POST[left] WHERE uidai='$_SESSION['username'] ";
$r=mysqli_query($db,$q);
$list=mysqli_fetch_assoc($r);