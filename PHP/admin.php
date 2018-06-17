<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 17-6-2018
 * Time: 12:31
 */

session_start();
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/shared/_site.css">
    <script type="text/javascript" src="../scripts/lib/jQuery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" type="text/css" href="../css/shareIntegratie/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin/admin.css">
    <title>CSVN - Administratiepagina voor 100 Handen voor Vietnam</title>
</head>
<body>
    <section class="loginsection">
        <h1>Login</h1><br/><br/>
        <form id="loginform">
            <input id="username" type="text" name="username" placeholder="username">
            <input id="password" type="password" name="password"  placeholder="password">

            <button class="btn-primary" onclick="logIn()">log in</button>
        </form>
    </section>
</body>

<script>
    function logIn(){
        $("#loginform").submit(function (event) {

            //stop de form van normaal submitten
            event.preventDefault();

            var post = $.post('./adminlogin.php',
                {
                    'username': $("#username").val(),
                    'password': $("#password").val()
                }
            );

            post.done(function( data ) {
                window.location.href = "./admindashboard.php";
            });

        });
    }
</script>
<footer>
</footer>
</html>
