<!DOCTYPE html>
<html>
<head>
<title>Password recovery</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="css/style_1.css">
</head>
<body>
<div id="password"><br>
<center><h2>Fill the following detail </h2></center><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" target="_blank">
<input type="email" name="e" placeholder="Enter your email id"  required pattern="^[A-Za-z0-9@.]+" title="PLEASE ENTER PROPER EMAIL ADDRESS" required>
<p><b>Enter the phone number you have registered at the time of creating account</b></p>
<input type="text" name="mn" placeholder="Enter your phone number" required pattern="^[0-9]+" title="ONLY NUMBERS ARE ALLOWED IN MOBILE NUMBER" required>
<p><b>Enter new password</b></p>
<input type="password" name="np" placeholder="Enter new password" required pattern="^[A-Za-z0-9@.]+" required><br>
<p><b>Confirm new password</b></p>
<input type="password" name="cp" placeholder="Confirm password" required pattern="^[A-Za-z0-9@.]+" required><br>
<center><input type="submit" name="submit" value="Submit"></center><br><br>
</form>
</div>
</body>
</html>
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include "dbc.php";
 if(isset($_POST['submit'])){
						 $email=test_input($_POST['e']);
						 $mn=test_input($_POST['mn']);
						  $np=test_input($_POST['np']);
						   $cp=test_input($_POST['cp']);
						   if($np==$cp){
						 $sql="UPDATE `signup` SET `password`='$np' WHERE `email`='$email' AND `mbno`='$mn'";
						 $runn= mysqli_query($con,$sql);
						 if($runn==TRUE){
							?><script> alert("Password updated successfully");</script> <?php
						 }else{ ?><script> alert("Password update unsuccessfully try again");</script> <?php }
 } } ?>