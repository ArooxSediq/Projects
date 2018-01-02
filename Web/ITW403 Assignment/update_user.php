<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
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

	if (mysqli_connect_errno()) 
	{
		echo "Couldnt connect to database<br>Please refresh the page!";
		exit;
	}


    $fileTitle= $_POST['title'];
    $fileDesc = $_POST['descript']; 		
	
  				//Filter the image's title and the description 
	$find = array('shit','fuck','damn','bitch','crap','piss','dick','darn','cock','pussy','asshole',
	'fag','bastard','slut','douche');
	$replace= array('****','****','****','*****','****','****','****','****','****','*****','*******','***','*******','****','******');

					
		//check if the bad word is used; replaces it with asterisk 
	if($fileDesc)
	{
		$fileDesc_loweCase= strtolower($fileDesc);
		$File_Desc= str_replace($find, $replace, $fileDesc_loweCase);
	}
	if ($fileTitle)
	{
		$fileTitle_lowerCase= strtolower($fileTitle);
		$File_Title= str_replace($find, $replace, $fileTitle_lowerCase);
	}
		
	$update=$_GET['update'];
				
     //SQL Insertion
    $sqlStr=" UPDATE `images` SET  `img_descript`='$File_Desc' , `img_title` = '$File_Title' WHERE `img_link` = '$update' ";
    $result = $db ->query($sqlStr);
      //SQL insertion
 
    header("Location: index.php");


?>


</div>
</body>
</html>