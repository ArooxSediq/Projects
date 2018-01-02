  <link rel="stylesheet" href="css/Custom_Style.css" >
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

<?php

session_start();

if(isset($_SESSION['username'])) 
{
	$userType = $_SESSION['UserType'];
	$userName = $_SESSION['username'];

		if($userType==1)
		{
			//admin
			echo '
				<nav class="navbar navbar-light bg-light" >
				    <a class="navbar-brand" href="index.php">
				      <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				      Galleria
				    </a>
				      <ul class="nav justify-content-center">

				     <li class="nav-item">
				      <a class="nav-link" href="profile.php">@'.$userName.'</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" href="upload.html">Upload</a>
				    </li>
				    <ul class="nav justify-content-center">
				    
				    <li class="nav-item">
				      <a class="nav-link" href="signout.php">Sign Out</a>
				    </li>

				  </ul>
				</nav>
			';
			//echo 'admin';

		}
		else if($userType==2)
		{
			//user
			echo '

			<nav class="navbar navbar-light bg-light" >
			    <a class="navbar-brand" href="index.php">
			      <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			      Galleria
			    </a>
			      <ul class="nav justify-content-center">
			    

				<li class="nav-item">
				   <a class="nav-link" href="profile.php">@'.$userName.'</a>
				 </li>

			    <li class="nav-item">
			      <a class="nav-link" href="upload.html">Upload</a>
			    </li>

				    
			    <li class="nav-item">
				      <a class="nav-link" href="signout.php">Sign Out</a>
				    </li>
			  </ul>
			</nav>

			';
		}

}

else
{
	echo ' 
	<nav class="navbar navbar-light bg-light" >
    <a class="navbar-brand" href="index.php">
      <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Galleria
    </a>
    
   <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" href="signin.html">Sign in</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="signup.html">Sign up</a>
    </li>
  </ul>
</nav>
 '
 ;
}


function remove($link) 
	{
	    include_Once('Database.php');
		@ $dbObject = new Database('localhost', 'root', '', 'galleriawebsite');
		$db = $dbObject->CreateConnection();

		if (mysqli_connect_errno()) {
			echo "Couldnt connect to database<br>Please refresh the page!";
			exit;
		}
	  	
	   	$sqlStr=" DELETE FROM `images` WHERE `img_link`='$link' ";
	    $result = $db ->query($sqlStr);
	    header("location: index.php");
   }

  if (isset($_GET['link'])) {

  	$link=$_GET['link'];
  	remove($link);
	}


?>