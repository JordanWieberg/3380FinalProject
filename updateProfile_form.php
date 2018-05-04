<!DOCTYPE html>
<!-- Thomas Newman
     tjn2zf
     December 8, 2017
-->
<!-- based on in class lecture-->
<html>
<head>
	<title>Update your account</title>
	<link href="common.css" rel="stylesheet" type="text/css">
    <link href="../jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <script src="../jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
    <script src="../jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    <script>
        $(function(){
            $("input[type=submit]").button();
            
            $("#password, #confirmPassword").keyup(function(){
                var password = $("#password").val();
                var confirmPassword = $("#confirmPassword").val();
                
                if(password.localeCompare(confirmPassword) != 0){
                   // $("#outputDiv").html("Passwords Don't Match");
                    document.getElementById("confirmPassword").setCustomValidity("Passwords Don't Match");
                }
                else {
                    //$("#outputDiv").html("Passwords Match");
                    document.getElementById("confirmPassword").setCustomValidity("");
                }
            });
        });
    </script>
</head>
<body>
    <h1> <img class="logo" src="Jacks/jack1.jpg" alt="jack1"> </h1>
    
    <!--    coded based on example on w3 school-->
    <ul class="nav">
        <li class="nav"><a  href="index.php">Home</a></li>
        <li class="nav"><a href="movies.php">Movies de Jack</a></li>
        <li class="nav"><a href="music.php">The Music</a></li>
        <li class="nav"><a class="active" href="profile.php">Profile</a></li>
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
    <div id="loginWidget" class="ui-widget content">
        <h1 class="ui-widget-header">Login</h1>
        
        <?php
            if ($error) {
                print "<div class=\"ui-state-error\">$error</div>\n";
            }
        ?>
        
<!--        code based on in class user creation example-->
        <form action="updateProfile.php" method="POST">
            
            <input type="hidden" name="action" value="do_create">
            
             <div class="stack">
            <label for="favMovie">Favorite Movie:</label>
                 <input type="text" id="favMovie" name="favMovie" required>
                 <select name="Movies" size="4">
                <option value="Jack1">Jack1</option>
                <option value="Jack2">Jack2</option>
                <option value="Jack3">Jack3</option>
                <option value="Jack4">Jack4</option>
                </select>
                <br><br>

            </div>
            
            <div class="stack">
            <label for="favSong">Favorite Song:</label>
                <input type="text" id="favSong" name="favSong" required>
                 <select name="Music" size="4">
                <option value="Jack1">Jack1</option>
                <option value="Jack2">Jack2</option>
                <option value="Jack3">Jack3</option>
                <option value="Jack4">Jack4</option>
                </select>
                <br><br>

            </div>
            
            
            <div class="stack">
                <input type="submit" value="Submit">
            </div>
        </form>
        
        <br>
        <div id="outputDiv"></div>
        
        
    </div>
</body>
</html>