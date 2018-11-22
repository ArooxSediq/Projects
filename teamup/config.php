<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("45622441742-r90pr7ui85jmc0b1k58912i41plpg0mv.apps.googleusercontent.com");
	$gClient->setClientSecret("JSSab12RlgS1LrQbzSzKmfeg");
	$gClient->setApplicationName("Team Up");
	$gClient->setRedirectUri("http://teamup.pe.hu/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
