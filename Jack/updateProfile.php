<?php
// Taken from in class notes on createUser
// values were changed to fit my required code

	

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
	
	if ($action == 'do_create') {
		create_user();
	} else {
		updateProfile_form();
	}
	
	function create_user() {
        $favMovie = empty($_POST['favMovie']) ? '' : $_POST['favMovie'];
        $favSong = empty($_POST['favSong']) ? '' : $_POST['favSong'];
      
        
        // We added the test user to our users table
        // INSERT INTO users (username, password, addDate, changeDate) VALUES ('test', 'pass', NOW(), NOW());
        
            
        
            // Require the credentials
            require_once 'db.conf';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                //require "login_form.php";
                exit;
            }

            // Build query
//            $query = "SELECT id FROM users WHERE userName = '$username' AND password = '$password'";
//            $query = "insert into users (firstName, lastName, username, password) values ('$firstName', '$lastName', '$username', '$password')";
//        
//           $query ="" UPDATE Customers
//                SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
//WHERE CustomerID = 1; ""

    
   $query = "UPDATE users SET favMovie='$favMovie' favSong='$favSong' WHERE id=2;"
            // Sometimes it's nice to print the query. That way you know what SQL you're working with.
            print $query;
            //exit;


            // If there was a result...
            if ($mysqli->query($query) == TRUE) {
                
                // Close the DB connection
                $mysqli->close();
                
                $error = "Oops";
                require "updateProfile_form.php";
                exit;
                }
                
            else {
                $error = "Insert Error: " . $query . "<br>" . $mysqli->error;
                require "updateProfile_form.php";
                exit;
            }

            
        }
            // Else, there was no result
            else {
              $error = 'Woops';
              require "updateProfile_form.php";
              exit;
            }
        }
	
//	function login_form() {
//		$username = "";
//		$error = "";
//		require "login_form.php";
//        exit;
//	}
	
?>