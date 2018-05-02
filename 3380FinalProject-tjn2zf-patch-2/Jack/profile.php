<?php
// Taken from in class lecture notes

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
	if (!$loggedIn) {
		header("Location: login.php");
		exit;
	}
?>

<!DOCTYPE html>
<!-- Thomas Newman
     tjn2zf
     December 8, 2017
-->
<!--Functionality:
    allow user to access login restricted content
    character creator
-->

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sample Combat</title>
    <link rel="stylesheet" type="text/css" href="common.css">
    <script src="jquery-3.2.1.js"></script>
    
<!--    <script src="app.js"></script>-->
    
<!--    taken from in class einstein quote example-->
    <script>
		function updateInfo(quoteID) {
			var xmlHttp = new XMLHttpRequest();
		
			xmlHttp.onload = function() {
				if (xmlHttp.status == 200) {
					var infoBox = document.getElementById('infoBox');
					infoBox.innerHTML = xmlHttp.responseText;
				  }
			}
		
			var reqURL = "updateInfo.php?infoId=" + quoteID;
		
			xmlHttp.open("GET", reqURL, true);
			xmlHttp.send();
		}
	</script>
	
    
    
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
    <form action="updateProfile.php" method="POST">
        <input type="hidden" name="action" value="do_update">
        <div class="content">
            <div class="stack">
                <label for="username">User name: <?php print $username; ?></label>
                <input type="text" id="firstName" name="firstName" class="ui-widget-content ui-corner-all" autofocus value="<?php print $username; ?>">
            </div>
    
            <div class="stack">
                <label for="firstName">First name:</label>
                <input type="text" id="firstName" name="firstName" class="ui-widget-content ui-corner-all" autofocus value="<?php print $firstName; ?>">
            </div>
            
            <div class="stack">
                <label for="lastName">Last name:</label>
                <input type="text" id="lastName" name="lastName" class="ui-widget-content ui-corner-all " value="<?php print $lastName; ?>">
            </div>
        
            <div class="stack">
                <label for="pasword">Password:</label>
                <input type="password" id="password" name="password" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <input type="submit" value="Submit">
            </div>
        </div>
    </form>
    
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>
</html>