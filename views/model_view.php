<?php session_start();?>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato"/>

<!DOCTYPE html>

<html>
<head>
    <title>Project 2.4 - 100 Hands</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/shared/_site.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />

</head>

<body>
    <div id="scene"></div>
    <div id="gui-container"></div>

    <span onclick="openNav()" id="nav-icon" class="glyphicon glyphicon-align-justify"></span>

    <div id="mySidenav" class="sidenav scrollbar-primary">
        <div class="tab col-lg-12" id="tab-bar">

            <button class="tablinks col-lg-3" onclick="openTab(event, 'Handen')" id="default">Handen</button>
            <button class="tablinks col-lg-3" onclick="openTab(event, 'Kleur')">Kleur</button>
            <button class="tablinks col-lg-3" onclick="openTab(event, 'Share')">Share</button>
            <a href="javascript:void(0)" class="closebtn " onclick="closeNav()">&times;</a>
        </div>


        <div id="Handen" class="tabcontent">
            <?php
            $files = glob("../models/*.obj");
            foreach ($files as $file) {
                echo "<button class='modelclick' onclick=changeModel('", $file, "')>", "<img src='../models/", basename($file, ".obj"), ".png'>", "</button>";
            };
            ?>
        </div>

        <div id="Kleur" class="tabcontent">
          <h2>Kleur</h2>

        <form>
            Achtergrondkleur : <input type="color" id="changedColor" name="BGcolor" onchange="changeBGColor()">
            Tekenkleur : <input type="color" name="draw_color" onchange="startDrawing()">
            <button type="button" onclick="stopDrawing()">Stop</button>
          </form>
          <h2>Tekst</h2>
          <form>
            <input type="text">
            <input type="submit">
            <input type="reset">
          </form>

          <h2>Afbeelding</h2>
          <form>
            <input type="file" accept="image/*" id="UserImage" accept="image/*" onchange="">
            <button type="reset" value="Reset">Reset</button>
          </form>
        </div>

        <div id="Share" class="tabcontent">
            <!-- (Hidden) File upload to save the image to the server
            - Action: The page that is targeted when submitting the form
            - Method: What kind of action is the form going to perform
            - Enctype: Specifies how the form-data should be encoded when submitting it to the server
            -->
            <form action="/Project2.4/scripts/file-handling/upload.php" method="POST" enctype="multipart/form-data" id="image-form">
                <div class="form-group">
                    <div class="text-muted">Temporary: To provide a way of saving customised model images.<br /> Does not yet support saving models!</div><br />

                    <label for="image_name">Save the file to the server:</label> </br>
                    <input class="form-control" name="image_name" placeholder="Enter image name..." required minlength="3">

                    <input type="hidden"    name="render_snapshot"  id="hidden_image"       value=""/>
<!--                    <input type="text"      name="render_model"     id="hidden_model_input" value="" class="hidden"/>-->
                    <textarea               name="render_model"     id="hidden_model_input" value="" class="hidden"></textarea>

                    <button class="btn btn-outline-default mg-3" type="submit" name="submit" onclick="save_screenshot()" id="submit-button">Save</button>
                </div>
            </form>
        </div>
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
      updateModel(scene, DEFAULT_MODEL_COLOR);
    }

    /* kayleigh */
    function changeBGColor(){
      modelColor = document.getElementById("changedColor").value;
      console.log();
      updateModel(scene, modelColor);
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "500px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
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

    <script type="text/javascript" src="../scripts/model_viewer/main.js"></script>
</footer>
</html>
