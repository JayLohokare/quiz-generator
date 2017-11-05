<?php

header ("Cache-Control:no-cache");

$auth = $_COOKIE['authorization'];
$type= $_COOKIE['type'];


if(!$auth == "ok") {
        header("Location: http://www.skylinelabs.in/Database/index.php");
        exit(); 
} 

else {

    if($type != "admin") 
    {
        header("Location: http://www.skylinelabs.in/Database"); 
    }

    else 
   {


    $response = array();

    if (isset($_GET['question']) && isset($_GET['answer']) && isset($_GET['tag'])) {
    
    $question= $_GET['question'];
    $answer= $_GET['answer'];
    $tag= $_GET['tag'];

 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
$result = mysql_query("INSERT INTO main(question,answer) VALUES('$question','$answer')");

$id = mysql_insert_id();

if ($result) {

$i = 0;

$tags= explode(",",$tag);

while($tags[$i] != null)
{
 //  echo($tags[$i]."  ");

$sql = "INSERT INTO tags (tag, question_id) VALUES ('$tags[$i]' , '$id')";
 mysql_query($sql);

$i++;
}


 
       header("Location: http://www.skylinelabs.in/Database/success_q.html"); 

    } else {
        header("Location: http://www.skylinelabs.in/Database/success_q.html"); 
    }
} else {
    header("Location: http://www.skylinelabs.in/Database/success_q.html");  
}
      }


}


?>