<?php
 class database
  {

   function connect()
    { 
      $DB = new mysqli( 'localhost' , 'u636880130_pub', 'xaja@capstone' , 'u636880130_tu' );
       	 
      if ($DB->connect_errno) return $DB->connect_error;
      else return $DB;
     }
  }
  
 ?>