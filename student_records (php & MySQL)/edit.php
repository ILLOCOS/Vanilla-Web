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

    $id = $_GET['ID'];
    $sql = "SELECT * FROM student_list WHERE ID='$id'"; 
    $student = $con -> query($sql) or die($con -> error);
    $row = $student -> fetch_assoc();

    
    if (isset($_POST['submit'])) {
        echo 'You submitted an input';

        $id = $_GET['ID'];
        $sql = "SELECT * FROM student_list"; 
        $student = $con -> query($sql) or die($con -> error);
        $row = $student -> fetch_assoc();
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        
        
        $sql = "UPDATE student_list SET first_name = '$firstname', last_name = '$lastname', gender = '$gender' WHERE ID = '$id'";
        $con -> query($sql) or die($con -> error);

        echo header ("Location: details.php?ID=" . $id);
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
        <input type="text" 
        id="form3Example1 firstname" 
        class="form-control" 
        name='firstname'
        value="<?php echo $row['first_name']; ?>" 
        required/>
        <label class="form-label" for="form3Example1">First name</label>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
        <input type="text" 
        id="form3Example2 lastname" 
        class="form-control" 
        name='lastname' 
        value="<?php echo $row['last_name']; ?>" 
        required/>
        <label class="form-label" for="form3Example2">Last name</label>
      </div>
    </div>
  </div>

  <label>Gender</label><br/>
    <select name='gender' 
      id='gender'>
        <option value="Male"
          <?php echo($row['gender'] == "Male") ? 'selected' : ''; ?> >
          Male
        </option>
        <option value="Female"
          <?php echo($row['gender'] == "Female") ? 'selected' : ''; ?> >
          Female
        </option>
    </select>

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