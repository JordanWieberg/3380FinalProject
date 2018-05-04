<?php
// This code is taken from the in class notes

    // HTTPS redirect
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
    
	// Every time we want to access $_SESSION, we have to call session_start()
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
?>

<!DOCTYPE html>
<!-- Thomas Newman
     tjn2zf
     December 8, 2017
-->
<!-- Functionality:
    Should display homepage
    Include link to protected content, redirect to login if not logged in
    Include link to non-login content
    Include visual for login, option to logout
    Include Header and basic elements that will appear on each page
-->

<html>
<head>
    <meta charset="utf-8">
	<title>Jables Tables</title>
    <link rel="stylesheet" type="text/css" href="common.css">
    <script src="jquery-3.2.1.js"></script>
	
</head>
<body>

    <h1> <img class="logo" src="Jacks/jack1.jpg" alt="jack1"> </h1>
    
    <!--    coded based on example on w3 school-->
    <ul class="nav">
        <li class="nav"><a class="active" href="index.php">Home</a></li>
        <li class="nav"><a href="movies.php">Movies de Jack</a></li>
        <li class="nav"><a href="music.php">The Music</a></li>
        <li class="nav"><a href="profile.php">Profile</a></li>
        <?php
if ($_SESSION['loggedin'] == true) {
?>
<li class="check" id="log">You Are Logged In</li>
<?php
} else {
?>
<li class="check" id="log">Not Currently Logged In</li>
<?php
}
?>
        <li class="nav" id="log"><a href="logout.php">Log out</a></li>
        <li class="nav" id="log"><a href="login.php">Log in</a></li>
    </ul>
    

        <div class="content">
            <h1>Jables Tables: A Jack Black fan-base</h1>
            <h2>Welcome! This is a site dedicated to preserving the legend of beloved comedian and dramatic actor, Thomas Jacob "Jack" Black</h2>
            <br>
            <div class="container">
                <h1>Movies</h1>
                <a href="movies.php">
                    <img class="learn" src="Jacks/PoD.jpg" alt="learn">
                </a>
                <p class="dragon">Browse Jack Black's filmography</p>
            </div>
            <br>
            <div class="container">
                <h1>Music</h1>
                <p class="character"><a href="music.php">
                    <img class="create" src="Jacks/tenaciousD.jpg" alt="create">
                </a><br><br>Browse Jack's earbud tickling tunes</p>
                <br>
                <br>
                <br>
            </div>
            <br>
            <br>
            <br>
            
        </div>
</body>
</html>