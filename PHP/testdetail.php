<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 15-6-2018
 * Time: 17:45
 */

    include_once("./models/db_hand.php");
    $db = new dbHand();

    $handId = $_GET['id'];


/*    //Check of de post een int is
    if(is_int($handId)){
        //haal de hand op dmv de handId die mee wordt gepost.
        $hand = $db->getById($handId);

        if(empty((array) $hand)){
            //Mocht er een fout zijn, zoals dat de hand niet gevonden kan worden wordt de gebruiker teruggestuurd naar de leaderbord.
            echo "<script> location.href='./leaderbord.php'; </script>";
            exit;
        }
    }
    else{
        //geen int? Terugsturen naar de leaderbord.
        echo "<script> location.href='./leaderbord.php'; </script>";
        exit;
    }
    */

    //Voor testen zonder escapes
    $hand = $db->getById($handId);


    echo $handId;

    echo $hand->getEmail();
