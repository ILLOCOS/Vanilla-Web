<?php

include_once("connection/connection.php");
$con = connection();


$id = $_GET['Appointment_Number'];

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }

$sql = "DELETE FROM appointment WHERE Appointment_Number ='$id'";
if ($con->query($sql) === TRUE) {
    echo header ("Location: index.php");
  } else {
    echo "Error deleting record: " . $con -> error;
  }

 /*  echo $id = $_POST['ID'];
if(isset($_POST['delete'])){

    $id = $_POST['ID'];
    $sql = "DELETE FROM student_list WHERE ID ='$id' ";
    $con -> query($sql) or die ($con -> error);
    echo header ("Location: index.php");
} */


?>