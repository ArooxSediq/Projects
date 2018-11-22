<?php
	require_once "config.php";

	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) 
	{
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} 
	else 
	{
		header('Location: login.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
    $_SESSION['givenName'] = $userData['givenName'];
    $_SESSION['password'] = $userData['id'];
	$_SESSION['username'] = $userData['email'];
	
	include_once('database.php');
	$DB = new database(); 
    @ $DB = $DB->connect();	

     $result = $DB ->query(" SELECT * from `player` where `player_email`='".$userData['email']."; ");
   
						
	//Check if the user informaiton does not exist in the database. 
	 if(!$result)
	 {
		$q=" INSERT INTO `player` (`player_id`, `player_name`, `player_email`, `player_password`, `player_attendace`, `player_performace`) VALUES (NULL, '".$userData['givenName']."', '".$userData['email']."', '".$userData['id']."', '0', '0'); ";
	    $result = $DB ->query($q);

        if($result) header("location: matches/");//redirect the user to the index page. 
        else header("location: matches/index.php?failed=true");

	 }
						



	header('Location: index.php');
	exit();
?>