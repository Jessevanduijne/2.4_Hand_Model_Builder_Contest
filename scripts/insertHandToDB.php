<?php
// require_once('dbconfig.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csvn_handen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$handname = $_POST['handName'];
$fbName   = $_POST["uploaderName"];
$dateNow  = date('Y-m-d H:i:s');

$sql = "INSERT INTO hands (`handname`, `naam`, `email`, `facebook`, `twitter`, `image`, `object`, `date`)
        VALUES ('$handname', '$fbName', 'jessevanduijne@live.nl', 1, 1, 'image123', 'gif123', '$dateNow')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>
