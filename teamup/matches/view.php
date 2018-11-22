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

    $q="SELECT * FROM `game` where `game_id` = '".mysqli_real_escape_string($DB,$_GET['id'])."' ";
    $result = $DB->query($q);
    $Data = $result->fetch_all();

    $datetime = explode(" ",$Data[0][2]);


    if(isset($_SESSION['username']))
    {
        $q="SELECT game_id FROM `mygames` WHERE player_email = '".$_SESSION['username']."' GROUP BY game_id";
        $result = $DB->query($q);
        
        if($result)
        {
            $myGames = $result->fetch_all();  
            for($o=0;$o < count($myGames);$o++ )
                {
                    if($Data[0][0]==$myGames[$o][0])
                    {
                        $enrolled=true;
                        break;
                    }
                    
                }
                                        
        }
        
    }
?>


</head>
<body>



    <div name="container" >
        
            <div style="margin: 2.5%" class="row justify-content-center">
                    <div class="card" style="width: 25rem;">
                    
                     <div style="height:100px; overflow:hidden;">
                      <img class="card-img-top" src="<?php echo $Data[0][6] ?>">
                     </div>
                     
                      <div class="card-body">
                        <a class="text-info" href="http://teamup.pe.hu/matches/view.php?id=<?php echo $Data[0][0] ?>" > <h5> <?php echo $Data[0][1] ?> </h5></a>
                         <small>Available Spots: <?php echo ($Data[0][5]-$Data[0][4]) ?> </small>
                         <br>
                        <small>Total Spots: <?php echo $Data[0][5] ?> </small>
                         <br>
                        <small>Date: <?php echo $datetime[0]  ?></small>
                         | 
                        <small>Time: <?php echo $datetime[1]  ?></small>
                         <br>
                        <small>Location: <?php echo $Data[0][10]  ?></small>
                         <br>
                        <a class="text-info" href="https://www.google.com/maps/search/?api=1&query= <?php echo $Data[0][10] ?> " >
                        Get Directions</a>
                        <hr>
                       
                       <?php 
                        $button=" ";
                       $manage= " ";
                            for ($i=0; $i < count($Data); $i++) 
                            {
                                
                                $datetime = explode(" ",$Data[$i][2]);
                                
                                if(isset($_SESSION['username'])) 
                                    {
                                        
                                      if($Data[$i][2]<date("Y-m-d hh:mm:ss")) 
                                       {
                                           $button= "<button href=\"index.php?play=true&user=".$_SESSION['username']."&game=".$Data[$i][0]."\" disabled class=\"btn btn-secondary \">Expired</button>"; 
                                       }
                                        else{   
                                            
                                            if(isset($enrolled)) $button= "<a href=\"index.php?cancel=true&user=".$_SESSION['username']."&game=".$Data[$i][0]."\" class=\"btn btn-danger \">Cancel</a>";
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
                        
                                }
                            echo $button;
                            echo $manage;
                            }
                            
                       ?>
                       
                    
                        <a href="http://api.qrserver.com/v1/create-qr-code/?data=http://teamup.pe.hu/matches/view.php?id=<?php echo $Data[0][0] ?> &size=500x500" data-toggle="modal" data-target="#exampleModal" class="btn btn-info">Share</a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Share with your friends!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                
                                <img width="100%" src="http://api.qrserver.com/v1/create-qr-code/?data=http://teamup.pe.hu/matches/view.php?id=<?php echo $Data[0][0] ?> &size=500x500">
                                
                                <input id="myInput" value="http://api.qrserver.com/v1/create-qr-code/?data=http://teamup.pe.hu/matches/view.php?id=<?php echo $Data[0][0] ?> &size=500x500" style="width:100%;">
                                
                                

                          </div>
                          <div class="modal-footer">
                            <button type="button" onclick="copyToClipboard()" class="btn btn-info" data-dismiss="modal">Copy</button>
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                        
                        
                        
                     
                        
                       
                        
                      </div>
                    </div>
                    </div>
    </div>
    
    <?php 	include("footer.php"); ?>
    <script>
    function copyToClipboard() {
      var copyText = document.getElementById("myInput");
      copyText.select();
      document.execCommand("copy");
    //   alert("Copied the text: " + copyText.value);
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>