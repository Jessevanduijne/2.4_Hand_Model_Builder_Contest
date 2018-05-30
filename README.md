# Project 100 Hands
This is the repository containing the sourcecode for the 100 Hands initiative.

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites
This project is being developped using the following resources / tools:

#### phpStorm
```
Download: 	https://www.jetbrains.com/student/

1. If you're a student; apply for a student licence, this will allow you to use the program for as long as remain a student.
2. Run the installer
3. Make sure you login within phpStorm so your student licence is activated

```

#### XAMPP
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

## Project Guidelines
In this section all guidelines are defined which must be followed during this project.
#### Folders & File Placement
Please do not create a folder for your part of the project. Add the files to the 
corresponding folders (i.e.: views, scripts, etc.). This way the folder tree remains 
organized and this way it is much easier to share functionality.

##### Libraries
Place files from 3rd party libraries in the 'lib' folder (example: scripts/lib contains three.js).


If no 'lib' folder exists within the folder you are currently working on and you do wish to add a
library; create the 'lib' folder yourself and save the library to this folder.

This way we keep a good overview of which libraries we are using and we allow for
easier sharing of functionality within these libraries.s

#### File Names
The following file naming conventions must be followed:
```
General Rule:
'Never use spaces in file names!'

php:            page_name.php
javascript:     page.name.js
css:            page.name.css   [Place these in the css folder]
css (shared):   _file.css       [Place these in the css/shared folder]
```

#### Clean Variable Names & Code
Lets use the conventions described in the following article:
http://crockford.com/javascript/code.html

## Suggestions
If you have any suggestions on how to improve/alter the page, please discuss in the group WhatsApp.