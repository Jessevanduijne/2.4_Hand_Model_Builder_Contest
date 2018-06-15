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
    include_once("./models/db_hand.php");
    $db = new dbHand();

    $handId = $_GET['id'];


/*    //Check of de post een int is
    if(is_int($handId)){
        //haal de hand op dmv de handId die mee wordt gepost.
        $hand = $db->getById($handId);

        if(empty((array) $hand)){
            //Mocht er een fout zijn, zoals dat de hand niet gevonden kan worden wordt de gebruiker teruggestuurd naar de leaderbord.
            echo "<script> location.href='./leaderbord.php'; </script>";
            exit;
        }
    }
    else{
        //geen int? Terugsturen naar de leaderbord.
        echo "<script> location.href='./leaderbord.php'; </script>";
        exit;
    }
    */

    //Voor testen zonder escapes
    $hand = $db->getById($handId);

    ?>
</head>


<body id="margin-nul-fix">
    <section id="scene">
    </section>


    <div id="mySidenav" class="sidenav scrollbar-primary">
        <section class="hand-informatie">
            <?php echo $hand->getNaam() ?>
        </section>

    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "500px";
        }

        openNav();
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