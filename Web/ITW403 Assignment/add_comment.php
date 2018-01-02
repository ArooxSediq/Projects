  <?php
 
  include_Once('auth.php');
 
  //connecting to the database
  include_Once('Database.php');
  @ $dbObject = new Database('localhost', 'root', '', 'galleriawebsite');
  $db = $dbObject->CreateConnection();

  //checks if there was any error in the connection
  if (mysqli_connect_errno()) 
  {
    echo "Couldnt connect to database<br>Please refresh the page!";
    exit;
  }  

  //stores the data send from view.php into local variables
  $comment=$_POST['comment'];
  $img_link=$_GET['V'];

  if(isset($userName)) $un=$userName;
  else $un="Annonymous";
  //SQL Insertion
  $sqlStr=" INSERT INTO `comment` (`comment`, `user_name`, `img_link`) VALUES ('$comment', '$un', '$img_link') ";
  $result = $db ->query($sqlStr);
  //SQL insertion
 
  //redirects user back to the previous page
  header("Location: view.php?V=$img_link");

?>

