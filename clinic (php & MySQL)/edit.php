<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>Edit data</title>
  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"
/>
  <style>
     h1 {
      text-align: center;
      margin: 100px auto 50px auto;
    }
    .form {
    width: 75%;
    margin: auto;
    padding: 2em;
    border: 1px solid blue;
    border-radius: 10px;
  }
    .update {
      margin: 50px auto;
      width: 250px;
      display: block;
    }
    .back {
      text-align: center;
      display: block;
      margin-top: 50px;
    }
    
  </style>
  
  <?php
    //show data. This will also be use to access users field
    //Sort data LIFO
    //Similar to href or src
    /* include_once("connection/sample.php");
    connection(); */

    //$_POST['submit'] - the 'submit' here should be the same to the value of name attribute
    include_once ('connection/connection.php');
    $con = connection();

    $id = $_GET['Appointment_Number'];
    $sql = "SELECT * FROM appointment WHERE Appointment_Number='$id'"; 
    $patient = $con -> query($sql) or die($con -> error);
    $row = $patient -> fetch_assoc();

    
    if (isset($_POST['submit'])) {
        echo 'You submitted an input';

        $id = $_GET['Appointment_Number'];
        $sql = "SELECT * FROM appointment"; 
        $patient = $con -> query($sql) or die($con -> error);
        $row = $patient -> fetch_assoc();
        
        $appdate = $_POST['Appointment_Date'];
        $apptime = $_POST['Appointment_Time'];
        $apptype = $_POST['Appointment_Type'];
        $patid = $_POST['Patient\'s_ID'];
        $patname = $_POST['Patient\'s_Name'];
        $phone = $_POST['Phone_Number'];
        $docid = $_POST['Doctor\'s_ID'];
        $docname = $_POST['Doctor\'s_Name'];
        
        
        $sql = "UPDATE `appointment` SET `Appointment_Date`='$appdate',`Appointment_Time`='$apptime',`Appointment_Type`='$apptype',`Patient's_ID`='$patid',`Patient's_Name`='$patname',`Phone_Number`='$phone',`Doctor's_ID`='$docid',`Doctor's_Name`='$docname' 
        WHERE Appointment_Number = '$id'";
        $con -> query($sql) or die($con -> error);

        echo header ("Location: details.php?Appointment_Number=" . $id);
    }
  ?>

</head>
<body>
    <!-- GET input appears in url while 
    POST appears in DevTool > Network > input.php > Payload-->
   
    <h1>Edit data</h1>

<form action='' method='POST' class="form">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="date" id="form3Example1 Appointment_Date" class="form-control" name='Appointment_Date' value="<?php echo $row['Appointment_Date']; ?>"/>
        <label class="form-label" for="form3Example1">Appointment Date</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="time" id="form3Example2 Appointment_Time" class="form-control" name='Appointment_Time' value="<?php echo $row['Appointment_Time']; ?>"/>
        <label class="form-label" for="form3Example2">Appointment Time</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Appointment_Type" class="form-control" name='Appointment_Type' value="<?php echo $row['Appointment_Type']; ?>"/>
        <label class="form-label" for="form3Example2">Appointment Type</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Patient's_ID" class="form-control" name="Patient's_ID"
        value="<?php echo $row['Patient\'s_ID']; ?>"/>
        <label class="form-label" for="form3Example2">Patient's ID</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Patient's_Name" class="form-control" name="Patient's_Name"
        value="<?php echo $row['Patient\'s_Name']; ?>"/>
        <label class="form-label" for="form3Example2">Patient's Name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Phone_Number" class="form-control" name='Phone_Number' value="<?php echo $row['Phone_Number']; ?>"/>
        <label class="form-label" for="form3Example2">Phone Number</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Doctor's_ID" class="form-control" name="Doctor's_ID" value="<?php echo $row['Doctor\'s_ID']; ?>"/>
        <label class="form-label" for="form3Example2">Doctor's ID</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Doctor's_Name" class="form-control" name="Doctor's_Name" value="<?php echo $row['Doctor\'s_Name']; ?>"/>
        <label class="form-label" for="form3Example2">Doctor's Name</label>
      </div>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4 update" name='submit' value='Update'>Update</button>

  </div>
</form>

<a class="back" href=details.php>Back</a>


 <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
  
</body>
</html>