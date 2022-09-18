<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Details</title>
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
    body {
      font-family: "Verdana";
    }
    h1 {
      text-align: center;
      margin: 100px auto;
    }
    table {
      border: 2px solid black;
      border-collapse: collapse;
      width: 75%;
      margin: auto;
    }
    th, td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #800;
    }
    tr:nth-child(even) {
      background-color: #f00;
      color: #ff0;
    }
    .link {
      text-decoration-line: none;
    }
    .back {
      text-align: center;
      display: block;
      margin-top: 50px;
    }
  </style>
  <?php
    //Any output here won't be affected even if you browse other php files from links
    //Similar to href or src
    /* include_once("connection/sample.php");
    connection(); */

    //you may use a statement "include 'path/.css'" to link a css

    include_once ('connection/connection.php');
    $con = connection();

    if(!isset($_SESSION)){
      session_start();
    }
    if (isset($_SESSION['access']) && $_SESSION['access'] == 'admin') {
      /* echo 'Welcome '. $_SESSION['userlogin'] . "<br/><br/>"; */
    }
    else {
      echo header("Location: index.php");
    }

    
    
    
    //show data. This will also be use to access users field
    //Sort data LIFO
    $id = $_GET['ID'];
    $sql = "SELECT * FROM student_list WHERE ID='$id'"; 
    $student = $con -> query($sql) or die($con -> error);
    $row = $student -> fetch_assoc();
  
    //an access with an 'admin' will only access the view details.php
    

    /* print_r($row); */
    /* do{
      echo $row['first_name'] . " " . $row['last_name'] . "<br/>";
    }while($row = $student -> fetch_assoc()); */
  ?>

</head>
<body>

  <h1>Welcome <?php echo $row['first_name'] . " " . $row['last_name']; ?></h1>
  <table class="table table-striped table-hover table-secondary w-50">
    <thead>
      <tr>
        <th class="field"><b>First Name</b></th>
        <th class="field"><b>Last Name</b></th>
        <th class="field"><b>Gender</b></th>
        <th colspan="2" class="field"><b>Modify</b></th>
      <tr>
    </thead>
    <tbody>
    <tr>
          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
          <td><?php echo $row['gender']; ?></td>
          <form action='delete.php' method='POST'>
          <td><a href="edit.php?ID=<?php echo $row['ID'];?>">
          Change
          </a><br/>
          </td>
          <td><a href='delete.php?ID=<?php echo $row['ID']; ?>'
            name='delete'>
            Delete
          </a><br/>
          </form>
          </td>
     </tr>
  </table>
  <a class="back" href=index.php>Back</a>
  
  

  
  <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
</body>
</html>