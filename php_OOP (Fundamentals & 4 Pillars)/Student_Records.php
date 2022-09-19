<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Data</title>
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
      }
      thead, td {
        text-align: center;
      }
      
    </style>
    <?php
          require_once "Student_Basic.php";  //path/file
          $student = new Student_Info(
            array("Hailee", "Camila", "Henry", "Hikari", "Loki"),
            array("Steinfeld", "Cabello", "Sy", "Takahashi", "Aesir"), 
            array("25", "21", "23", "20", "24"), 
            array("3<sup>rd</sup> year", "1<sup>st</sup> year", "2<sup>nd</sup> year", "3<sup>rd</sup> year", "4<sup>th</sup> year"), 
            array("BSECE", "BSChE", "BSEE", "BSAeroE", "BSCpE"));
          $course = new Course_Info(
            array("ECEN 60", "CHE 75", "EENG 65", "AERO 100", "CPEN 120", "IT 90", "COS 115", "ME 123"),
            array("Electronics and Communications Engineering", "Chemical Engineering", "Electrical Engineering", "Aeronautical Engineering", "Computer Engineering", "Information Technology", "Computer Science", "Mechanical Engineering"), 
            array("143", "150", "171", "120", "101", "125", "129", "130"));
          
          $student->intro();
          $course->course();

    ?>
</head>
<body>
    

    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
</body>
</html>