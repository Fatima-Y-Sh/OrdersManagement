<?php
function openCon() {
   /* $dbhost = "sql200.epizy.com";
    $dbuser ="epiz_31316809";
    $dbpassword="QmSNCc2B2oCdpr";
    $db="epiz_31316809_shalhoubpress";*/
    $dbhost = "localhost";
    $dbuser ="root";
    $dbpassword="";
    $db="shalhoubpress";


    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $db) or die("Connection failed: %s\n" . $conn -> error);
 
    $conn->set_charset("utf8");
    return $conn;
}

function closeCon($conn) {
    $conn -> close();
}
?>
