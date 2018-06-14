<?php session_start();?>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato"/>

<!DOCTYPE html>

<html>
<head>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/shared/_site.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" type="text/css" href="../css/shareIntegratie/style.css">


    <title>Bouw je eigen hand voor CSVN</title>

    <!-- Scripts -->
    <script type="text/javascript" src="../scripts/facebook.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Facebook meta data: -->
    <meta property="fb:app_id"             content="400725930337109"/>
    <meta property="og:url"                content="https://localhost/Project2.4/views/share.php" />
    <meta property="og:type"               content="article" />
    <meta property="og:image"              content="">

    <script>
      // Initialiseer Facebook Javascript-SDK, wordt geladen zodra SDK is ingeladen.
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '400725930337109',
          xfbml      : true,
          version    : 'v2.10'
        });

        checkLoginState();
      };

      // Laad de SDK in:
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

      // Normaalgesproken laad een form een andere pagina (action) in. Om te zorgen dat
      // .. de pagina niet herladen óf een pagina inlaadt, deze methode:
      $(function(){
        $(wedstrijdButton).click(function(){
          FB.api('/me', function(response) {
          var hName = $("#handName").val();
          var fbName = response.name;

          $.post("../scripts/insertHandToDB.php", {handName:hName, uploaderName:fbName}, function(result){ // parameters: url, query, callback
            var wedstrijdSection = document.getElementById('wedstrijdSection');
            wedstrijdSection.style.display = "none";

            // Bericht van goedkeuring deelname:
            document.getElementById('handSubmitted').innerHTML =  "Uw hand, " + hName + ", is succesvol toegevoegd aan de wedstrijd, " + fbName + "!";
          });
        });
        });
      });

      $(function(){
        $(submitImage).click(function(){
          var imageName = $("#imageName").val();
          var imageFile = $("#hidden_image").val();

          $.post("../scripts/file-handling/upload.php", {imageName1:imageName, imageFile1:imageFile}, function(result){ // parameters: url, query, callback
            alert("Je image " + imageName + " is succesvol ge-upload! \nImage-file: ");
          });
        });
      });
    </script>
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

            <!-- Jesse: -->
            <br><br>
            <section id="nogNietIngelogd">
              <h2> Laat jouw ontwerp zien aan de wereld! </h2>
              <h3> Log in op Facebook of Twitter om deel te nemen aan de '100 handen'-wedstrijd.</h3>
            </section>

            <!-- Facebook button is inbegrepen in SDK, Twitter button is custom -->
            <fb:login-button size="xlarge" autologoutlink="true" scope="public_profile,email" onlogin="checkLoginState();"> Verbind met Facebook </fb:login-button><br>
            <button id="twitterLoginButton">Verbind met Twitter</button><br>

            <!-- Hier volgt een bericht nadat de hand ge-submit is -->
            <h3 id="handSubmitted"></h3>

            <!-- Handnaam invoer & knop om handnaam & persoon-naam naar database te sturen -->
            <section id="handDetails">
                <form id="wedstrijdSection"><br>
                  <h2> Geef je hand een naam: </h2>
                  <input type="text" name="handName" id="handName"
                           placeholder="Voer hier een naam in"
                           value="<?php if (isset($_POST['handName'])) echo $_POST['handName']; ?>">

                  <h2> Doe mee aan de wedstrijd: </h2>
                  <button type="submit" id="wedstrijdButton" onclick="vulNaamIn(); return false;">
                    <!-- handNaam mag niet leeg zijn, return false zorgt ervoor dat de pagina niet herladen wordt -->
                    Ik wil meedoen
                  </button>
                </form><br>

              <h2> Share je hand: </h2>
                <input type="image" id="facebookBtn" onclick="submitAndShare();" class="clickIcon" src="../img/fb.png"/>
                <input type="image" id="tweetBtn" class="clickIcon" src="../img/twitter.png"/>
            </section>

            <section id="top100section">
              <h3> Bekijk ontwerpen van andere deelnemers: </h3>
              <button id="top100button"> Top 100 </button><br>
              <img id="csvn" src="../img/csvn.png">

              <input hidden type="text" value=""/>
            </section>

            <!-- // Jesse -->


            <!-- (Hidden) File upload to save the image to the server
            - Action: The page that is targeted when submitting the form
            - Method: What kind of action is the form going to perform
            - Enctype: Specifies how the form-data should be encoded when submitting it to the server
            -->
            <form action="/Project2.4/scripts/file-handling/upload.php" method="POST" enctype="multipart/form-data" id="image-form">
                <div class="form-group">
                    <div class="text-muted">Temporary: To provide a way of saving customised model images.<br /> Does not yet support saving models!</div><br />
                <label for="image_name">Save the file to the server:</label> </br>
                <input class="form-control" id="imageName" name="image_name" placeholder="Enter image name..." required minlength="3">
                <input type="hidden" name="render_snapshot" id="hidden_image" value=""/>
                <button class="btn btn-outline-default mg-3" type="submit" id="submitImage" onclick="save(); return false;">Save</button>
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
