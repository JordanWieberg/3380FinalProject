<?php

   // HTTPS redirect
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
	
	
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
    $_SESSION['loggedin'] = false;
//	if (!$loggedIn) {
//		header("Location: login.php");
//		exit;
//	}

require_once 'db.conf';
        
        // Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        // Check for errors
        if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			require "updateProfile_form.php";
            exit;
        }

$user = $_SESSION["username"];
$query = "DELETE FROM users WHERE username = '$user';";

print $query;

$mysqli->query($query);

$mysqli->close();
require "login_form.php";

        
?>