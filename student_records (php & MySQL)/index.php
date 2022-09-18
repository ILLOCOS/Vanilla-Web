<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student's Information</title>
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
      padding-top: 2em;
      padding-bottom: 2em;
    }
    table {
      border: 2px solid black;
      border-collapse: collapse;
      margin: auto;
    }
    th, td {
      text-align: center;
      padding: 8px;
      border-bottom: 1px solid #800;
    }
    /* tr:nth-child(even) {
      background-color: #f00;
      color: #ff0;
    } */
    .link {
      text-decoration-line: none;
    }

  </style>
  <?php
    //Any output here won't be affected even if you browse other php files from links
    //Similar to href or src
    /* include_once("connection/sample.php");
    connection(); */

    //you may use a statement "include 'path/.css'" to link a css

    //Connect database
    

    include_once ('connection/connection.php');
    $con = connection();

    
  
    //Show data from student_list
    $sql = "SELECT * FROM student_list ORDER BY ID DESC";  //Sort data LIFO
    $student = $con -> query($sql) or die($con -> error);
    $row = $student -> fetch_assoc();
  
  
    /* print_r($row); */
    /* do{
      echo $row['first_name'] . " " . $row['last_name'] . "<br/>";
    }while($row = $student -> fetch_assoc()); */

    //Filter
    if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `student_list` WHERE CONCAT(`first_name`, `last_name`, `gender`) LIKE '%". $valueToSearch . "%' " ;
    $search_result = filterTable($query); 
    
}
 else {
    $query = "SELECT * FROM `student_list`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "student_records");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
  ?>

</head>
<body>

<nav class="navbar fixed-top navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand">
      <?php
       if(!isset($_SESSION)){
      session_start();
    }
    if (isset($_SESSION['userlogin'])) {
      echo 'Welcome ' . $_SESSION['userlogin'];
    }
    else {
      echo 'Welcome Guest';
    }
      ?>
    </a>
    
    <form class="d-flex input-group w-auto" action="index.php" method="post">
      <input
        type="search"
        class="form-control rounded"
        placeholder="Search something..."
        aria-label="Search"
        aria-describedby="search-addon"
        name="valueToSearch"
      />
      <input type="hidden" name="search" value="Filter">
      <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search"></i>
      </span>
      
        <a class="nav-link" style="color: white;" href='insert.php?ID=<?php echo $row['ID']; ?>'>Register</a>
        
        <?php if(isset($_SESSION['userlogin'])){?>
          <a class="nav-link" style="color: white;" href='logout.php'>Log Out</a><br/>
        <?php } else { ?>
          <a class="nav-link" style="color: white;" href='login.php?ID=<?php echo $row['ID']; ?>'>Log In</a><br/>
        <?php }?>
    </form>
  </div>
</nav>

  

  <!-- This won't toggle login/out -->
  <!-- <a href='login.php'>Log In</a><br/>
  <a href='logout.php'>Log Out</a><br/> -->

  
  <hr>
  <br><br>
  <!-- <form action="index.php" method="post">
    <input type="text"  placeholder="Search...">
    <input type="submit" name="search" value="Filter"><br><br>
  </form> -->

  <h1>Student's Information</h1>
  <table class="table table-striped table-hover table-secondary w-50">
    <thead>
      <tr>
        <th class="field"><b>First Name</b></th>
        <th class="field"><b>Last Name</b></th>
        <th class="field"><b>Gender</b></th>
        <th></th>
      <tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($search_result)):?>
        <tr>
          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
          <td><?php echo $row['gender']; ?></td>
          <td><a class="link" 
                 href="details.php?ID=<?php echo $row['ID'];?>"
              >
              View
              </a>
              
          </td>
        </tr>
        <?php endwhile;?>
    </tbody>
  </table>
    

  <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
  
</body>
</html>
