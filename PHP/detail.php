<html>
<head>
    <title>Project 2.4 - 100 Hands</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/shared/_site.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" >
    <link rel="stylesheet" type="text/css" href="../css/wedstrijd/main.css">

    <?php
    require_once("./models/getvisitor.php");
    include_once("./models/db_hand.php");
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

    //Voor testen zonder escapes
    //$hand = $db->getById($handId);

    ?>

    <!--Facebook-->
    <meta property="og:url"                content="<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:title"              content="100 Handen voor Vietnam" />
    <meta property="og:description"        content="<?php $hand->getNaam() ?> heeft een hand ontworpen. Ontwerp nu zelf je eigen hand en steun 100 Handen voor Vietnam!"  />
    <meta property="og:image"              content="<?php $hand->getImageRef() ?>" />
</head>


<body id="margin-nul-fix">

<!-- Hierop wordt de hand gerenderd:-->
    <section id="scene"></section>

<!--sidepanel-->
    <div id="mySidenav" class="sidenav scrollbar-primary">
        <section class="hand-informatie">
            <span class="hand-handnaam"><?php echo $hand->getHandname();?></span><br/>
            <span class="hand-naam">Gemaakt door: <?php echo $hand->getNaam(); ?></span><br/>
            <span class="hand-generik">Aantal keer op gestemd: <span id="score"> <?php echo $hand->getScore(); ?></span> </span><br/>
        </section><br/>

        <form>
            <a id="stemKnop" class="btn btn-large btn-green" onclick="voteHand()">Stem op deze hand!</a>
        </form>

        <section class="CSVN-beschrijving hand-informatie">
            <br/><span id="CSVN-titel">CHILD SURGERY VIETNAM </span/><br/>
            De Nederlandse stichting 'Child Surgery Vietnam' helpt lichamelijk gehandicapte kinderen in Vietnam. Veel kinderen gaan onnodig gehandicapt door het leven. De achterstand in orthopedische en plastische operaties kan binnen 10 jaar worden weggewerkt. Met úw hulp lukt dat!

            Elke euro met zorg besteed In de arme streken van Vietnam krijgen veel kinderen geen kans op een menswaardig leven. Terwijl de nodige ingrepen vaak nog geen €100,- kosten. Bij Child Surgery Vietnam weet u dan ook precies waar elke euro terecht komt.

        </section>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "500px";
        }
        openNav();

        function voteHand(){
        var handId =  <?php echo $handId ?>;

        var score = document.getElementById("score").innerHTML;
        var newScore = parseInt(score) + 1;

        document.getElementById("score").innerText = newScore;
        document.getElementById("stemKnop").innerText = "Stem opgenomen!";
        document.getElementById("stemKnop").setAttribute('onclick', "");
            document.getElementById("stemKnop").setAttribute('class', "btn btn-large btn-red");
        var data = {
            'id': handId
        }
        console.log(data.id);
        console.log(handId);
        $.ajax({
            type: 'post',
            url:'addvote.php',
            data: data
        }
        )};
        ;

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

    <script type="text/javascript" src="../scripts/model_viewer/main.js"></script>
</footer>
</html>