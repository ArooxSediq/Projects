<?php

  include_Once('auth.php');  
  include_Once('Database.php');
  @ $dbObject = new Database('localhost', 'root', '', 'galleriawebsite');
  $db = $dbObject->CreateConnection();

  if (mysqli_connect_errno()) {
    echo "Couldnt connect to database<br>Please refresh the page!";
    exit;
  }

  $first_name=$_POST['fName'];
  $last_name=$_POST['lName'];
  $email=$_POST['Email'];
  $password=$_POST['Password'];
  $city= $_POST['City'];
  $gender= $_POST['Gender'];

       
  $sqlStr=" SELECT email from `userdata` where `email`='$email'";
  $r = $db -> query($sqlStr);
  $r = $r->fetch_object();  
      
      if($r->email==$email)
          {
             ?>

                <script type="text/javascript">
                  alert("This email is already registered!, please choose another Email");
                </script>

              <?php
              echo "<br><h3>Redirecting...<h3>";
              echo '<meta http-equiv="refresh" content="2;url=signup.html">'; 

          }
      else{
            //SQL Insertion
             $sqlStr=" INSERT INTO `userdata` (`first_name`, `last_name`, `email`, `password`, `city`, `type`, `gender`) VALUES ('$first_name', '$last_name', '$email','$password','$city','2','$gender') ";
             $result = $db ->query($sqlStr);
              
              if($result)
              {
                header("location: index.php"); 
              }
              else 
              {
                ?>

                <script type="text/javascript">
                  alert("error has occured, please try again!");
                </script>


                <?php
                 echo "<br><h3>Redirecting...<h3>";
                 echo '<meta http-equiv="refresh" content="2;url=signup.html">';      
              }
        //SQL insertion
      }        


?>