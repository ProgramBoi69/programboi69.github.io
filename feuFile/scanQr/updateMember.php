<!DOCTYPE html>
<html>
    <head> 
        <title>Changing Status to Inactive to Active</title>
    </head>
    <body>
        <?php
            include "../addUser/confirmation/connect.php";
            session_start();
            //place functions
            //intialize varibles
            if(!$connect)
            {
                echo "Connection Lost";
                die($connect->error);
            }
            else
            {
                $sqlStatus="SELECT status from tbmembers where studentid=".$_SESSION["memberLog"];
                $resultStatus=$connect->query($sqlStatus);
                $row=mysqli_fetch_row($resultStatus);
                if($row[0]=="Inactive")
                {
                    $sqlAction="UPDATE tbmembers SET status='Active' WHERE studentid=".$_SESSION["memberLog"];
                    $resultAction=$connect->query($sqlAction);
                    echo "You Successfully logged in <br>";
                    echo "<a href=../><button>Return to Feu File</button></a";
                }
                else
                {
                    $sqlAction="UPDATE tbmembers SET status='Inactive' WHERE studentid=".$_SESSION["memberLog"];
                    $resultAction=$connect->query($sqlAction);
                    echo "You Successfully logged out <br>";
                    echo "<a href=../><button>Return to Feu File</button></a";
                }
            }
            session_destroy();
        ?>        
    </body>
</html>