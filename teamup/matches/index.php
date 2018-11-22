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
	<script src="../js/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="../css/custom.css">
	

<?php
	session_start();
	include("header.php");
	include_once('../database.php');
	$DB = new database(); 
	@ $DB = $DB->connect('root','');

	$q="SELECT * FROM `game` ORDER BY `game`.`game_time` DESC ;";

    $result = $DB->query($q);
    $Data = $result->fetch_all();

    if(isset($_SESSION['username']))
    {
        $q="SELECT game_id FROM `mygames` WHERE player_email = '".$_SESSION['username']."' GROUP BY game_id";
        $result = $DB->query($q);
        $myGames = $result->fetch_all();
        
        
				//SQL INJECTION PREVENTION IMPLEMENTATION
    		if(isset($_GET['play']))
							{
        
                                $q="SELECT game_id,player_email FROM `mygames` where game_id = '".mysqli_real_escape_string($DB,$_GET['game'])."' AND player_email = '".mysqli_real_escape_string($DB,$_GET['user'])."' ";
                                
                                $result = $DB->query($q);
                                $check = $result->fetch_object();
                
                                
                                if(!isset( $check->game_id)) 
                                {
                            		
                            		$q="INSERT INTO `mygames` (`mygame_id`, `player_email`, `going`, `played`, `game_id`) VALUES (NULL, '".mysqli_real_escape_string($DB,$_GET['user'])."', '1', '0', '".mysqli_real_escape_string($DB,$_GET['game'])."');";
        
    							    $result = $DB->query($q);
    							    
    							    $q="UPDATE `game` SET `game_currentPlayers` = `game_currentPlayers`+1 WHERE `game`.`game_id` = ".mysqli_real_escape_string($DB,$_GET['game']).";";
    							    
    							    $result = $DB->query($q);
    							    
    							   	
    								header("Location: index.php");
                                    
                                }
                              
                                
						


							}
							
				if(isset($_GET['cancle'])){
				    $q="DELETE FROM `mygames` WHERE `mygames`.`game_id` = '".mysqli_real_escape_string($DB,$_GET['game'])."' AND player_email = '".mysqli_real_escape_string($DB,$_GET['user'])."' ";
				    $result = $DB->query($q);
				    
				     $q="UPDATE `game` SET `game_currentPlayers` = `game_currentPlayers`-1 WHERE `game`.`game_id` = ".mysqli_real_escape_string($DB,$_GET['game']).";";
    							    
    				$result = $DB->query($q);
    							    
    				header("Location: index.php");
				}
    }


	

?>


</head>
<body>



	<div name="container" style="padding-left:5%;padding-right:5%;">
        <br>
        <h2 class="justify-center text-info" > Games </h2>
        <hr>

		<div class="row justify-content-center" style="margin-left: 0%" >

				<?php
                 $manage= " ";
                 
				for ($i=0; $i < count($Data); $i++) 
				{
					$datetime = explode(" ",$Data[$i][2]);
                    
					if(isset($_SESSION['username'])) 
						{
						    
						  for($o=0;$o < count($myGames);$o++ )
        				    {
        				        if($Data[$i][0]==$myGames[$o][0])
        				        {
        				            $enrolled=true;
        				            break;
        				        }
        				        
        				    }
        				    
						  if($Data[$i][2]<date("Y-m-d hh:mm:ss")) 
						   {
						       $button= "<button href=\"index.php?play=true&user=".$_SESSION['username']."&game=".$Data[$i][0]."\" disabled class=\"btn btn-secondary \">Expired</button>"; 
						   }
						    else{	
						        
						        if(isset($enrolled) and $enrolled==true) $button= "<a href=\"index.php?cancle=true&user=".$_SESSION['username']."&game=".$Data[$i][0]."\" class=\"btn btn-danger \">Cancel</a>";
						        else $button= "<a href=\"index.php?play=true&user=".$_SESSION['username']."&game=".$Data[$i][0]."\" class=\"btn btn-info \">Play</a>";
						    }   
						    
							if($Data[$i][9]==$_SESSION['username'])
								{
									$manage= " <a href=\"manage.php?id=".$Data[$i][0]."\" class=\"btn btn-info \">Manage</a> ";
									$button= " ";
								} 
								else $manage= " ";
					
						}
					else	
					{
					     if($Data[$i][2]<date("Y-m-d hh:mm:ss")) $button= "<button href=\"../\" disabled class=\"btn btn-secondary \">Expired</button>"; 
						    else $button= "<a href=\"../\" class=\"btn btn-info \">Play</a>";
						    
					   
					}
				    $enrolled=false;

					echo
					" 
					<div style=\"margin: 2.5%\">
					<div class=\"card \" style=\"width: 18rem;\">
					
					 <div style=\"height:100px; overflow:hidden;\">
					  <img class=\"card-img-top\" src=\"". $Data[$i][6] ." \" alt=\"Card image cap\">
					 </div>
					 
					  <div class=\"card-body\">
					    <a class=\"text-info\" href=\"http://teamup.pe.hu/matches/view.php?id=".$Data[$i][0]."\"><h5>". $Data[$i][1]  ."</h5></a>
					     <small>Available Spots: ".($Data[$i][5]-$Data[$i][4])." </small>
					     <br>
					    <small>Total Spots: ".$Data[$i][5]." </small>
					     <br>
					    <small>Date: ". $datetime[0]  ."</small>
					     | 
					    <small>Time: ". $datetime[1]  ."</small>
					     <br>
					    <small>Location: ". $Data[$i][10]  ."</small>
					     <br>
					    <a class=\"text-info\" href=\"https://www.google.com/maps/search/?api=1&query=".$Data[$i][10]."\" >
                        Get Directions</a>
					    <hr>
					   ".$button."
					   	".$manage."
					   	<a href=\"http://teamup.pe.hu/matches/view.php?id=".$Data[$i][0]."\" class=\"btn btn-info \">Share</a>
					   	
					   	
					  </div>
					</div>
					</div>

					";
					
					
				}


				?>

			</div>
		</div>
    
    <?php 	include("footer.php"); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>