<?php
  require_once "Student_Education.php";
  
  class Student_Info extends Student {
    public function student() {
        echo "<h1>Courses Offered</h1>";
        "A " . $this->grade[0] . " student.<br/>";
        echo "Her chosen course is" . $this->course[0] . " student.<br/>";
    }
  }
  class Course_Info extends Course {
    public function course() {
        echo "<h1>Courses Offered</h1>";
        echo "<table class='table table-info table-striped w-75 m-auto mt-5 mb-5'>
        <thead>
          <tr>
            <th scope='col'>Course Code</th>
            <th scope='col'>Course Description</th>
            <th scope='col'>Total Units</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>" . $this->code[0] . "</td>
            <td>" . $this->description[0] . "</td>
            <td>" . $this->unit[0] . "</td>
          </tr>
          <tr>
            <td>" . $this->code[1] . "</td>
            <td>" . $this->description[1] . "</td>
            <td>" . $this->unit[1] . "</td>
          </tr>
          <tr>
            <td>" . $this->code[2] . "</td>
            <td>" . $this->description[2] . "</td>
            <td>" . $this->unit[2] . "</td>
          </tr>
          <tr>
            <td>" . $this->code[3] . "</td>
            <td>" . $this->description[3] . "</td>
            <td>" . $this->unit[3] . "</td>
          </tr>
          <tr>
            <td>" . $this->code[4] . "</td>
            <td>" . $this->description[4] . "</td>
            <td>" . $this->unit[4] . "</td>
          </tr>
          <tr>
            <td>" . $this->code[5] . "</td>
            <td>" . $this->description[5] . "</td>
            <td>" . $this->unit[5] . "</td>
          </tr>
          <tr>
            <td>" . $this->code[6] . "</td>
            <td>" . $this->description[6] . "</td>
            <td>" . $this->unit[6] . "</td>
          </tr>
          <tr>
            <td>" . $this->code[7] . "</td>
            <td>" . $this->description[7] . "</td>
            <td>" . $this->unit[7] . "</td>
          </tr>
          <tr>
            <td colspan='5'><i>The available courses offered by the University.</i></td>
          </tr>
        </tbody>
        </table>";
    }
  }


?>

