<!HTDOCS html>
<html>
<head><link rel="stylesheet" href="designhome.css">
</head>
<body>
<form id="chpwd" method="post" style="font-size:25px" action="mail.php">
<br><br><br><br>
<div align="center">
<label>User ID (Aadhar card number for patients)&nbsp&nbsp&nbsp </label>
<input type="text" name="user" required="required" style="width:200px;"><br><br><br><br>
<input type="text" name="who" hidden value="<?php echo $_GET['user']; ?>" ><br><br><br><br>
<button type="submit" name="set" style="height:50px;width:100px;background-color:#8e1909;border-radius:5px;">SEND MAIL</button>
<input class="form-control mb-2" type="hidden" name="S" value="1"/>
</div>	
 </form> 
</body>
</html>