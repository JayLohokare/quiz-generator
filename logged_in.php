<?php


header ("Cache-Control:no-cache");

$auth = $_COOKIE['authorization'];
$type= $_COOKIE['type'];


if(!$auth == "ok") {
  header("Location: http://www.skylinelabs.in/Database/index.php"); 
} 

else {
     if($type == "admin") {
      header("Location: http://www.skylinelabs.in/Database/admin_panel_main.html"); 
     //echo("admin");
      }

     else if($type == "qmaster") {
     header("Location: http://www.skylinelabs.in/Database/qmaster_pan.html"); 
     //echo("QMaster");

     }

else
{
 header("Location: http://www.skylinelabs.in/Database/index.php"); 
} 


}



?>
