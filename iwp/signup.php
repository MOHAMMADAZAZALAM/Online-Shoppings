
<?php 
session_start();
	include "dbc.php";
?>
<!DOCTYPE html>
<html>
<title>Creat a new account</title>
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="css/signup.css"/>
</head>
<body>
<div id="member_login"><br>
          <center><h2>Creat A New Account</h2></center>
		  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
             <input type="text" name="fname" placeholder="Enter First Name" required pattern="^[A-Za-z]+" title="ONLY TEXT ARE ALLOWED IN FIRST NAME" required/>
             <input type="text" name="lname" placeholder="Enter Last Name" required pattern="^[A-Za-z]+" title="ONLY TEXT ARE ALLOWED IN LAST NAME" required/><br><br><br><br>
	 <center>Male<input type="radio" name="gender" checked value="male">Female<input type="radio" name="gender" value="female"></center>	 
			 <input type="text" name="mobile" placeholder="Enter Mobile number" required pattern="^[0-9]+" title="ONLY NUMBERS ARE ALLOWED IN MOBILE NUMBER" required/>
			  <input type="date" name="dob"/><br>  
              <input type="email" name="email" placeholder="Email id"  required pattern="^[A-Za-z0-9@.]+" title="enter valid email id" required/><br>				  
             <input type="password" name="password" placeholder="Creat A Strong Password" required pattern="^[A-Za-z0-9@.]+" title="ONLY A-z and no 0-9 and special char @ allowed"required/><br>
             <input type="password" name="confirmp" placeholder="Confirm Password" required pattern="^[A-Za-z0-9@.]+" required/><br>		
			  <textarea name="address" placeholder="Enter Address" required pattern="^[A-Za-z0-9]+" title="ONLY TEXT AND NUMBERS ARE ALLOWED IN ADDRESS" required></textarea><br>
			 <input type="file" name="fileToUpload" id="fileToUpload" value="profile"/><br><br><br><br>
	
                 <center><input type="submit" name="create" value="Submit"></center><br><br>
          </form>
            <?php 
	 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 include "dbc.php";
	     if(isset($_POST['create'])){
			 $fname = test_input($_POST['fname']);
			 $lname=test_input($_POST['lname']);
			 $gender=$_POST['gender'];
			 $mbno=test_input($_POST['mobile']);
			 $dob=test_input($_POST['dob']);
			 $e=test_input($_POST['email']);
			 $p=test_input($_POST['password']);
			 $add=test_input($_POST['address']);
			 $cp=test_input($_POST['confirmp']);
              
			 
			 if($p == $cp){	
		   $sql= "INSERT INTO `signup`( `fname`, `lname`,`gender`,`mbno`,`dob`, `email`, `password`,`address`) VALUES ('$fname','$lname','$gender','$mbno','$dob','$e','$p','add')";
			   $runn= mysqli_query($con,$sql);
			 if($runn == TRUE){
				 $query= "SELECT * FROM `signup` WHERE `email`='$e'";
			   $run= mysqli_query($con,$sql) or die("Cann't connect to database");
				  $data=mysqli_fetch_assoc($run);
		                 $id=$data['id'];
		                 $_SESSION['cid']=$id;
		               header('location:login.php'); 
			 }
			 else{
				 ?> <script> alert("something went wrong"); </script> <?php
			 }
			 }
			 else
			 {
				 ?> <script> alert("Password didn't match please try again later"); </script> <?php
			 }
		 }
	 
	 ?>	
</div>
</body>
</html>
