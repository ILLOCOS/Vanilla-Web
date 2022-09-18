<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
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

  <!-- CSS -->
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

  .login {
    display: block;
    margin: auto;
  }
  </style>

  <!-- Php -->


  <?php

include_once ('connection/connection.php');
$con = connection();

if (!isset($_SESSION)) {
  session_start();
};

if (isset($_POST['login'])) {
  $uname = $_POST['username'];
  $pword = $_POST['password'];
  /* echo */$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pword' ";

  
  $user = $con -> query($sql) or die($con -> error); 
  $row = $user -> fetch_assoc();
  $total = $user -> num_rows;
  if($total > 0) {
      $_SESSION['userlogin'] = $row['username'];
      $_SESSION['access'] = $row['access'];

      echo $_SESSION ['userlogin'];
      echo header ("Location: index.php");
  }
  else {
    echo "No user found";
  }   
}



    

//show data. This will also be use to access users field
//Sort data LIFO
$id = $_GET['ID'];
$sql = "SELECT * FROM student_list WHERE ID='$id'"; 
$student = $con -> query($sql) or die($con -> error);
$row = $student -> fetch_assoc();

    
  ?>

</head>
<body>
  
    <h1>Login Page</h1><br/>

    <form class="form" action='' method='POST'>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="form2Example1 first_name" class="form-control" name='username' />
    <label class="form-label" for="form2Example1">Username</label>
  </div>


  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2 password" class="form-control" name='password' />
    <label class="form-label" for="form2Example2">Password</label>
  </div>


  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
        <label class="form-check-label" for="form2Example34"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name='login'>Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
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
