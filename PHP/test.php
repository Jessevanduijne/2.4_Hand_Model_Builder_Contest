<?php require_once ('./Models/db.php');

$db = new db();

foreach ($db->GetAllHands() as $hand){
    echo $hand->getNaam();
}