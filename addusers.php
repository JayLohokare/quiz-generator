	  <?php



if (isset($_POST['username']) && isset($_POST['password'])) {
    
  $username= $_POST['username'];
  $password= $_POST['password'];
  require_once __DIR__ . '/db_connect.php';
  $db = new DB_CONNECT();
  
	$sql=mysql_query("insert into users values ('$username','$password')");
	if($sql)
		{	$ch = curl_init("http://www.skylinelabs.in/Database/adduser_success.html");
			curl_exec($ch);
		}
	else{
		$ch2 = curl_init("http://www.skylinelabs.in/Database/adduser_fail.html");
		curl_exec($ch2);

	}	
  
  }
  
  ?>