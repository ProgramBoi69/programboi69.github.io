<!DOCTYPE html>
<html>
    <head>
        <title>All members Data</title>
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
                $sql="SELECT * FROM tbmembers";
                $result=$connect->query($sql);
                $rowCount=mysqli_num_rows($result);
                if($rowCount==0)
                {
                    echo "table member is empty!<br>";
                    echo "<a href='../'><button>Return to feuFile</button></a>";
                }
                else
                {
                    echo"<center>";
                    echo"<h1>Officical Member List</h1>";
                    echo"<table border=1>";
                    echo"<tr>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Status</th>
                    <th>QrCode</th>
                    </tr>";
                    while($row = $result->fetch_assoc()) {
                        $imgHolder="../addUser/confirmation/".$row["qrcode"];
                        echo "<tr>";
                        echo "<td>".$row["studentid"]."</td>";
                        echo "<td>".$row["firstname"]."</td>";
                        echo "<td>".$row["lastname"]."</td>";
                        echo "<td>".$row["status"]."</td>";
                        echo "<td>"."<img src=$imgHolder width='250' height='250'>"."</td>";
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