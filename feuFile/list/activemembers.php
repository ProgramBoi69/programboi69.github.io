<!DOCTYPE html>
<html>
    <head>
        <title>All Active Members</title>
    </head>
    <body>
        <?php
            include "../addUser/confirmation/connect.php";
            if(!$connect)
            {
                echo "Connection Lost!";
                die($connect->error);
            }
            else
            {
                $sql="SELECT studentid,firstname,lastname FROM tbmembers where status='Active'";
                $result=$connect->query($sql);
                $rowCount=mysqli_num_rows($result);
                if($rowCount==0)
                {
                    echo "No Active Members Found<br>";
                    echo "<a href='../'><button>Return to feuFile</button></a>";
                }
                else
                {
                    echo"<center>";
                    echo"<h1>All Active Members</h1>";
                    echo"<table border=1>";
                    echo"<tr>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Status</th>
                    </tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["studentid"]."</td>";
                        echo "<td>".$row["firstname"]."</td>";
                        echo "<td>".$row["lastname"]."</td>";
                        echo "<td>".$row["status"]."</td>";
                        echo "</tr>";
                    }
                    echo "</table><br><br>";
                    echo "<a href='../'><button>Return to feuFile</button></a>";
                    echo"</center>";
                }
            }
        ?>
    </body>
</html>