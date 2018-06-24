<html>
    <?php require_once('./db_hand.php');
    require_once("./getvisitor.php");
    $db = new dbHand();

    $hands = $db->getLeaderBoard();
    ?>

    <head>
      <!-- Global Site Tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
      </script>
        <meta charset="utf-8">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
        <link rel="stylesheet" href="../css/wedstrijd/main.css">
        <link rel="stylesheet" href="../css/landing-page/normalize.min.css">
        <link rel="stylesheet" href="../css/landing-page/bootstrap.min.css">
        <link rel="stylesheet" href="../css/landing-page/jquery.fancybox.css">
        <link rel="stylesheet" href="../css/landing-page/flexslider.css">
        <link rel="stylesheet" href="../css/landing-page/styles.css">
        <link rel="stylesheet" href="../css/landing-page/queries.css">
        <link rel="stylesheet" href="../css/landing-page/etline-font.css">
        <link rel="stylesheet" href="../css/landing-page/animate.min.css">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body id="top">




    <div class="overlay-effect">
        <ul class="slideshow">
            <li> <span>Slide One</span> </li>
            <li> <span>Slide Two</span> </li>
            <li> <span>Slide Three</span> </li>
            <li> <span>Slide Four</span> </li>
        </ul>
    </div>

    <section class="hero">
        <section class="navigation">
            <header>
                <div class="header-content">
                    <div>
                    </div>
                    <!--                <div><a href="https://www.childsurgery-vietnam.org/contact" class="csvcontact">Contact</a></div>-->
                </div>
            </header>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="hero-content text-center">
                        <h1>Stem op jouw Favoriete hand!</h1>
                        <p class="intro"><b>Personaliseer nu je eigen 3D hand en steun <i>Child Surgery Vietnam</i></b></p>
                        <div id="button-wrapper">
                            <a href="/Project2.4/views/model_view.php" class="btn btn-fill btn-large btn-margin-right ">personaliseer nu</a>
                            <a target="_blank" id="donate-button" href="https://www.childsurgery-vietnam.org/doneren" class="btn btn-accent btn-large">Doneer</a>
                            <a href="/Project2.4/index.php" class="btn btn-fill btn-large wedstrijd-btn" > ‌‌ ‌‌ ‌‌ ‌ ‌‌ ‌‌ ‌ ‌‌ ‌‌‌Homepagina ‌‌ ‌‌ ‌ ‌‌ ‌‌ ‌‌ ‌‌</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="down-arrow floating-arrow";">Bekijk de top 100 handen <br />
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <i class="fa fa-angle-down"></i></div>
    </section>

    <section class="white-bar">

    </section>
    <!-- Weergeven van de top 3? -->
    <br/>
    <br/>
    <section>
        <?php
        if(is_array($hands)) {
            echo "<section class='rowcards'>";
            for ($x = 0; $x <= 2; $x++) {

                //De eerste 3 handen door itereren, --pakt de top 3 handen--
                echo "<a href='./detail.php?id=" . $hands[$x]->getId() . "'/><section class='card'>";
                echo "<h2>", $x + 1, "e plaats</h2>";
                echo "<section class='card-image'>";
                //Hieronder moet TREEJS een hand renderen!
                echo "<img src='../content/user_screenshots/" . $hands[$x]->getImageRef() . "'>";

                //nieuwMethod() vervangen met werkende stem functie.

                echo "</section>";
                echo "";
                echo "<h2 class='card-title'>" . $hands[$x]->getNaam() . "</h2>";
                echo "</section></a>";

            }
            echo "</section>";
        }
        ?>
    </section>
    <!-- weergeven van de 'rest' -->
    <h2>4 t/m 100</h2>
    <?php
    if(is_array($hands)) {
        echo "<section class='rowcards'>";

        if (count($hands) < 100) {
            $size = count($hands);
        } else {
            $size = 100;
        }

        for ($x = 3; $x < $size; $x++) {

            //De eerste 3 handen door itereren, --pakt de top 3 handen--
            echo "<a href='./detail.php?id=" . $hands[$x]->getId() . "'/><section class='card-small'>";
            echo "<h2>", $x + 1, "e plaats</h2>";
            echo "<section class='card-image'>";
            echo "<h2 class='card-title'>" . $hands[$x]->getNaam() . "</h2>";
            //nieuwMethod() vervangen met werkende stem functie.

            echo "</section>";
            echo "</section></a>";

        }
        echo "</section>";
    }
    ?>
    <section>

    </section>
    </body>
    <footer>

    </footer>
</html>
