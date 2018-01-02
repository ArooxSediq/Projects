<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>

  <?php
    
     include_Once('Database.php');
     @ $dbObject = new Database('localhost', 'root', '', 'galleriawebsite');
     $db = $dbObject->CreateConnection();

    if (mysqli_connect_errno()) {
      echo "Couldnt connect to database<br>Please refresh the page!";
      exit;
    }
     
     $sqlStr= 'select * from images';
     $result = $db ->query($sqlStr);
     $row = $result->fetch_all();
    
  ?>

  
</head>
<body>

<?php 
include_Once('auth.php');
?>

<div class="container" style="margin: 5px;" id="container">

<?php
  for ($i=0; $i < $result->num_rows; $i++) { 

    $link = $row[$i][0];
    $username = $row[$i][1];
    $discript = $row[$i][2];
    $title=$row[$i][3];

      if(isset($_SESSION['username']))
      {
          if($userType==1)
          {
            //If admin
            echo " <div class=\"card\" > <a href=\"view.php?V=" .$link. "\"> <img class=\"card-img-top\" src=\" " .$link." \" alt=\"".$username."\">  </a><div class=\"card-body\"> <a href='index.php?link=$link'> <img src=\"img/delete.png\" width=\"20\" /> </a> <h4 class=\"card-title\">".$title."</h4> <p class=\"card-text\"> " .$discript. " </p></div></div> ";
          }
          else
          {
            //if User
             echo " <div class=\"card\" ><a href=\"view.php?V=" .$link. "\"> <img class=\"card-img-top\" src=\" " .$link." \" alt=\"".$username."\"> </a><div class=\"card-body\"> <h4 class=\"card-title\">".$title."</h4> <p class=\"card-text\"> " .$discript. " </p></div></div> ";
          }
      }
      else
      {
        //if Visitor
        echo " <div class=\"card\" ><a href=\"view.php?V=" .$link. "\"> <img class=\"card-img-top\" src=\" " .$link." \" alt=\"".$username."\"> </a><div class=\"card-body\"> <h4 class=\"card-title\">".$title."</h4> <p class=\"card-text\"> " .$discript. " </p></div></div> ";
      }
  }

?>

</div>

</body>
</html>