<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
  <title>Schedule an Appointment</title>
  <style>
    h1 {
      text-align: center;
      margin-top: 100px;
    }
    .form {
    width: 75%;
    height: 500px;
    margin: auto;
    padding: 2em;
  }
  </style>
  
  <?php

    include_once ('connection/connection.php');
    $con = connection();
    $id = $_GET['Appointment_Number'];
    
    //show data. This will also be use to access users field
    //Sort data LIFO
    $sql = "SELECT * FROM appointment WHERE Appointment_Number='$id'"; 
    $patient = $con -> query($sql) or die($con -> error);
    $row = $patient -> fetch_assoc();;

    //Similar to href or src
    /* include_once("connection/sample.php");
    connection(); */

    //$_POST['submit'] - the 'submit' here should be the same to the value of name attribute
    if (isset($_POST['submit'])) {
        echo 'You submitted an input';
        
        $appdate = $_POST['Appointment_Date'];
        $apptime = $_POST['Appointment_Time'];
        $apptype = $_POST['Appointment_Type'];
        $patid = $_POST['Patient\'s_ID'];
        $patname = $_POST['Patient\'s_Name'];
        $phone = $_POST['Phone_Number'];
        $docid = $_POST['Doctor\'s_ID'];
        $docname = $_POST['Doctor\'s_Name'];
        
        $sql = "INSERT INTO `appointment`(`Appointment_Date`, `Appointment_Time`, `Appointment_Type`, `Patient's_ID`, `Patient's_Name`, `Phone_Number`, `Doctor's_ID`, `Doctor's_Name`) VALUES ('$appdate','$apptime','$apptype','$patid','$patname','$phone','$docid','$docname')";

        $con -> query($sql) or die($con -> error);
        echo header ("Location: index.php");
    }
  ?>
  

</head>
<body>
  <h1>Schedule an Appointment</h1><br/>

  <!-- GET input appears in url while 
    POST appears in DevTool > Network > input.php > Payload-->
  <!-- <form action='' method='POST'>
    <label>First Name</label>
    <input type='text' name='first_name' id='first_name' required/><br/>
    <label>Last Name</label>
    <input type='text' name='last_name' id='last_name' required/>
    <label>Gender</label>
    <select name='gender' id='gender'>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <input type='submit' name='submit' value='Submit'/>
</form> -->

<form action='' method='POST' class="form">
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="date" id="form3Example1 Appointment_Date" class="form-control" name='Appointment_Date' required/>
        <label class="form-label" for="form3Example1">Appointment Date</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="time" id="form3Example2 Appointment_Time" class="form-control" name='Appointment_Time' required/>
        <label class="form-label" for="form3Example2">Appointment Time</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Appointment_Type" class="form-control" name='Appointment_Type' required/>
        <label class="form-label" for="form3Example2">Appointment Type</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Patient's_ID" class="form-control" name="Patient's_ID" required/>
        <label class="form-label" for="form3Example2">Patient's ID</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Patient's_Name" class="form-control" name="Patient's_Name" required/>
        <label class="form-label" for="form3Example2">Patient's Name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Phone_Number" class="form-control" name='Phone_Number' required/>
        <label class="form-label" for="form3Example2">Phone Number</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Doctor's_ID" class="form-control" name="Doctor's_ID" required/>
        <label class="form-label" for="form3Example2">Doctor's ID</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 Doctor's_Name" class="form-control" name="Doctor's_Name" required/>
        <label class="form-label" for="form3Example2">Doctor's Name</label>
      </div>
    </div>
  </div>


  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
    <label class="form-check-label" for="form2Example33">
      Subscribe to our newsletter
    </label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name='submit' value='Submit'>Schedule Appointment</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>or sign up with:</p>
    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>

 <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
  
</body>
</html>