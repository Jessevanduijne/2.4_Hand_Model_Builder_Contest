<!DOCTYPE HTML>
<html>
  <head>
    <title>Bouw je eigen hand voor CSVN</title>
    <link rel="stylesheet" type="text/css" href="../css/shareIntegratie/style.css">
    <script type="text/javascript" src="../scripts/facebook.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Facebook: -->
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
      })
    </script>

  </head>
  <body>

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
    </section>

  </body>
</html>
