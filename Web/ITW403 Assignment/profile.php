<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
		<?php
		include_Once('auth.php');

		include_Once('Database.php');
		@ $dbObject = new Database('localhost', 'root', '', 'galleriawebsite');
		$db = $dbObject->CreateConnection();

		if (mysqli_connect_errno()) {
			echo "Couldnt connect to database<br>Please refresh the page!";
			exit;
		}

		     $sqlStr=" SELECT * from `userdata` where `email`='$userName@gmail.com'; ";
		     $result = $db ->query($sqlStr);
		     $rows = $result->fetch_object();

		     $sqlStr=" SELECT * from `images` where `img_uploader`='$userName'; ";
		     $r = $db ->query($sqlStr);
		     $images = $r->fetch_all();
		?>      
</head>
<body>

	<div class="container" style="margin-top: 50px; width: 60%;">

	<div class="userdetails" style="float: left;">
		<?php
		echo "<h3> User Details</h3>";
		echo "_________________________";
		echo "<br>";
		echo "Username  | $userName";
		echo "<br>";
		echo "First Name | $rows->first_name";
		echo "<br>";
		echo "Last Name | $rows->last_name";
		echo "<br>";
		echo "Gender    | $rows->gender";
		echo "<br>";
		echo "City      | $rows->city";
		?>
	</div>


	<div class="userImages" style="margin: 50px;">
		<?php
			  for ($i=0; $i < $r->num_rows; $i++) { 

				$link = $images[$i][0];
				$username = $images[$i][1];
				$discript = $images[$i][2];
				$title=$images[$i][3];
				
				echo " <form method=\"POST\" action=\"update_user.php?update=$link\" > <div class=\"card\" > <a href=\"" .$link. "\"> <img class=\"card-img-top\" src=\" " .$link." \" alt=\"".$username."\">  </a><div class=\"card-body\"> <a href='index.php?link=$link'> <img src=\"img/delete.png\" width=\"20\" /> </a> <h4 class=\"card-title\">"."<input type=\"text\" name=\"title\" value=\"".$title."\"> </h4> <p class=\"card-text\"> <textarea type=\"text\" name=\"descript\"> " .$discript. " </textarea> </p><button type=\"submit\" class=\"btn btn-primary\">Update</button>	</form> </div></div>";
			}

		?>
	</div>

	</div>



</body>
</html>