<?php session_start();
$MAX_FILE_SIZE = 1000000;

//Check if the post is called by the element named 'submit'
if(isset($_POST['submit']))
{
    //Escape injection
    $filename = htmlspecialchars($_POST['image_name']);

    //If file name is empty; set default 'no-name' value
    $filename =  empty($filename) ? 'no-name' : $filename;
    //Image file save destination (made unique using a timestamp)
    $fileDestination = 'C:\\xampp\\htdocs\\Project2.4/content/user_screenshots/' .  time() ."-". $filename . ".png" ;
    //Put the image from $_POST in the specified folder
    file_put_contents($fileDestination, file_get_contents(($_POST['render_snapshot'])));

    //Set session image- name & path - used to pass along the values after the upload
    $_SESSION['imagename'] = $filename;
    $_SESSION['imagepath'] = $fileDestination;
    //Return to the render view page and confirm the action in the browser
    header("Location: /Project2.4/views/model_view.php?state=success");
    die();
}