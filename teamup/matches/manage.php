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

	<style type="text/css">
		div{
		}
	</style>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/custom.css">
		<script src="../js/bootstrap.min.js" ></script>

<?php
	session_start();
	include("header.php");
	include_once('../database.php');
	$DB = new database(); 
	@ $DB = $DB->connect('root','');

	$q="SELECT * FROM `game` as g,`mygames` as m where m.`game_id` = '".mysqli_real_escape_string($DB,$_GET['id'])."' AND g.`game_id` = m.`game_id` AND m.`played` = 0 ";
    $result = $DB->query($q);
    $Data = $result->fetch_all();

   
    if(!isset($Data[0][0])) 
    {
    	$noPlayers=1;

    	$q="SELECT * FROM `game` where `game_id` = '".mysqli_real_escape_string($DB,$_GET['id'])."' ";
	    $result = $DB->query($q);
	    $Data = $result->fetch_all();
    }

 

    $datetime = explode(" ",$Data[0][2]);

    if(isset($_SESSION['username']))
    {
    		if(isset($_GET['update_player']))
							{

								$q="UPDATE `mygames` SET `played` = '1', `player_performance` = '".mysqli_real_escape_string($DB,$_POST['performance'])."' WHERE `mygames`.`mygame_id` = ".mysqli_real_escape_string($DB,$_POST['mygame_id']).";";
								echo $q;

							    $result = $DB->query($q);

							  
								header("Location: manage.php?id=".$_GET['id']." ");

							}

				if(isset($_GET['update_game']))
							{

							
								$q="UPDATE `game` SET `game_name` = '".mysqli_real_escape_string($DB,$_POST['name'])."', `game_time` = '".mysqli_real_escape_string($DB,$_POST['date'])." ".mysqli_real_escape_string($DB,$_POST['time'])."', `game_discription` = '".$_POST['descript']."', `game_vacancies` = '".mysqli_real_escape_string($DB,$_POST['available_seats'])."',`game_address` = '".mysqli_real_escape_string($DB,$_POST['address'])."' , `game_image` = '".$_POST['image']."' WHERE `game`.`game_id` = ".mysqli_real_escape_string($DB,$_GET['id']).";";

							    $result = $DB->query($q);
							   	
								
								header("Location: manage.php?id=".$_GET['id']." ");



							}
    }


	

?>


</head>
<body>



	<div name="container" style="padding-left:5%;padding-right:5%;>
        <br>
        <h2 class="justify-center" > My Game </h2>
        <hr>

		<div class="row justify-content-center" style="margin-left: 0%" >
			<div class="col-12 ">
				<form action="manage.php?update_game=true&id=<?php echo $_GET['id'] ?>" method="POST"> 
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Game Title</label>
				    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="eg: Basketball Tournament" name="name" value="<?php echo $Data[0][1] ?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1">Match Game</label>
				    <select class="form-control" name="image" id="exampleFormControlSelect1">
				    	<option selected=""value="<?php echo $Data[0][6] ?>">Change</option>
				      <option value="../img/football.jpg">FootBall</option>
				      <option value="../img/basketball.jpg">BasketBall</option>
				      <option value="../img/volleyball.jpg">VolleyBall</option>
				      <option value="../img/chess.jpg">Chess</option>
				      <option value="../img/other.jpg">Other</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Date</label>
				    <input type="date" class="form-control" id="exampleFormControlInput1" name="date" value="<?php echo $datetime[0] ?>">
				  </div>
				   <div class="form-group">
				    <label for="exampleFormControlInput1">Time</label>
				    <input type="time"  class="form-control" id="exampleFormControlInput1" name="time" value="<?php echo $datetime[1] ?>">
				  </div>
				   <div class="form-group">
				    <label for="exampleFormControlInput1">Address</label>
				    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="eg: Mama Yare Football field, Slemani" name="address" value="<?php echo $Data[0][10] ?>">
				  </div>
				   <div class="form-group">
				    <label for="exampleFormControlSelect2">Available Spots</label>
				    <input type="number" name="available_seats" class="form-control" id="exampleFormControlSelect2" value="<?php echo $Data[0][5] ?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Description</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descript"><?php echo $Data[0][3] ?></textarea>
				  </div>
				  	<div class="form-group">
				    <input type="submit" class="form-control btn-info" name="submit" value="Update">
				  </div>
				</form>	
			</div>
			</div>

			<hr>
			<h2>Players & Reviews</h2>
			<hr>

			<div class="row justify-content-center">
				

			<?php
			   if(isset($noPlayers)) echo "<h4>No players signed up yet :(";

			   else
			   {
				for ($i=0; $i < count($Data); $i++) 
					{ 	

					echo
					" 
					
					<div style=\"margin: 2.5%\" class=\"col-8 col-md-3 col-lg-4\">
					<div class=\"card \" style=\"width: 18rem;\">
					<form action=\"manage.php?update_player=true&id=".$_GET['id']."\" method=\"POST\">
					 <div style=\"height:100px; overflow:hidden;\">
					  <img class=\"card-img-top\" src=\"../img/User-placeholder.png\" alt=\"Card image cap\">
					 </div>
					 
					  <div class=\"card-body\">
					    <h5>". $Data[$i][12]  ."</h5>
					     <small>Performance: <input type=\"number\" required name=\"performance\" min=\"0\" max=\"10\"> </small>
					     <hr>
					  <input type=\"submit\" value=\"Submit\" class=\"btn btn-info\">   	 
					  <input type=\"text\" hidden name=\"mygame_id\" value=\"".$Data[$i][11]."\">
					  </div>
					  </form>
					</div>
					</div>
					
					";
				
					}
				}

				?>
			</div>

				

			</div>
		</div>
    
    <?php 	include("footer.php"); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>