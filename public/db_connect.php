<?php
/* Database connection start */
$servername = "localhost";
$username = "n1775814_sony";
$password = "918256ccd741";
$dbname = "n1775814_ganding";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
