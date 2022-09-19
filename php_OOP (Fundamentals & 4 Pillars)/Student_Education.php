<?php
  class Student {
    public function __construct($fname, $lname, $age, $grade, $course) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
        $this->grade = $grade;
        $this->course = $course;
    }
    public function intro() {
        echo "<h1>Student Information</h1>";
        /* echo "This is " . $this->fname[0] . ".<br/>" . "She's " . $this->age[0] . " years old. <br/><br/>";
        echo "<td>" . $this->fname[0] . "</td>"; */
        

        echo "<table class='table table-info table-striped w-75 m-auto mt-5 mb-5'>
        <thead>
          <tr>
            <th scope='col'>First Name</th>
            <th scope='col'>Last Name</th>
            <th scope='col'>Age</th>
            <th scope='col'>Year Level</th>
            <th scope='col'>Course</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>" . $this->fname[0] . "</td>
            <td>" . $this->lname[0] . "</td>
            <td>" . $this->age[0] . "</td>
            <td>" . $this->grade[0] . "</td>
            <td>" . $this->course[0] . "</td>
          </tr>
          <tr>
            <td>" . $this->fname[1] . "</td>
            <td>" . $this->lname[1] . "</td>
            <td>" . $this->age[1] . "</td>
            <td>" . $this->grade[1] . "</td>
            <td>" . $this->course[1] . "</td>
          </tr>
          <tr>
            <td>" . $this->fname[2] . "</td>
            <td>" . $this->lname[2] . "</td>
            <td>" . $this->age[2] . "</td>
            <td>" . $this->grade[2] . "</td>
            <td>" . $this->course[2] . "</td>
          </tr>
          <tr>
            <td>" . $this->fname[3] . "</td>
            <td>" . $this->lname[3] . "</td>
            <td>" . $this->age[3] . "</td>
            <td>" . $this->grade[3] . "</td>
            <td>" . $this->course[3] . "</td>
          </tr>
          <tr>
            <td>" . $this->fname[4] . "</td>
            <td>" . $this->lname[4] . "</td>
            <td>" . $this->age[4] . "</td>
            <td>" . $this->grade[4] . "</td>
            <td>" . $this->course[4] . "</td>
          </tr>
          <tr>
            <td colspan='5'><i>These are the students and their information that are currently enrolled in the university.</i></td>
          </tr>
        </tbody>
      </table>";
    }
  };

    class Course {
      public function __construct($code, $description, $unit) {
        $this->code = $code;
        $this->description = $description;
        $this->unit = $unit;
    }
    
  };


?>