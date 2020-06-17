

<?php 
session_start();
	if(isset($_SESSION['cid']))
	{
		echo"";
	}
	else{
		header('location:login.php');
	}
	include "dbc.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <style>
        div > img {
  width: auto;
  height : auto;
  max-height: 100%;
  max-width: 100%;
           
}
        #show{
            height: 300px;
             width: 200px;
            float: left;
        }
        
        #star{
             border: 2px solid green;
            background-color: darkgreen;
        }
    
    
    </style>
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="css/home.css">
<title>HOME page</title>
</head>

<body>
<div id="wrapper">
  <div id="header"><center>online shopping center</center>
    <div id="log"><img id="log" src="image/vit_logo.png"/>
   
       </div>
    </div>
 <div id="navigation"><ul>
  <li><a class="active" href=" ">HOME</a></li>
  <li><a href="about_us.html" target="_blank">ABOUT</a></li>
  <li><a href="new_contact.php" target="_blank">CONTACT</a></li>
  <li><a href=logout.php?logout=1>Logout</a></li>
  <li style="float:right"><a class="active" href=" ">ADMIN</a></li>
</ul>
   </div>
   <div id="container">
     <div id="left_panel">
  <span id="filter">Filter</span>
  <hr />
 <form  method="post" action="">
  <select id="dwidth3" onchange="getSelectValue();" name="year">
  <option value="" disabled selected hidden>YEAR</option>
     <option value="2012">2012</option>
     <option value="2013" >2013</option>
     <option value="2014">2014</option>
     <option value="2015">2015</option>
     <option value="2016">2016</option>
     <option value="2017">2017</option>
     <option value="2018">2018</option>
  </select>
      <input type="submit" name="submit" value="filter">
         </form>
         
    <!-- storing value into php variable -->
         <?php
         if(isset($_POST['submit']))
         {
             $year=$_POST['year'];
         }
         ?>
         <!-- ended storing data -->
  <hr />
 <select id="dwidth2">
  <option value="" disabled selected hidden>PRICCE RANGE</option>
   <option value="1200">1200-1300</option>
    <option value="1300">1300-1400</option>
     <option value="1400">1400-1500</option>
      <option value="1500">1500-1600</option>
       <option value="1600">1600-1700</option>
  </select>
  <hr />
<span id="rating">CUSTOMER RATING</span></br>
<input type="checkbox" value="4&above" />
                                         4* & above</br>
<input type="checkbox" value="4&above" />3* & above</br>
<input type="checkbox" value="4&above" />2* & above</br>
<input type="checkbox" value="4&above" />1* & above</br>
</hr>
<span id="model">MODEL</span>
<hr />
</br>
<input type="checkbox" value="4&above" />microsoft</br>
<input type="checkbox" value="4&above" />apple</br>
<input type="checkbox" value="4&above" />lenovo</br>
<input type="checkbox" value="4&above" />american tourister</br>
     
     </div>



        <div id="right_panel">

        <?php
            //making year wise shorting
             
         if(isset($_POST['submit']))
         {
             $year=$_POST['year'];
             $sql="SELECT * FROM `mobile_info` where year=$year"; 
             $run= mysqli_query($con,$sql) or die("Cann't connect to database");
            
             while($result = mysqli_fetch_assoc($run))
            {
            
           echo "<div id='show'>
              
        <img src='data:image/jpeg;base64,".base64_encode($result['image'] )."'/>  
        
     
    <span id='price'>From₹".$result['price']."</span>
    </br><span id='desc'>".$result['description']."</span></br>
  <span id='model'>".$result['model']."</span></br>
  <span id='desc'>".$result['year']."</span></br>
  <span id='star'>".$result['rating']."*</span>
    </div>";
            
            }
         }
        
            
             $sql="SELECT * FROM `mobile_info` ORDER BY id";  
             $run= mysqli_query($con,$sql) or die("Cann't connect to database");
            
            while($result = mysqli_fetch_assoc($run))
            {
            
           echo "<div id='show'>
              
        <img src='data:image/jpeg;base64,".base64_encode($result['image'] )."'/>  
        
     
    </br><span id='price'>From₹".$result['price']."</span>
    </br><span id='desc'>".$result['description']."</span></br>
  <span id='model'>".$result['model']."</span></br>
  <span id='desc'>".$result['year']."</span></br>
  <span id='star'>".$result['rating']."*</span>
    </div>";
            
            }
            
            
         ?>
           
           
         <script>
             //taking value from select option
             
/*function getSelectValue()
        {
            var selectedValue = document.getElementById("dwidth3").value;
            var a=4;
            
			} 
            */
                                         
</script>
            
        
 
</div>
</div>
</div>
 <div id="footer">
 <h3><center>FOLLOW US</center></h3>
 <center>
 <img id="fimage" src="image/social_media.jpg" alt="social media" />
    
 </center>
 </div>
</body>
</html>
                    