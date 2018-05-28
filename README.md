# Project 100 Hands

This is the repository containing the sourcecode for the 100 Hands initiative.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

This project is being developped using the following resources/tools

###phpStorm
```
Download: 	https://www.jetbrains.com/student/

1. If you're a student; apply for a student licence, this will allow you to use the program for as long as remain a student.
2. Run the installer
3. Make sure you login within phpStorm so your student licence is activated

```

###XAMPP
```
XAMPP: 		https://www.apachefriends.org/index.html

1. Run the installer (For this guide keep everything on default)
2. Find the following folder: C:\xampp\htdocs
3. Clone the git directory within the htdocs
4. Open the index.php, you will see the following code:

--
<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/PROJECT_FOLDER_NAME_HERE/');
	exit;
?>
Something is wrong with the XAMPP installation :-( 
--

5. Replace "PROJECT_FOLDER_NAME_HERE" with the name of the git folder
6. Open XAMPP
7. Start the Apache Local Server
8. Open your browser and type: localhost
9. You should be shown the home page of the project

```