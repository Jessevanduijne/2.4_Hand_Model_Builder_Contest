<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 17-6-2018
 * Time: 18:42
 */

require_once('admincheck.php');
require_once('db_hand.php');
$db = new dbHand();

ob_start();
$hands = $db->getAllHands();
ob_end_clean();

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-grid.css">

    <script type="text/javascript" src="../scripts/lib/jQuery.js"></script>

    <title>Handbeheer - 100 Handen voor Vietnam</title>
</head>
<body>
<br/>

<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">100 Handen voor Vietnam - beheer handen.</h3>
    </div>

    <div class="jumbotron">
        <p>
            <a class="btn btn-lg btn-success" href="admindashboard.php" role="button">Ga terug naar de administratiehome.</a>
        </p>

        <p>
            <table class="table table-hover table-striped">
            <tr>
                <th>id</th>
                <th>Gemaakt door</th>
                <th>Naam</th>
                <th>Score</th>
                <th>Gedeeld op Facebook</th>
                <th>In detail</th>
                <th>Verwijder</th>
            </tr>
            <?php

                foreach ($hands as $hand){
                    echo "<tr>";
                        echo "<td>".$hand->getId()."</td>";
                        echo "<td>".$hand->getNaam()."</td>";
                        echo "<td>".$hand->getHandname()."</td>";
                        echo "<td>".$hand->getScore()."</td>";
                        echo "<td>".$hand->getFacebook()."</td>";
                        echo "<td><a onclick='detail(".$hand->getId().")'><span style='color:blue'>👉 </span></a></td>";
                        echo "<td><a onclick='verwijder(".$hand->getId().")'><span style='color:red'>⨉</span></a></td>";
                    echo "<tr>";
                }
            ?>
            </table>
        </p>
    </div>

    <script type="text/javascript">
        function detail(id){
            var win = window.open('./detail.php?id=' + id, '_blank');
            win.focus();
        }

        function verwijder(id) {
            var result = confirm("Weet u zeker dat u de hand met het id " + id + " wilt verwijderen?");

            if (result) {
                $.ajax({
                    url: 'deletehand.php',
                    type: 'POST',
                    data: {
                        id: id
                    }
                });
            }
        }
    </script>

    <footer class="footer">
        <p>© Child Surgery Vietnam.</p>
    </footer>

</div>
</body>

<footer>

</footer>

</html>