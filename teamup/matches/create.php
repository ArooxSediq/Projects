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

	

    if(isset($_SESSION['username']))
    {
    		if(isset($_GET['create']))
							{
								//Implemented SQL INJECTION
								$datetime=$_POST['date']." ".$_POST['time'].":00";
						
								$q="INSERT INTO `game` (`game_id`, `game_name`, `game_time`, `game_discription`, `game_currentPlayers`, `game_vacancies`, `game_image`, `game_lat`, `game_lng`, `author_email`, `game_address`) VALUES (NULL, '".mysqli_real_escape_string($DB,$_POST['name'])."', '".$datetime."', '".mysqli_real_escape_string($DB,$_POST['descript'])."', '0', '".mysqli_real_escape_string($DB,$_POST['available_seats'])."', '".$_POST['image']."', '0', '0', '".mysqli_real_escape_string($DB,$_SESSION['username'])."','".mysqli_real_escape_string($DB,$_POST['address'])."');";
							    //----------------------

							    $result = $DB->query($q);
							   	
								header("Location: index.php");


							}
    }else header("Location: ../index.php");


	

?>


</head>
<body>



	<div name="container" style="padding-left:5%;padding-right:5%;">
        <br>
        <h2 class="justify-center" > Create Game  </h2>
        <hr>

		<div class="row justify-content-center" style="margin-left: 0%" >
			<div class="col-9">

				<form action="create.php?create=true" method="POST"> 

				  <div class="form-group">
				    <label for="exampleFormControlInput1">Game Title</label>
				    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="eg: Basketball Tournament" name="name">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1">Match Game</label>
				    <select class="form-control" name="image" id="exampleFormControlSelect1">
				      <option value="../img/football.jpg">FootBall</option>
				      <option value="../img/basketball.jpg">BasketBall</option>
				      <option value="../img/volleyball.jpg">VolleyBall</option>
				      <option value="../img/chess.jpg">Chess</option>
				      <option value="../img/other.jpg">Other</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Date</label>
				    <input type="date" class="form-control" id="exampleFormControlInput1" name="date">
				  </div>
				   <div class="form-group">
				    <label for="exampleFormControlInput1">Time</label>
				    <input type="time"  class="form-control" id="exampleFormControlInput1" name="time">
				  </div>
				  
				   <div class="form-group">
				    <label for="exampleFormControlSelect2">Available Spots</label>
				    <input type="number" name="available_seats" class="form-control" id="exampleFormControlSelect2">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2">Address</label>
				    <input type="text" name="address" class="form-control" id="exampleFormControlSelect2">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Description</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descript"></textarea>
				  </div>
				  	<div class="form-group">
				    <input type="submit" class="form-control btn-info" name="submit" value="Create">
				  </div>
				</form>

			</div>
		</div>
	</div>
      <?php 	include("footer.php"); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>