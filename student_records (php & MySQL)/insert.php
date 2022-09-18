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
  <title>Create an account</title>
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
    $id = $_GET['ID'];
    
    //show data. This will also be use to access users field
    //Sort data LIFO
    $sql = "SELECT * FROM student_list WHERE ID='$id'"; 
    $student = $con -> query($sql) or die($con -> error);
    $row = $student -> fetch_assoc();;

    //Similar to href or src
    /* include_once("connection/sample.php");
    connection(); */

    //$_POST['submit'] - the 'submit' here should be the same to the value of name attribute
    if (isset($_POST['submit'])) {
        echo 'You submitted an input';
        
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $gender = $_POST['gender'];
        
        $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `gender`) VALUES ('$fname','$lname','$gender')";

        $con -> query($sql) or die($con -> error);
        echo header ("Location: index.php");
    }
  ?>
  

</head>
<body>
  <h1>Create an account</h1><br/>

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
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example1 first_name" class="form-control" name='first_name' required/>
        <label class="form-label" for="form3Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2 last_name" class="form-control" name='last_name' required/>
        <label class="form-label" for="form3Example2">Last name</label>
      </div>
    </div>
  </div>

  <select name='gender' id='gender'>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
  </select>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
    <label class="form-check-label" for="form2Example33">
      Subscribe to our newsletter
    </label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name='submit' value='Submit'>Sign up</button>

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