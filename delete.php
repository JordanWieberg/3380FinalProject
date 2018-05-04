<?php

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
$query = "DELETE FROM users WHERE username = $user";

$mysqli->query($query);

$mysqli->close();
require "login_form.php";

        
?>