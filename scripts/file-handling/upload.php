<?php
$MAX_FILE_SIZE = 1000000;

if(isset($_POST['imagename']) && isset($_POST['imagefile']))
{
    //Escape injection
    //$filename = htmlspecialchars($_POST['image_name']);

    $filename = time()."-".$_POST['imagename'].".png";

    //If file name is empty; set default 'no-name' value
    // $filename =  empty($filename) ? 'no-name' : $filename;
    //Image file save destination (made unique using a timestamp)
    $fileDestination = 'C:\\xampp\\htdocs\\Project2.4/content/user_screenshots/'.$filename;

    //Put the image from $_POST in the specified folder
    $fileImage = $_POST['imagefile'];
    file_put_contents($fileDestination, file_get_contents($fileImage));

    //Set session image- name & path - used to pass along the values after the upload
    $_SESSION['imagename'] = $filename;
    $_SESSION['imagepath'] = $fileDestination;
    //Return to the render view page and confirm the action in the browser
    //  header("Location: /Project2.4/views/model_view.php?state=success");
    //  die();
    $response = array
    (
        'status' => true,
        'message' => 'Success',
        'filename' => $filename,
    );

    echo json_encode($response);
}
