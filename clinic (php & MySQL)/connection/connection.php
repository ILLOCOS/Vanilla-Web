<?php

  function connection(){
    //Connect database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "clinic";
    
    
    $con = new mysqli($host, $username, $password, $database);
    

    if ($con -> connect_error) { 
      echo $con -> connect_error; 
    } else {
      return $con;
      
    }
  }
  

?>


  

