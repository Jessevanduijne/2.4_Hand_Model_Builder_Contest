<?php session_start();


?>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato"/>

<!DOCTYPE html>

<html>
<head>
    <title>Project 2.4 - 100 Hands</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/shared/_site.css">
</head>

<body>
<div id="scene"></div>
<div id="gui-container"></div>

<!-- (Hidden) File upload to save the image to the server
     - Action: The page that is targeted when submitting the form
     - Method: What kind of action is the form going to perform
     - Enctype: Specifies how the form-data should be encoded when submitting it to the server
-->

<form action="/Project2.4/scripts/file-handling/upload.php" method="POST" enctype="multipart/form-data" id="image-form">
    <label for="image_name">Save the file:</label> </br>
    <input type="text" name="image_name" placeholder="Enter image name..." required minlength="5">
    <input type="hidden" name="render_snapshot" id="hidden_image" value=""/>
    <button type="submit" name="submit" onclick="save()" id="submit-button">Save</button>
</form>

<?php
echo $_SESSION['imagepath'];
    if(isset($_SESSION['imagepath'],$_SESSION['imagename'])) {
?>
     <h5 class="responsetext">Opgeslagen als : <?php echo $_SESSION['imagename'] ?></h5>
     <h5 class="responsepath">Op : <?php echo $_SESSION['imagepath'] ?></h5>
<?php
    }
?>
<script>
    let imagePath = '<?php echo $_SESSION['imagepath'] ?>'
</script>


</body>

<footer>
    <!-- 3RD Party Libraries -->
    <script type="text/javascript" src="../scripts/lib/three.js"></script>
    <script type="text/javascript" src="../scripts/lib/STLLoader.js"></script>
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

    <script type="text/javascript" src="../scripts/model_viewer/main.js"></script>
</footer>
</html>
