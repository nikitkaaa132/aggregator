<?php
// init configuration
$clientID = '1009529699903-cevtkqhqv0nql1okqufhvjvmpb3tfcgr.apps.googleusercontent.com';
$clientSecret = '04FLnpoIiwibwC9bXdrO8NK8';
$redirectUri = 'http://127.0.0.1:8000/';
 
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
 
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  	$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  	$client->setAccessToken($token['access_token']);
 	
  	// get profile info
  	$google_oauth = new Google_Service_Oauth2($client);
  	$google_account_info = $google_oauth->userinfo->get();
  	$email =  $google_account_info->email;
  	$name =  $google_account_info->name;  

  	$servername = "localhost";
    $database = "accesslogs";
    $username = "root";
    $password = "root";
    // Создаем соединение с БД
    $conn = mysqli_connect($servername, $username, $password, $database);
    $user = $conn -> query("SELECT user FROM 'mysql.user' WHERE user = '$email'");
    if (!$user) {
    	$user = $conn->query("CREATE USER '$name'@'localhost' IDENTIFIED BY ''");
    	$user = $conn->query("GRANT SELECT on accesslogs.logs TO '$email'@'localhost'");
    	echo "Кто это?";
    	if(!$user) { 
    		session_start();
    		$_SESSION['email'] = $name;
    		$redirect_url = "http://127.0.0.1:8000/view_all";
    		header("Location: $redirect_url");
    		exit; }
     		else  { echo "Error"; }
    }
    else
    {
    	session_start();
    	$_SESSION['email'] = $name;
    	$redirect_url = "http://127.0.0.1:8000/view_all";
    	header("Location: $redirect_url");
    	exit;
    }

  	mysqli_close($conn);
} else {
  	echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}
?><?php /**PATH C:\nginx-1.19.6\html\laravel\resources\views/authorization.blade.php ENDPATH**/ ?>