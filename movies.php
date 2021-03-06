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
<html>
<head>
    <meta charset="utf-8">
	<title>Movies</title>
    <link rel="stylesheet" type="text/css" href="common.css">
    <style>
/*
        th {
            border-bottom: 2px solid black;
            border-spacing: 15px;
        }
*/
    </style>
    <script src="jquery-3.2.1.js"></script>
	
</head>
<body>
    <h1> <img class="logo" src="Jacks/nacho-libre.jpg" alt="jack1"> </h1>
    
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
    
    <div class="content table">
        
        <?php
  try {
  $con= new PDO('mysql:host=localhost;port=3306;dbname=CS2830', "ec2-user", "nick");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT * FROM movies";
  //first pass just gets the column names
  print "<table>";
  $result = $con->query($query);
  //return only the first row (we only need field names)
  $row = $result->fetch(PDO::FETCH_ASSOC);
  print " <tr>";
  foreach ($row as $field => $value){
   print " <th>$field</th>";
  }
//   echo " <th>ID</th> <th>Title</th> <th>Character</th> <th>RT Score</th> <th>Box Office</th> 
//    <th>Release Date</th> <th>Fav Count</th>"
  print " </tr>";
  //second query gets the data
  $data = $con->query($query);
  $data->setFetchMode(PDO::FETCH_ASSOC);
  foreach($data as $row){
   print " <tr>";
   foreach ($row as $name=>$value){
   print " <td>$value</td>";
   } // end field loop
   print " </tr>";
  } // end record loop
  print "</table>";
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