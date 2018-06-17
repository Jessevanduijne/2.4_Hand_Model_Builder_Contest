<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 17-6-2018
 * Time: 14:22
 */

require_once('admincheck.php');

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-grid.css">
</head>
<body>
<br/>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">100 Handen voor Vietnam - administratie.</h3>
    </div>

    <div class="jumbotron">
        <h1>Welkom, administrator!</h1>
        <p class="lead">Via de amdministratiepagina kunt u verschillende aspecten beheren. </p>
        <p>
            <a class="btn btn-lg btn-success" href="./beheerhanden.php" role="button">Beheer alle gemaakte handen.</a>
            <a class="btn btn-lg btn-success" href="./wijzigwachtwoord.php" role="button">Wijzig de administrator wachtwoord.</a>
            <a class="btn btn-lg btn-success" href="./wijzigdatabase.php" role="button">Wijzig van database.</a>
        </p>
    </div>

    <footer class="footer">
        <p>© Child Surgery Vietnam.</p>
    </footer>

</div>
</body>

<footer>

</footer>

</html>
