<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanilla Calculator</title>
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
    th, td {
        text-align: center;
    }

</style>
</head>
<body>
    <?php
      require("classes/Calculator.php");
  
      $number1 = 6;
      $operator = "*";
      $i = 1;
      

      echo
      '<h1 class="mt-5 mb-5" style="text-align: center;">Table of Operation</h1>
      <p style="text-align: center;"> This is a table that calculates two numbers with a number that increments from 1 - 10</p> 
      <p style="text-align: center;">Try changing the $number1 value to any number and the $operator value to +, -, *, /, %, or **.</p>
      <table class="table w-25 m-auto mt-5 mb-5 bg-primary table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">First Number</th>
          <th scope="col">Operator</th>
          <th scope="col">Second Number</th>
          <th scope="col">Result</th>
        </tr>
      </thead>
      <tbody>';
        

      while($i < 11) {
        $calculator = new Calculator();
        
        echo '<tr>
          <td scope="row">' . $number1 . '</td>
          <td>' . $operator . '</td>
          <td>' . $number2 = $i; 
          $calculator->setNumbers($number1, $number2);
          $calculator->setOperator($operator);
          $calculator->calculate();
          echo '</td>
          <td>' . $calculator->getOutput() . '</td>
        </tr>';
        ++$i;
      };
        
        echo '</tbody>
      </table>';


    ?>
    
</body>
</html>