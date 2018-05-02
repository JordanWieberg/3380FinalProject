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
	
	if ($loggedIn) {
		header("Location: protected.php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];

    if ($action == 'do_update') {
		update_user();
	} else {
		profile();
	}
	
	function update_user() {
        $id = empty($_POST['id']) ? '' : $_POST['id'];
        $firstName = empty($_POST['firstName']) ? '' : $_POST['firstName'];
        $lastName = empty($_POST['lastName']) ? '' : $_POST['lastName'];
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
        $confirmPassword = empty($_POST['confirmPassword']) ? '' : $_POST['confirmPassword'];
        
        if( strcmp($password, $confirmPassword) == 0){
            
        
            // Require the credentials
            require_once 'db.conf';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "login_form.php";
                exit;
            }

            // http://php.net/manual/en/mysqli.real-escape-string.php
            $username = $mysqli->real_escape_string($username);
            $password = $mysqli->real_escape_string($password);

            //more secure password storing for website
            $password = sha1($password); 

            $query = "UPDATE users SET firstName='$firstName', lastName='$lastName', username='$username', password='$password' WHERE id='$id'";


            // If there was a result...
            if ($mysqli->query($query) == TRUE) {
                
                // Close the DB connection
                $mysqli->close();
                
                $error = "New User Created Successfully";
                require "profile.php";
                exit;
                }
                
            else {
                $error = "Insert Error: " . $query . "<br>" . $mysqli->error;
                require "profile.php";
                exit;
            }

            
        }
            // Else, there was no result
            else {
              $error = 'Error: Passwords do not match!';
              require "profile.php";
              exit;
            }
        }
	
	function profile() {
		$username = "";
		$error = "";
		require "profile.php";
        exit;
	}
	
?>