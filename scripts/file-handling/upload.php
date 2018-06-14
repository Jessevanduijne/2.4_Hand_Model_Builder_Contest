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
    //$fileDestination = 'C:\\Users\\Teije\\Dropbox\\Project 2.4/user_screenshots/'.$filename;
    //getFtpConnection();

    //$onlineFileDestination = 'http://sm2018a1.infhaarlem.nl/user_images/'.$filename;

    //Put the image from $_POST in the specified folder
    $fileImage = $_POST['imagefile'];
    file_put_contents($fileDestination, file_get_contents($fileImage));
    //file_put_contents($onlineFileDestination, file_get_contents($fileImage));

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
        'filename' => $filename
    );

    echo json_encode($response);
}

function getFtpConnection()
{
    // connect and login to FTP server
    $ftp_server = "http://sm2018a1.infhaarlem.nl";
    $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
    $login = ftp_login($ftp_conn, sm2018a1, ARKI2wmwSM);
}

function closeFtpConnection($ftp_conn)
{
    ftp_close($ftp_conn);
}