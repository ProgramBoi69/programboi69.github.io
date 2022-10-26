<!DOCTYPE html>
<html>
    <head>
        <title>Verifying user input</title>
    </head>
    <body>
        <?php
          session_start();
          $_SESSION["studId"]=$_POST["student_id"];
          $_SESSION["fname"]=$_POST["firstname"];
          $_SESSION["lname"]=$_POST["lastname"];
          echo "Member Information<br>";
          echo "Student ID: ".$_SESSION["studId"]."<br>"."First Name: ".$_SESSION["fname"]."<br>"."Last Name: ".$_SESSION["lname"]."<br>";
          echo "Are You Sure About Your Input: "."<form action='index.php' method='post'><button type='submit'>Yes</button><button type=submit='submit' formaction='../index.html'>No<buttom></form>";
        ?>
    </body>
</html>