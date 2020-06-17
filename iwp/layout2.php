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
<ul>
<li>
 <a href=logout.php?logout=1>Logout</a>
                    </li>
                    
                    