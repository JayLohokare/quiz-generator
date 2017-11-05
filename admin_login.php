<?php 

    require_once __DIR__ . '/db_connect.php';
    
    $db = new DB_CONNECT();



$auth = $_COOKIE['authorization'];

header ("Cache-Control:no-cache");

if($auth == "ok") {
   
 header( "Location:logged_in.php");

} 


else {

if(isset($_POST['login_button']) && isset($_POST['username']) && isset($_POST['password']) ) {
		$user = $_POST['username'];
		$pass = $_POST['password'];

                $sql =mysql_query("select * from admins");

                while($row = mysql_fetch_array($sql))
	        {
		 if($row["user_name"] == $user)
		{
  			if($row["password"]==$pass )
			{
			setcookie("authorization","ok" );
                        setcookie("type","admin" );
			header( "Location:logged_in.php");
			exit(); 
			}
                        else{}

		
		} else{}

                }

               header( "Location:admin_login_error.html");


}
else {
    header( "Location:admin_login_error.html");
echo("2");
}

}

	
?>