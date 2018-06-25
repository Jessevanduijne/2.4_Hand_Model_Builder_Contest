<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 17-6-2018
 * Time: 18:42
 */

require_once('admincheck.php');


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
            <a href="admindashboard.php" role="button">← Ga terug naar de administratiehome.</a>
        </p>

        <p>
        <h2>Wijzig wachtwoord:</h2>
            <form>
                Nieuw: <br/>
                <input type="text">
                <br/><br/>
                <a role="button" value="Opslaan" class="btn-warning btn-sm" onclick="wijzigGebruikersnaam()">Opslaan</a>
            </form>
        </p>
    </div>

    <footer class="blockquote-footer">
        <p>© Child Surgery Vietnam.</p>
    </footer>
</div>

</body>

</html>