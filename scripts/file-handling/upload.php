<?php session_start();
$MAX_FILE_SIZE = 10000000000;

if(isset($_POST['imagename']) && isset($_POST['imagefile']))
{
    //Escape injection
    $filename = htmlspecialchars($_POST['imagename']);

    $filename = time()."-".$_POST['imagename'].".png";

    //If file name is empty; set default 'no-name' value
    // $filename =  empty($filename) ? 'no-name' : $filename;
    //Image file save destination (made unique using a timestamp)
    $fileDestination = '../../content/user_screenshots/'.$filename;
    //$fileDestination = 'C:\\Users\\Teije\\Dropbox\\Project 2.4/user_screenshots/'.$filename;

    //Put the image from $_POST in the specified folder
    $fileImage = $_POST['imagefile'];
    file_put_contents($fileDestination, file_get_contents($fileImage));

    //Set session image- name & path - used to pass along the values after the upload
    $_SESSION['imagename'] = $filename;
    $_SESSION['imagepath'] = $fileDestination;
}

if(isset($_POST['render_model']))
{
    //Escape injection
    $modelName = htmlspecialchars($_POST['imagename']);

    //If file name is empty; set default 'no-name' value
    $modelName =  empty($modelName) ? 'no-name' : $modelName;

    $objValues = $_POST['render_model'];

    //Set model file path

    $fullModelName = time() ."-". $modelName . ".obj";
    $fileDestination = '../../content/user_screenshots/'.$fullModelName ;

    //echo $fileDestination;
    file_put_contents($fileDestination, $objValues.PHP_EOL, FILE_APPEND | LOCK_EX);

    //Set session model path
    $_SESSION['modelpath'] = $fileDestination;

       $response = array
        (
            "status" => true,
            "message" => "Success",
            "modelName" => $fullModelName
        );

    echo json_encode($response);

    //Return to the render view page and confirm the action in the browser
    //Uncomment these to re-enable redirecting
    //header("Location: /Project2.4/views/model_view.php?state=success");

}



//Return to the render view page and confirm the action in the browser
//  header("Location: /Project2.4/views/model_view.php?state=success");
//  die();
//   // connect and login to FTP server
//   $ftp_server = "552779.infhaarlem.nl";
//   $onlineFileDestination = '../handimg/'.$filename;
//
//   try {
//     $ftp_conn = ftp_connect($ftp_server);
//     if (false === $ftp_conn) {
//         throw new Exception('Unable to connect');
//     }
//
//     $loggedIn = ftp_login($ftp_conn, "s552779", "AJQhEQ8b");
//     if (true === $loggedIn) {
//         // echo "Login was successful!";
//     } else {
//         throw new Exception('Unable to log in');
//     }
//
//     // if (ftp_put($ftp_conn, $onlineFileDestination, $fileImage, FTP_ASCII)) {
//     //     echo "successfully uploaded $fileImage\n";
//     //     exit;
//     //  } else {
//     //     echo "There was a problem while uploading $fileImage\n";
//     //     exit;
//     //     }
// //    print_r(ftp_nlist($ftp_conn, ".")); DO NOT WRITE OR ECHO SHIT
//     ftp_close($ftp_conn);
//   }
//
//   catch (Exception $e) {
//       echo "Failure: " . $e->getMessage();
//   }