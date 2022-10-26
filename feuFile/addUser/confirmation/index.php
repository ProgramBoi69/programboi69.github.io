<!DOCTYPE html>
<html>
    <head>
        <title>Input data into database</title>
    </head>
    <body>
        <?php
            session_start();
            //import packages and api here
            include "connect.php";
            include "phpqrcode/qrlib.php";
            //initiate variables here
            $sidKey="studId";
            $fnameKey="fname";
            $lnameKey="lname";
            $status="Inactive";
            $qrDir="qrcodes/";
            $outputFile= $qrDir.$_SESSION[$sidKey].".png";
            //enter code blocks here
            QRCode::png($_SESSION[$sidKey],$outputFile,'H',10);//generating qr png
            echo "<center><h1>Here is Your Generated QR Code<h1><br><img src=$outputFile></center>";//displaying qr png
            //check if there is connection with sql
            if(!$connect)
            {
                echo "Connection Lost!";
                die($connect->error);
            }
            else
            {
                $sql= "INSERT INTO tbmembers VALUES"."("
                ."'".$_SESSION[$sidKey]."'".","
                ."'".$_SESSION[$fnameKey]."'".","
                ."'".$_SESSION[$lnameKey]."'".","
                ."'".$status."'".","
                ."'".$outputFile."'"
                .")";
                $result=$connect->query($sql);
                echo "<center>New member added!</center> <br>";
            }
            session_destroy();
        ?>
        <a href="../../"><button>Return to feuFile</button></a>
    </body>
</html>