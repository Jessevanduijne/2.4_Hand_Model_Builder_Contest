<html>
    <?php require_once('./db_hand.php');
    require_once("./getvisitor.php");
    $db = new dbHand();

    $hands = $db->getLeaderBoard();
    ?>

    <head>

        <!--Stylesheets -->
        <link type="text/css" rel="stylesheet" href="../css/shared/materialize.css"/>
        <link type="text/css" rel="stylesheet" href="../css/shared/materialize.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

        <title>Leaderbord - 100 Handen voor Vietnam</title>

        <!-- Social Media tags voor Facebook, Twitter -->
        <meta property="og:url"           content=<?php ?> />
        <meta property="og:title"         content=<?php ?>/>
        <meta property="og:description"   content=<?php ?> />
        <meta property="og:image"         content=<?php ?> />

    </head>
    <body>
    <!-- Code voor een knop 'terug' om je eigen hand te maken'-->
    <button></button>
        <!-- Weergeven van de top 3? -->
        <section>
            <?php
                for ($x = 0; $x <= 2; $x++) {

                    //De eerste 3 handen door itereren, --pakt de top 3 handen--
                    echo "<section class='row'>";
                        echo "<section class='col s12 m3'>";
                            echo "<section class='card horizontal'>";
                                echo "<section class='card-image'>";
                                    //Hieronder moet TREEJS een hand renderen!
                                    echo "<img src='".$hands[$x]->getImageRef()."'>";
                                    echo "<span class='card-title'>".$hands[$x]->getNaam()."</span>";
                                        //nieuwMethod() vervangen met werkende stem functie.
                                    echo "<a onclick='nieuwMethod()' class='btn-floating halfway-fab waves-effect waves-light red'><i class='material-icons'>Stem!</i></a>";
                                    echo "</section>";
                                echo "<section class='card-content'>";
                                    echo "<p>".$hands[$x]->getNaam()."</p>";
                                echo "</section>";
                            echo "</section>";
                        echo "</section>";
                    echo "</section>";
                }
            ?>
        </section>
        <!-- weergeven van de 'rest' -->
        <section>

        </section>
    </body>
    <footer>

    </footer>
</html>