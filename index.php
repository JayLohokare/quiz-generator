<?php 


$auth = $_COOKIE['authorization'];

header ("Cache-Control:no-cache");

if($auth == "ok") {

header( "Location:logged_in.php");
exit();
			
} 

else {
header( "Location:login.html");
exit();

 
}

	
?>



