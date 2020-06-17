 <?php 
     session_start();
	 if(isset( $_SESSION['cid'])){
		  header('location:layout2.php');
	 }else { echo ""; }
   include "dbc.php";
   ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> Login & Sign up page</title>
      <link rel="stylesheet" href="css/style.css">
         <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

  
</head>

<body>
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"/>Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"/><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm"><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="group">
					<label for="user" class="label">EMAIL ADDRESS</label>
					<input id="user" name="e" type="email" class="input" required pattern="^[A-Za-z0-9@.]+" title="PLEASE ENTER PROPER EMAIL ADDRESS" required/>
				</div>
				<div class="group">
					<label for="pass" class="label">PASSWORD</label>
					<input id="pass" name="p" type="password" class="input" data-type="password" required pattern="^[A-Za-z0-9@.]+" required/>
				</div>
				<div class="group">
					<input id="check" name="cookies" type="checkbox" class="check" checked/>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
                
					<input type="submit" name="login" class="button" value="Sign In" >
                    
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="password - Copy.php" target="_blank">Forgot Password?</a>
				</div>
				<div class="foot-lnk"><br>
					<a href="signup.php" target="_blank">Creat A New Account</a>
				</div>
				</form>
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['login'])){
        	$em=test_input($_POST['e']);
			$pas=test_input($_POST['p']);
			$query= "SELECT * FROM `signup` WHERE `email`='$em' AND `password`='$pas'";
			   $run= mysqli_query($con,$query) or die("Cann't connect to database");
			   $row =mysqli_num_rows($run);
	          if($row<1)
	                   {
		                 ?>
		                   <script>alert("invalid email or password try again");</script>
		                 <?php
	                   }
	          else
	                 {
		               $data=mysqli_fetch_assoc($run);
		                 $id=$data['id'];
		                 $_SESSION['cid']=$id;
		               header('location:layout2.php');
	                 }
                      }?>
		   </div>			
	
			
		</div>
	</div>
</div>
  
</body>
</html>
