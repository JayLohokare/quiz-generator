<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>DBMS MINI Project</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">QueBank</a>
         <ul class="right hide-on-med-and-down">
        <li><a href="#">Logout</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Logout</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot bground-img" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Qmaster Panel</h1>
		<h4 class="white-text">questions</h4>
		<br>

  <div class="white-text">	



  
	


<?php

header ("Cache-Control:no-cache");

$auth = $_COOKIE['authorization'];


if($auth == "ok") {
  


// array for JSON response
$response = array();

$jsonData = array();
$jsonData2 = array();
$jsonData3 = array();

if (isset($_POST['tag']) && isset($_POST['notag'])) {
    
  $tag= $_POST['tag'];
  $notag= $_POST['notag'];
  $location = $_POST['location'];
  require_once __DIR__ . '/db_connect.php';
  $db = new DB_CONNECT();


$i = 0;
$j = 0;


$tags= explode(",",$tag);
$notags= explode(",",$notag);
$locations = explode(",",$location);



if($locations[0]==null)
{


   while($tags[$i] != null)
{

$sql= mysql_query("SELECT question_id FROM tags WHERE tag like '$tags[$i]' ");

while ($row= mysql_fetch_array($sql)) {
$id=$row['question_id'];


		
		
		$sql2= mysql_query("select * from main where question_id='$id'");
			while($row2=mysql_fetch_array($sql2)){

				?>Que : <?php
					echo $row2['question']; ?>
					&nbsp;&nbsp;&nbsp; Ans: <?php
					echo $row2['answer']; ?> <br> <?php
				}
			
		
	}



$i++;

}


}

else  {

while($tags[$i] != null)
{

$sql= mysql_query("SELECT question_id FROM tags WHERE tag like '$tags[$i]' ");

while ($row= mysql_fetch_array($sql)) {
$id=$row['question_id'];

$k=0;
while($locations[$k] != null)
	{
           
		$sql3=mysql_query("select question_id from location where place like '$locations[$k]'");
		while($row5=mysql_fetch_array($sql3)) {
                              
                       $id5=$row5['question_id'];
                        
			if($id5==$id)	{
		
		
		$sql2= mysql_query("select * from main where question_id='$id'");
			while($row2=mysql_fetch_array($sql2)){

				?>Que : <?php
					echo $row2['question']; ?>
					&nbsp;&nbsp;&nbsp; Ans: <?php
					echo $row2['answer']; ?> <br> <?php
				}
			}
			}
		$k++;	
	}
}


$i++;

}

}

}


else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}

}


else{

 header("Location: http://www.skylinelabs.in/Database/index.php");
exit();
}
?>


	  </div>
	  
	  
	  
	  
	  
	  
      <br><br>
      <br><br>
      <br><br>
      <br><br>

    </div>
  </div>



  <footer class="page-footer orange">
    
    <div class="footer-copyright">
      <div class="container">
      Made for <a class="orange-text text-lighten-3" href="http://materializecss.com">Dbms</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../../bin/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>

					