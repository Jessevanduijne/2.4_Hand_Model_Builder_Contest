<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Bouw je eigen hand voor CSVN</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/shared/_site.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato"/>
    <link rel="stylesheet" type="text/css" href="../css/shareIntegratie/style.css">

    <!-- Scripts [Laat JQuery hier staan! Rest in footer]-->
    <script type="text/javascript" src="../scripts/lib/jQuery.js"></script>

    <!-- Facebook meta data: -->
    <meta property="fb:app_id" content="400725930337109"/>
    <meta property="og:url" content="https://localhost/Project2.4/views/share.php"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="">

    <script>
        var imagenaam = null;

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

        // Normaalgesproken laadt een form een andere pagina (action) in. Om te zorgen dat
        // .. de pagina niet herladen óf een pagina inlaadt, deze methode:
        $(function () {
            //Zodra je op de 'meedoen met wedstrijd' klikt: data opslaan naar database & image opslaan op server
            $(wedstrijdButton).click(function () {
                FB.api('/me', {locale: 'en_US', fields: 'name, email'}, function (response) {
                    var hName = $('#handName').val();
                    var fbName = response.name;
                    var fbEmail = response.email;

                    //Teije: Image opslaan op server
                    var imageFile = $("#hidden_image").val();
                    var modelObject = $("#hidden_model_input").val();

                    $.post("../scripts/file-handling/upload.php", {
                        imagename: hName,
                        imagefile: imageFile,
                        render_model: modelObject
                    }, function (result) {
                        alert("Je image " + hName + " is succesvol ge-upload!");

                        console.log(result);

                        var result = JSON.parse(result);

                        var modelPath = result.modelName;
                        var email = response.email;
                        var fullImage = result.fullImageName;
                        ftpimage = fullImage;

                        console.log(fullImage);

                        console.log(modelPath);

                        if (result.status) {
                            // $.post laadt data van de server met een post request (AJAX)
                            $.post("../scripts/insertHandToDB.php", {
                                handName: hName,
                                uploaderName: fbName,
                                modelPath: modelPath,
                                email: email
                            }, function (result) { // parameters: url, data, function
                                // Verberg het 'voer handnaam in'-gedeelte.
                                var wedstrijdSection = $('#wedstrijdSection').hide();
                                var shareSection = $('#shareSection').show();

                                // Bericht van goedkeuring deelname:
                                var goedkeuringDeelname = $('#handSubmitted').html("Uw hand, " + hName + ", is succesvol toegevoegd aan de wedstrijd, " + fbName + "!");
                            });
                        }

                        $.post("../scripts/ftp.php", {
                          imagefile: fullImage
                        }, function(result) {
                          console.log(result);
                        });
                    });
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
        Handkleur : <input type="color" id="changedColor" name="BGcolor" onchange="changeBGColor()"> </br>
        Standaard kleur : <input type="color" id="standardcolor" name="standardColor" onchange="changeStandardColor()">
      </form>
      <h2>Tekst</h2>
      <form>
        <button type="button" class="imagebutton" onclick="changeText(0)"><img src='../img/text1.png'></button>
        <button type="button" class="imagebutton" onclick="changeText(1)"><img src='../img/text2.png'> </button>
        <button type="button" class="imagebutton" onclick="changeText(2)"><img src='../img/text3.png'> </button></br>
        <button type="button" class="imagebutton" onclick="changeText(3)"><img src='../img/text4.png'> </button>
        <button type="button" class="imagebutton" onclick="changeText(4)"><img src='../img/text5.png'> </button>
        <button type="button" class="imagebutton" onclick="changeText(5)"><img src='../img/text6.png'> </button>

          <br/>
          <br/>

        <button type="button" onclick="deleteText()"> Verwijder tekst </button>
      </form>
      <h2>Afbeelding</h2>
      <form>
        <button type="button" class="imagebutton" onclick="changeImage(0)"> <img src='../img/csvn.png'> </button>
        <button type="button" class="imagebutton" onclick="changeImage(1)"> <img src='../img/vietnamFlag.png'> </button>
        <button type="button" class="imagebutton" onclick="changeImage(2)"> <img src='../img/littleGirl.jpg'> </button></br>
        <button type="button" class="imagebutton" onclick="changeImage(3)"> <img src='../img/growth.png'> </button>
        <button type="button" class="imagebutton" onclick="changeImage(4)"> <img src='../img/VietnamesKids.png'> </button>
        <button type="button" class="imagebutton" onclick="changeImage(5)"> <img src='../img/growth2.png'> </button>

          <br/>
          <br/>

        <button type="button" onclick="deleteImg()"> Verwijder Afbeelding </button>
      </form>
    </div>

    <!-- Jesse: -->
    <div id="Share" class="tabcontent">
        <br><br>
        <section id="nogNietIngelogd">
            <h2> Laat jouw ontwerp zien aan de wereld! </h2>
            <h3> Log in op Facebook of Twitter om deel te nemen aan de '100 handen'-wedstrijd.</h3>
        </section>

        <!-- Facebook button is inbegrepen in SDK, Twitter button is custom -->
        <fb:login-button size="xlarge" autologoutlink="true" scope="public_profile,email" onlogin="checkLoginState();">
            Verbind met Facebook
        </fb:login-button>
        <br>
        <button id="twitterLoginButton">Verbind met Twitter</button>
        <br>

        <!-- Hier volgt een bericht nadat de hand ge-submit is -->
        <h3 id="handSubmitted"></h3>

        <!-- Handnaam invoer & knop om handnaam & persoon-naam naar database te sturen -->
        <form id="wedstrijdSection"><br>
            <h2> Geef je hand een naam: </h2>
            <input type="text" name="handName" id="handName"
                   placeholder="Voer hier een naam in"
                   value="<?php if (isset($_POST['handName'])) echo $_POST['handName']; ?>"/>
            <input type="hidden" name="render_snapshot" id="hidden_image" value=""/>
            <textarea name="render_model" id="hidden_model_input" value="" class="hidden"></textarea>

            <h2> Doe mee aan de wedstrijd: </h2>
            <button type="submit" id="wedstrijdButton" onclick="vulNaamIn(); return false;">
                <!-- handNaam mag niet leeg zijn, return false zorgt ervoor dat de pagina niet herladen wordt -->
                Ik wil meedoen
            </button>
        </form>
        <br>

        <section id="shareSection">
            <h3> Share je hand: </h3>
            <input type="image" id="facebookBtn" onclick="submitAndShare();" class="clickIcon" src="../img/fb.png"/>
            <input type="image" id="tweetBtn" onclick="tweetTweet();" class="clickIcon" src="../img/twitter.png"/>
        </section>

        <section id="top100section">
            <h3> Bekijk ontwerpen van andere deelnemers: </h3>
            <a class="btn btn-large btn-blue" href="../PHP/leaderbord.php" id="top100button"> Top 100</a>
            <br>
        </section>
    </div>
</div>
</div>

<button type="button" onclick=" window.open('https://www.geef.nl/nl/doneer?charity=962&ref=&referenceCode=website&amount=&fixedAmount=N','_blank')" id="donateButton">Doneer nu</button>

<script>
var standardColor = null;
var textIndex = null;
var imgIndex = null;

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
    function changeModel(model) {
        HARDCODED_3DMODEL_PATH = model;
        updateModel(scene, DEFAULT_MODEL_COLOR);
    }

    /* kayleigh */
    function changeBGColor() {
        modelColor = document.getElementById("changedColor").value;
        console.log();
        updateModel(scene, modelColor);
    }

    function changeText(index){
      textIndex = index;
      UpdateMaterial(scene, standardColor, imgIndex, textIndex);
    }

    function changeImage(index){
      imgIndex = index;
      UpdateMaterial(scene, standardColor, imgIndex, textIndex);
    }

    function changeStandardColor(){
      standardColor = document.getElementById("standardcolor").value;
      UpdateMaterial(scene, standardColor, imgIndex, textIndex);
    }

    function deleteText(){
      textIndex = null;
      UpdateMaterial(scene, standardColor, imgIndex, textIndex);
    }

    function deleteImg(){
      imgIndex = null;
      UpdateMaterial(scene, standardColor, imgIndex, textIndex);
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "500px";
        $('#nav-icon').hide();
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        $('#nav-icon').show();
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
    <script type="text/javascript" src="../scripts/lib/guid.generator.js"></script>

    <script type="text/javascript" src="../scripts/lib/orbit.controls.js"></script>

    <!-- Global Variables -->
    <script type="text/javascript" src="../scripts/global.js.variables.js"></script>

    <!-- ... -->
    <script type="text/javascript" src="../scripts/facebook.js"></script>
    <script type="text/javascript" src="../scripts/twitter.js"></script>
    <script type="text/javascript" src="../scripts/model_viewer/main.js"></script>
    <script type="text/javascript" src="../scripts/controllers/renderer.controller.js"></script>
    <script type="text/javascript" src="../scripts/controllers/object.controller.js"></script>
    <script type="text/javascript" src="../scripts/controllers/model.controller.js"></script>
    <script type="text/javascript" src="../scripts/controllers/camera.controller.js"></script>
    <script type="text/javascript" src="../css/shared/_site.js"></script>
</footer>
</html>
