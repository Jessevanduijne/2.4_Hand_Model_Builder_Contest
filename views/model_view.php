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
    <div class="tab">

    <button class="tablinks" onclick="openTab(event, 'Handen')" id="default">Handen</button>
    <button class="tablinks" onclick="openTab(event, 'Kleur')">Kleur</button>
    <button class="tablinks" onclick="openTab(event, 'Share')">Share</button>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  </div>


    <div id="Handen" class="tabcontent">
    <h1>Handen</h1>
    <?php
    $files = glob("../models/*.obj");
    foreach($files as $file) {
      echo "<button class='modelclick' onclick=changeModel('",$file,"')>","<img src='../models/",basename($file, ".obj"), ".png'>","</button>";
    };
    ?>
  </div>

  <div id="Kleur" class="tabcontent">
    <h1>Kleur</h1>
  </div>

  <div id="Share" class="tabcontent">
    <h1>Share</h1>
  </div>
    </div>
    <script>

    function openTab(evt, tab) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tab).style.display = "block";
        evt.currentTarget.className += " active";
      }

      document.getElementById("default").click();

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
