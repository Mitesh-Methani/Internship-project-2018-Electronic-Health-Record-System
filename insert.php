<?php
function insert($con,$name,$columns,$values) {
   $string= "INSERT INTO `".$name."` (";
   foreach ($columns as $col) {
        $string=$string ."`". $col ."`,";
   }
   $string=rtrim($string,',');
   $string=$string . ") VALUES (";
    foreach ($values as $col) {
        $string=$string ."'". $col ."',";
   }
   $string=rtrim($string,',');
   $string=$string . ")";
   $r=mysqli_query($con,$string);
   if($r){
	   echo "<script>alert("done")</script>";
   }else{
	   echo mysqli_error($con);
   }
}
?>