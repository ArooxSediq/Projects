<?php

  class Database
  {
    var $server='localhost';
    var $userId='root';
    var $password='';
    var $dbName='galleriawebsite';

    function __construct()
    {
    }
    
    function Database($serverprm,$userIdprm,$passwordPrm,$databasePrm)
    {
      $this-> server=$serverprm;
      $this-> userId=$userIdprm;
      $this-> password=$passwordPrm;
      $this-> dbName=$databasePrm;
    }

    function CreateConnection()
    {
        return new mysqli( $this-> server , $this-> userId, $this-> password , $this-> dbName );
    }

  }

 ?>