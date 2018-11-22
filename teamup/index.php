<!DOCTYPE html>
<html lang="en">
<head>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Banu Bakr">
    <!--<link rel="manifest" href="manifest.json" />-->
  
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    
	<title>Team Up</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<script src="js/bootstrap.min.js" ></script>


	<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: matches/index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();

	
	?>

</head>
<body class="text-left">

	<div name="container" >
  
		<section  style="background: white;">
			<div class="row justify-content-center">
					
					<div class="col-10 col-sm-9 col-md-4 col-lg-4 " >
						<img src="img/logo.png" style="width: 100%; padding-bottom: 10%;">
						<form action="index.php?auth=true" method="post">
						    <div class="form-group row">
						      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
						      <div class="col-sm-10">
						        <input type="email" required class="form-control" id="inputEmail3" placeholder="Email" name="email">
						      </div>
						    </div>
						    <div class="form-group row">
						      <label for="inputPassword3" class="col-sm-2 col-form-label ">Password</label>
						      <div class="col-sm-10">
						        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
						      </div>
						    </div>
						    	<hr>
						    <div class="form-group row">
						      <div class="offset-sm-2 col-sm-10">
						        <button type="submit" class="btn btn-info">Sign in</button>
						        <a  href="<?php echo $loginURL ?>"><img class="googleAuthBtn" src="img/g-pressed.png" width="175"> </a>
						      </div>
						
						    </div>
						</form>
						
						       
					</div>

			</div>
           
           
		

								<!-- PHP CODE -->

					<?php

						if(isset($_GET['auth']))
						{
							include_once('database.php');
							$DB = new database(); 
							@ $DB = $DB->connect();							//Make a dummy user who can only view games
                            
                            
                            /**Implemented SQL INJECTION PREVENTION
                        		
                        		The mysqli_real_escap_string($arg1,$arg2) is a function that
                        		"Escapes special characters in a string for use in an SQL statement,
                        		taking into account the current charset of the connection"
                        
                        		for more details please refer to:
                        			http://php.net/manual/en/mysqli.real-escape-string.php
                        	**/
							$Email=mysqli_real_escape_string($DB,$_POST['email']);              
							$Pass=mysqli_real_escape_string($DB,$_POST['password']);
							//--------------------------------------
							
							echo $Pass,$Email;
							 $result = $DB ->query(" SELECT * from `player` where `player_email`='$Email' AND `player_password`='$Pass'; ");
							 $rows = $result->fetch_object();
							
							
							
							//Check if the user informaiton exist in the database. 
							 if($rows)
							 {
								echo "Signed in";
								
								//add the user's information. 
								$_SESSION['username']= $Email;
								$_SESSION['password']= $Pass;

								header("location: matches/");//redirect the user to the index page. 

							 }//end of if statement 
							 else	echo "Sign in Failed, Please Try again";
						}
					?>

					<!-- PHP -->

		</section>
    		

	
	

			 
	</div> <!-- Container -->
 
      <?php 	include("footer.php"); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
     <script type="text/javascript">
                $(".googleAuthBtn").hover(function(){
                   $(".googleAuthBtn").attr('src','img/g-unpressed.png');
                });
            </script>
</body>
</html>
