<html>
    <?php require_once('./db_hand.php');
    require_once("./getvisitor.php");
    $db = new dbHand();

    $hands = $db->getLeaderBoard();
    ?>

    <head>

        <!--Stylesheets -->
        <link type="text/css" rel="stylesheet" href="../css/wedstrijd/main.css"/>
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
        <link rel="stylesheet" href="../css/landing-page/normalize.min.css">
        <link rel="stylesheet" href="../css/landing-page/bootstrap.min.css">
        <link rel="stylesheet" href="../css/landing-page/jquery.fancybox.css">
        <link rel="stylesheet" href="../css/landing-page/flexslider.css">
        <link rel="stylesheet" href="../css/landing-page/styles.css">
        <link rel="stylesheet" href="../css/landing-page/queries.css">
        <link rel="stylesheet" href="../css/landing-page/etline-font.css">
        <link rel="stylesheet" href="../css/landing-page/animate.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

        <title>Leaderbord - 100 Handen voor Vietnam</title>

        <!-- Social Media tags voor Facebook, Twitter -->
        <meta property="og:url"           content=<?php ?> />
        <meta property="og:title"         content=<?php ?>/>
        <meta property="og:description"   content=<?php ?> />
        <meta property="og:image"         content=<?php ?> />

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="hero-content text-center">
                        <h1>Stem op jouw favoriete hand!</h1>
                        <p class="intro"><b>De top 100 van de 100 handen</b></p>
                        <div id="button-wrapper">
                            <a href="/Project2.4" class="btn btn-fill btn-large wedstrijd-btn">Homepage</a>
                            <a target="_blank" id="donate-button" href="https://www.childsurgery-vietnam.org/doneren" class="btn btn-accent btn-large">Doneer</a>
                            <a href="/Project2.4/views/model_view.php" class="btn btn-fill btn-large btn-margin-right ">personaliseer nu</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- Code voor een knop 'terug' om je eigen hand te maken'-->
    <button></button>
        <!-- Weergeven van de top 3? -->
        <h2>top 3</h2>
        <section>
            <?php
            echo "<section class='rowcards'>";
                for ($x = 0; $x <= 2; $x++) {

                    //De eerste 3 handen door itereren, --pakt de top 3 handen--
                            echo "<section class='card'>";
                            echo "<h2>", $x+1, "e</h2>";
                                echo "<section class='card-image'>";
                                    //Hieronder moet TREEJS een hand renderen!
                                    echo "<img src='".$hands[$x]->getImageRef()."'>";
                                    echo "<h2 class='card-title'>".$hands[$x]->getNaam()."</h2>";
                                        //nieuwMethod() vervangen met werkende stem functie.
                                    echo "<button onclick='nieuwMethod()' class='btn-vote'><i class='material-icons'>Stem!</i></button>";
                                    echo "</section>";

                            echo "</section>";

                }
            echo "</section>";
            ?>
        </section>
        <!-- weergeven van de 'rest' -->
        <h2>4 t/m 100</h2>
        <?php
        echo "<section class='rowcards'>";

        if(count($hands)<100) {
            $size = count($hands);
        }
        else {
            $size = 100;
        }

        for ($x = 3; $x < $size; $x++) {

            //De eerste 3 handen door itereren, --pakt de top 3 handen--
            echo "<section class='card-small'>";
                echo "<h3>", $x + 1, "e</h3>";
                 echo "<section class='card-image'>";
                        echo "<h2 class='card-title'>" . $hands[$x]->getNaam() . "</h2>";
                    //nieuwMethod() vervangen met werkende stem functie.
                        echo "<button onclick='nieuwMethod()' class='btn-vote'><i class='material-icons'>Stem!</i></button>";
                        echo "</section>";
            echo "</section>";

        }
        echo "</section>";
        ?>
        <section>

        </section>
    </body>
    <footer>

    </footer>
</html>