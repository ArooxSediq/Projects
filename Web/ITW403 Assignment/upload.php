<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>

  <link rel="stylesheet" href="css/Custom_Style.css" >
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <script type="text/javascript">
  
  </script>

</head>
<body>

<?php 
include_Once('auth.php');
?>

<div class="container" style="margin-left: 25%; margin-top: 50px; width: 50%;">
<?php

  include_Once('Database.php');
	@ $dbObject = new Database('localhost', 'root', '', 'galleriawebsite');
	$db = $dbObject->CreateConnection();

	if (mysqli_connect_errno()) {
		echo "Couldnt connect to database<br>Please refresh the page!";
		exit;
	}

if($_FILES['file']['name']!='')
{
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpLocation = $_FILES['file']['tmp_name'];
  $fileTitle= $_POST['title'];
  $fileDesc = $_POST['desc'];
  $tmp = explode('.', $fileName );
  $fileExt= strtolower(end($tmp));
  $allowedExt = array('jpg','jpeg','png','bmp');

  
  if(in_array($fileExt, $allowedExt))
  {
  		$newLocation='img/'.$fileTitle.'@'.$userName.'.'.$fileExt;
  		move_uploaded_file($fileTmpLocation, $newLocation);
  		
	
  		if ($_FILES['file']['error']==0) {//if successful
		
		
		//Filter the image's title and the description 
					$find = array('shit','fuck','damn','bitch','crap','piss','dick','darn','cock','pussy','asshole',
					'fag','bastard','slut','douche','bitches', 'bitching','fuckers','fucking','arse','ass'
									);
					$replace= array('****','****','****','*****','****','****','****','****','****','*****','*******',
					'***','*******','****','******', '*******','********','*******','*******','****','***'
					);

					
		//check if the bad word is used; replaces it with asterisk 
		if ($fileDesc){//checking the description 
			$File_Desc= str_ireplace($find, $replace,"$fileDesc");
				}

		
		if ($fileTitle){//checking the title 
			$File_Title= str_ireplace($find, $replace, "$fileTitle");
		}
		
		
				
      //SQL Insertion
         $sqlStr=" INSERT INTO `images` (`img_link`, `img_uploader`, `img_descript`, `img_title`) VALUES ('$newLocation', '$userName', '$File_Desc','$File_Title') ";
         $result = $db ->query($sqlStr);
      //SQL insertion
 
        header("Location: index.php");

			}else{
				
				echo "The file is too large, please choose a smaller image file!";

        echo "<br><br> Redirecting back to the home page in 5 seconds . .";
        echo '<meta http-equiv="refresh" content="5;url=index.php">';
		
    	}
			// $dbObject->close();

  }
  else
  {
  	echo "You can't upload $fileExt files<br>try another file! :/";
    echo "<br><br> Redirecting back to the home page in 5 seconds . .";
    echo '<meta http-equiv="refresh" content="5;url=index.php">';
  }

}
else
{
	echo "You didn't submit any files! :( ";
  echo "<br><br> Redirecting back to the home page in 5 seconds . .";
  echo '<meta http-equiv="refresh" content="5;url=index.php">';
}


?>


</div>
</body>
</html>