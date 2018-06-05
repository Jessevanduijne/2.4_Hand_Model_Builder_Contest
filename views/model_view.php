<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />

<!DOCTYPE html>
<html>
<head>
    <title>Project 2.4 - 100 Hands</title>

    <!-- Stylesheets -->
    <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap/bootstrap.css">
    <link rel = "stylesheet" type = "text/css" href = "../css/shared/_site.css">
</head>

<body>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h1>Models</h1>
    <?php
    $files = glob("../models/*.obj");
    foreach($files as $file) {
      echo "<button class='modelclick' onclick=changeModel('",$file,"')>","<img src='../models/",basename($file, ".obj"), ".png'>","</button>";
    };
    ?>
    </div>
    <script>
    /* Set the width of the side navigation to 250px */
    function changeModel(model){
      HARDCODED_3DMODEL_PATH = model;
      console.log(HARDCODED_3DMODEL_PATH);
      updateModel(scene);
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "500px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    <span onclick="openNav()">open</span>
    <div id="scene"></div>
    <div id="gui-container"></div>
</body>

<footer>
    <!-- 3RD Party Libraries -->
    <script type="text/javascript" src="../scripts/lib/three.js"></script>
    <script type="text/javascript" src="../scripts/lib/OBJLoader.js"></script>
    <script type="text/javascript" src="../scripts/lib/dat.gui.min.js"></script>
    <script type="text/javascript" src="../scripts/lib/orbit.controls.js"></script>

    <script type="text/javascript" src="../scripts/lib/orbit.controls.js"></script>

    <!-- Global Variables -->
    <script type="text/javascript" src="../scripts/global.js.variables.js"></script>

    <!-- ... -->
    <script type="text/javascript" src="../scripts/controllers/renderer.controller.js"></script>
    <script type="text/javascript" src="../scripts/controllers/object.controller.js"></script>
    <script type="text/javascript" src="../scripts/controllers/model.controller.js"></script>
    <script type="text/javascript" src="../scripts/controllers/camera.controller.js"></script>

    <script type="text/javascript" src="../scripts/model_viewer/main.js"></script>
</footer>
</html>

<?php
?>
