 <?php 
   include "dbc.php";
   ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>contact us </title>
</head>

<body>
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>VELLORE INSTITUTE OF TECHNOLOGY (VIT).</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>Vellore, India</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i> 9407108173</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i> awareraj212@gmail.com</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="w3-section">      
        <label>Name</label>
        <input class="w3-input" type="text" name="Name" required>
      </div>
      <div class="w3-section">      
        <label>Email</label>
        <input class="w3-input" type="text" name="Email" required>
      </div>
      <div class="w3-section">      
        <label>Message</label>
        <input class="w3-input" type="text" name="Message" required>
      </div>  
      <input class="w3-check" type="checkbox" checked name="Likee" value="likee">
      <label>I Like it!</label>
      <button type="submit" name="submit" class="w3-button w3-right w3-theme">Send</button>
      </form>
    </div>
  </div>
</div>
 <?php 
 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
   include "dbc.php";
  if(isset($_POST['submit'])){
	  $fname=test_input($_POST['Name']);
	  $email=test_input($_POST['Email']);
	  $msg=test_input($_POST['Message']);
	   $likee=test_input($_POST['Likee']);
	  $sql="INSERT INTO `contact`( `name`, `email`, `message`, `likee`) VALUES ('$fname','$email','$msg','$likee')";
	    $runn= mysqli_query($con,$sql);
		 if($runn == TRUE){
			 ?>
		     <script>alert("message sent successfully");</script>
		     <?php
		 }else{
			 ?>
		     <script>alert("message sent failed");</script>
		     <?php
		 }
  }?>
</body>
</html>
