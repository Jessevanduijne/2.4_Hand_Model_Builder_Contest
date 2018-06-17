<?php session_start();

$str = file_get_contents("../PHP/config.json", true); //Krijg gegevens van config.json file
$json = json_decode($str, true); // zet JSON om in een PHP-array

// Create connection
$conn = new mysqli($json['Database']['hostname'], $json['Database']['username'], $json['Database']['password'], $json['Database']['table']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$handname = $_POST['handName'];
$fbName   = $_POST["uploaderName"];
$dateNow  = date('Y-m-d H:i:s');
$image = $_SESSION['imagename'];
$modelName = $_POST['modelPath'];
$email = $_POST['email'];

$sql = "INSERT INTO hands (`handname`, `naam`, `email`, `facebook`, `twitter`, `image`, `object`, `date`)
        VALUES ('$handname', '$fbName', '$email', 1, 1, '$image', '$modelName', '$dateNow')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>
