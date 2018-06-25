<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 17-6-2018
 * Time: 14:22
 */

require_once('admincheck.php');

$str = file_get_contents("./config.json", true); //Krijg gegevens van config.json file
$json = json_decode($str, true); // zet JSON om in een PHP-array

?>

<html>
<head>
  <!-- Global Site Tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'GA_TRACKING_ID');
  </script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-grid.css">

    <script type="text/javascript" src="../scripts/lib/jQuery.js"></script>

    <title>Administratiepagina - 100 Handen voor Vietnam</title>
</head>
<body>
<br/>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">100 Handen voor Vietnam - <?php echo $json['Login']['username'] ?>.</h3>
    </div>

    <div class="jumbotron">
        <h1>Welkom, Jo!</h1>
        <p class="lead">Via de amdministratiepagina kunt u verschillende aspecten beheren. </p>
        <p>
            <a class="btn btn-lg btn-success" href="./beheerhanden.php" role="button">Beheer alle gemaakte handen.</a>
        </p>
        <p>
            <a class="btn btn-medium btn-warning" href="adminlogout.php">uitloggen</a>
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
