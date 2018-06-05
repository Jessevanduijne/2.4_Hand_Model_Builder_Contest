<html>
    <header>
        <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap/bootstrap.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/shared/_site.css">

        <?php require_once('./Models/db.php');

        $db = new db();

        $hands = $db->getLeaderBoard();
        ?>
    </header>
    <body>

        <main>
            <section id="gui-container">

            </section>
        </main>

    </body>

    <footer>
        <!-- 3RD Party Libraries -->
        <script type="text/javascript" src="../scripts/lib/three.js"></script>
        <script type="text/javascript" src="../scripts/lib/dat.gui.min.js"></script>
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