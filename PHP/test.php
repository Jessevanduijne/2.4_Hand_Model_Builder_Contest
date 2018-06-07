<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css"
          <title>Test - 100 Handen voor Vietnam!</title>
</head>

<body>


<?php require_once('./Models/db_hand.php');

$db = new dbHand();

$hands = $db->getLeaderBoard();

foreach($hands as $hand){
    echo $hand->getNaam();
}

?>
</body>

</html>

