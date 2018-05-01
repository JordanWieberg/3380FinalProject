<?php
// From in class notes by Wergeles

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
	
	
?>
<!--Functionality:
    Give user access to unrestricted content
    This may include:
        About DND
        Videos on DND
-->
<!DOCTYPE html>
<!-- Thomas Newman
     tjn2zf
     December 8, 2017
-->
<html>
<head>
    <meta charset="utf-8">
	<title>About DnD</title>
    <link rel="stylesheet" type="text/css" href="common.css">
    <script src="jquery-3.2.1.js"></script>
	
</head>
<body>
    <h1> <img class="logo" src="Jacks/jack1.jpg" alt="jack1"> </h1>
    
    <!--    coded based on example on w3 school-->
    <ul class="nav">
        <li class="nav"><a href="index.php">Home</a></li>
        <li class="nav"><a class="active" href="movies.php">Movies de Jack</a></li>
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
<!--
        <iframe width="560" height="315" src="https://www.youtube.com/embed/UdAwX8JB66E" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Eo_oR7YO-Bw" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        <h1>Dungeons and Dragons: An Overview</h1>
        <p>Dungeons and Dragons was created as a way to make fantasy wargames more intimate. It was created so that players could roleplay as an individual character in an ongoing fantasy story. It has grown immensely since its inception and remains the number one fantasy role-playing game to this day.</p>
        
        <p>At its core, Dungeons and Dragons is a game about storytelling. With every session of the game, an interactable story is guided and crafted by the players. Typically, a DnD game might include elements such as: slaying mythical creatures, deposing corrupt lords, pillaging perilous tombs, and convincing an innkeeper to let you stay a night for free because you're oh so terribly weak and weary and poor (roll bluff).</p>
        
        <p>The game is prepared and mastermined by a single player known as the Dungeon Master. This player is responsible for creating the world in which the story takes place. With each session, it is their job to create intriguing storylines for the other players to enjoy. This player will also be in control of any monsters, villians, or common folk the players might encounter. It's tough work being Dungeon Master, but having fun with your friends and seeing them enjoy your adventures makes it all worth it.</p>
        
        <p>If you're not the Dungeon Master, that would make you one of the games Player Characters (PC's). You are responsible for creating your own unique hero (or villian). You could be anything from a human wizard to an orc rougue to a gnome barbarian! Whatever you play, it is your role to cooperate with your other players in order to interact with the world and objectives your Dungeon Master has created for you.<a href ="protected.php"> If you are interested in a taste of what goes into building a character, CLICK HERE!</a></p>
-->
        
        <?php
  try {
  $con= new PDO('mysql:host=sql204.epizy.com;dbname=epiz_21518000_Jack', "epiz_21518000", "HrWpxPtThBy0");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT * FROM movies";
  //first pass just gets the column names
  print "<table> n";
  $result = $con->query($query);
  //return only the first row (we only need field names)
  $row = $result->fetch(PDO::FETCH_ASSOC);
  print " <tr> n";
  foreach ($row as $field => $value){
   print " <th>$field</th> n";
  } // end foreach
  print " </tr> n";
  //second query gets the data
  $data = $con->query($query);
  $data->setFetchMode(PDO::FETCH_ASSOC);
  foreach($data as $row){
   print " <tr> n";
   foreach ($row as $name=>$value){
   print " <td>$value</td> n";
   } // end field loop
   print " </tr> n";
  } // end record loop
  print "</table> n";
  } catch(PDOException $e) {
   echo 'ERROR: ' . $e->getMessage();
  } // end try
 ?>

       
    <br>
    <br>
    <br>
    </div>
</body>
</html>