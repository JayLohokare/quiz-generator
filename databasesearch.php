<?php

// array for JSON response
$response = array();

$jsonData = array();
$jsonData2 = array();
$jsonData3 = array();

if (isset($_POST['tag']) && isset($_POST['notag'])) {
    
  $tag= $_POST['tag'];
  $notag= $_POST['notag'];
  require_once __DIR__ . '/db_connect.php';
  $db = new DB_CONNECT();


$i = 0;
$j = 0;


$tags= explode(",",$tag);
$notags= explode(",",$notag);

while($tags[$i] != null)
{

$sql= mysql_query("SELECT question_id FROM tags WHERE tag like '$tags[$i]' ");

while ($row= mysql_fetch_array($sql)) {
$id=$row['question_id'];

$sql2= mysql_query("select question from main where question_id='$id'");
while($row2=mysql_fetch_array($sql2)){
  echo $row2['question'];
}
}


$i++;

}


//while ($row= mysql_fetch_array($sql)) {
//}
//$jsonData2[] = $row["question_id"];
//$jsonData[] = $jsonData2;
///$jsonData3["result"] = $jsonData;
//echo json_encode($jsonData3);


}


else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>		