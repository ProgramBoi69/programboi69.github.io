<!DOCTYPE html>
<html>
    <head>
        <title>Showing Member Data for Confirmation</title>
    </head>
    <body>
        <?php
            session_start();
            include "../addUser/confirmation/connect.php";
            //place functions here
            function loginUser($sqlRow)
            {
                echo"<center>";
                    echo"<h1>Member found<h1>";
                    echo"<table border=1>";
                    echo"<tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Status</th>
                    </tr>";
                    echo "<tr>";
                    echo "<td>".$sqlRow[0]."</td>";
                    echo "<td>".$sqlRow[1]."</td>";
                    echo "<td>".$sqlRow[2]."</td>";
                    echo "<td>".$sqlRow[3]."</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<form action='updateMember.php'> 
                    <button type='submit'>Log-In</button>
                    </form>";
                    echo"</center>";
            }
            function logoutUser($sqlRow)
            {
                echo"<center>";
                    echo"<h1>Member found<h1>";
                    echo"<table border=1>";
                    echo"<tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Status</th>
                    </tr>";
                    echo "<tr>";
                    echo "<td>".$sqlRow[0]."</td>";
                    echo "<td>".$sqlRow[1]."</td>";
                    echo "<td>".$sqlRow[2]."</td>";
                    echo "<td>".$sqlRow[3]."</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<form action='updateMember.php'> 
                        <button type='submit'>Log-Out</button>
                    </form>";
                    echo"</center>";
            }
            //initialize variables
            $_SESSION["memberLog"]=$_POST['qrValue'];
            //check for sql conection 
            if(!$connect)
            {
                echo "Connection Lost!";
                die($connect->error);
            }
            else
            {
                $sql="SELECT * FROM tbmembers where studentid=".$_SESSION["memberLog"]; 
                $result=$connect->query($sql);
                $rowCount=mysqli_num_rows($result);
                $row=mysqli_fetch_row($result);
                if($rowCount==0)
                {
                    echo "No member found<br>";
                    echo "<a href='../'><button>Return to feuFile</button></a>";
                }
                else if($row[3]=="Inactive")
                {
                    loginUser($row);
                }        
                else
                {
                    logoutUser($row);
                }
            }
        ?>  
    </body>
</html>
