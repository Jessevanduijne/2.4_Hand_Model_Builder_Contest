<html>
<head>
    <title>Project 2.4 - 100 Hands</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/shareIntegratie/style.css">
    <link rel="stylesheet" type="text/css" href="../css/shared/_site.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" type="text/css" href="../css/wedstrijd/main.css">

    <title>Hand detailpagina- 100 Handen voor Vietnam</title>

    <?php
    require_once("./getvisitor.php");
    require_once("./db_hand.php");
    $db = new dbHand();

    $handId = $_GET['id'];

    //haal de hand op dmv de handId die mee wordt gepost.
    $hand = $db->getById($handId);
    //Check of een 'hand' wordt teruggegeven
    if(!is_a($hand, "hand")){
        //geen hand? Terugsturen naar de leaderbord.
        echo "<script> location.href='./leaderbord.php'; </script>";
        exit;
    }
    ?>

    <!--Facebook-->
    <meta property="og:url"                content="<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:title"              content="<?php echo "Check de hand ".$hand->getHandname()." van ".$hand->getNaam() ?>" />
    <meta property="og:description"        content="<?php echo $hand->getNaam() ?> heeft een hand ontworpen. Ontwerp nu zelf je eigen hand en steun 100 Handen voor Vietnam!"  />
    <meta property="og:image"              content="<?php echo 'http://552779.infhaarlem.nl/handimg/'.$hand->getImageRef() ?>" />

    <script>
    // Onderstaande JS-code staat hier omdat het direct ingeladen moet worden als de pagina opent.
    // Initialiseer Facebook Javascript-SDK:
    window.fbAsyncInit = function () {
        FB.init({
            appId: '400725930337109',
            xfbml: true,
            version: 'v2.10'
        });
        checkLoginState();
    };

    // Laad de SDK in:
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function clickShare(){
      var overrideUrl = "<?php echo $hand->getId(); ?>";
      var overrideTitle = "<?php echo "Check de hand ".$hand->getHandname()." van ".$hand->getNaam() ?>";
      var overrideDescription = "<?php echo $hand->getNaam() ?> heeft een hand ontworpen. Ontwerp nu zelf je eigen hand en steun 100 Handen voor Vietnam!"
      var overrideImage = "<?php echo 'http://552779.infhaarlem.nl/handimg/'.$hand->getImageRef() ?>";

      shareDetail(overrideUrl, overrideTitle, overrideDescription, overrideImage);
    }
    </script>
</head>

<body id="margin-nul-fix">
<!-- Hierop wordt de hand gerenderd:-->
    <section id="scene"></section>
<!--sidepanel-->
    <div id="mySidenav" class="sidenav scrollbar-primary">

        <section class="hand-informatie">
            <span class="hand-handnaam"><?php echo $hand->getHandname();?></span><br/><br/>
            <span class="hand-naam">Dit is de hand van <?php echo $hand->getNaam(); ?></span><br/><br/>
            <span class="hand-generik">Aantal keer op gestemd: <span id="score"> <?php echo $hand->getScore(); ?></span> </span>

            <a id="stemKnop" class="btn-detail btn-medium btn-green" onclick="voteHand()">Stem op deze hand!</a><br/><br/>

            <a target="_blank" id="donate-button" href="https://www.geef.nl/nl/doneer?charity=962" class="btn-green btn-detail btn-large">Doneer aan <br/> Child Surgery Vietnam</a><br/><br/>

            <span class="hand-generik">Deel deze hand:</span>
            <div class="social-share">
            </div>
        </section>

        <section class="CSVN-beschrijving hand-informatie">
            <br/><span id="CSVN-titel">CHILD SURGERY VIETNAM </span/><br/>
            De Nederlandse stichting 'Child Surgery Vietnam' helpt lichamelijk gehandicapte kinderen in Vietnam. Veel kinderen gaan onnodig gehandicapt door het leven. De achterstand in orthopedische en plastische operaties kan binnen 10 jaar worden weggewerkt. Met úw hulp lukt dat!

            Elke euro met zorg besteed In de arme streken van Vietnam krijgen veel kinderen geen kans op een menswaardig leven. Terwijl de nodige ingrepen vaak nog geen €100,- kosten. Bij Child Surgery Vietnam weet u dan ook precies waar elke euro terecht komt.
        </section>
        <input type="image" id="facebookBtn" onclick="clickShare();" class="clickIcon" src="../img/fb.png"/>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "500px";
            $('#nav-icon').hide();
        }
        openNav();

        function voteHand(){

            var handId = <?php echo $handId ?>;

            var score = document.getElementById("score").innerHTML;
            var newScore = parseInt(score) + 1;

            document.getElementById("score").innerText = newScore;
            document.getElementById("stemKnop").innerText = "Stem opgenomen!";
            document.getElementById("stemKnop").setAttribute('onclick', "");
            document.getElementById("stemKnop").setAttribute('class', "btn btn-large btn-red");

            // console.log("Recording vote...");

            var data = {
                'id': handId
            }

            $.ajax({
                type: 'post',
                url:'./addvote.php',
                data: data
                });
        }
    </script>
</body>


<footer>
    <!-- 3RD Party Libraries -->
    <script type="text/javascript" src="../scripts/lib/three.js"></script>
    <script type="text/javascript" src="../scripts/lib/OBJLoader.js"></script>
    <script type="text/javascript" src="../scripts/lib/OBJExporter.js"></script>
    <script type="text/javascript" src="../scripts/lib/dat.gui.min.js"></script>
    <script type="text/javascript" src="../scripts/lib/orbit.controls.js"></script>
    <script type="text/javascript" src="../scripts/lib/jQuery.js"></script>
    <script type="text/javascript" src="../scripts/lib/guid.generator.js"></script>
    <script type="text/javascript" src="../scripts/lib/orbit.controls.js"></script>

    <!-- Global Variables -->
    <script type="text/javascript" src="../scripts/global.js.variables.js"></script>

    <!-- ... -->
    <script type="text/javascript" src="../scripts/controllers/renderer.controller.js"></script>
    <script type="text/javascript" src="../scripts/controllers/object.controller.js"></script>
    <script type="text/javascript" src="../scripts/controllers/model.controller.js"></script>
    <script type="text/javascript" src="../scripts/controllers/camera.controller.js"></script>
    <script type="text/javascript" src="../css/shared/_site.js"></script>
    <script type="text/javascript" src="../scripts/facebook.js"></script>

    <script type="text/javascript" src="../scripts/model_viewer/main.js"></script>

    <script type="text/javascript">
        updateModel(scene, DEFAULT_MODEL_COLOR);
        HARDCODED_3DMODEL_PATH = "<?php echo '../content/user_screenshots/'.$hand->getObject() ?>";
        console.log(HARDCODED_3DMODEL_PATH);
    </script>

    <?php include_once('./checkvote.php') ?>
</footer>
</html>
