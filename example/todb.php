<?php
$username = "";
$password = "";
$dbname = "";

// Parsing connnection string
foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_") !== 0) {
        continue;
    }
    
    $servername = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected";
}


$mousex = $_POST["mousex"];
$mousey = $_POST["mousey"];
$mousez = $_POST["mousez"];
$time = $_POST["time"];

//$conn->close();
$sql = "INSERT INTO 
mouse_position (`mousex`, `mousey`, `mousez`, `time`) 
VALUES ('".$mousex."', '".$mousey."', '".$mousez."', '".$time."')";

$result = mysqli_query($conn, $sql);
if ( false===$result ) {
    printf("error: %s\n", mysqli_error($conn));
  }


// Run the create table query
// if (mysqli_query($conn, '
// CREATE TABLE Products (
// `Id` INT NOT NULL AUTO_INCREMENT ,
// `ProductName` VARCHAR(200) NOT NULL ,
// `Color` VARCHAR(50) NOT NULL ,
// `Price` DOUBLE NOT NULL ,
// PRIMARY KEY (`Id`)
// );
// ')) {
// printf("Table created\n");
// }
?>