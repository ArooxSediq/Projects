<?php

session_start();
$Email=$_POST['email'];
$Pass=$_POST['password'];

include_Once('Database.php');
	@ $dbObject = new Database('localhost', 'root', '', 'galleriawebsite');
	$db = $dbObject->CreateConnection();

	if (mysqli_connect_errno()) {
		echo "Couldnt connect to database<br>Please refresh the page!";
		exit;
	}

      //SQL Insertion
         $sqlStr=" SELECT * from `userdata` where `email`='$Email' AND `password`='$Pass'; ";
         $result = $db ->query($sqlStr);
         $rows = $result->fetch_object();
        
         if($rows)
         {
         	echo "Signed in";
         	$_SESSION['UserType']=$rows->type;
         	$_SESSION['username']= substr( $Email,0,strpos($Email, '@') );

         	header("location: index.php");

         }
         else
         {

             ?>

                <script type="text/javascript">
                  alert("Failed to sign in, Please try again!");
                </script>

              <?php
              echo "<br><h3>Redirecting...<h3>";
              echo '<meta http-equiv="refresh" content="2;url=signin.html">'; 

         }
   
      //SQL insertion



?>