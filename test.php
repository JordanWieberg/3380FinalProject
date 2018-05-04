<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Title</th><th>Character</th><th>rt Score</th><th>box office</th><th>release date</th><th>fav count</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["jbc"]."</td><td>".$row["rtscore"]."</td><td>".$row["boxoffice"]."</td><td>".$row["releasedate"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


$user = $_SESSION["username"];
$sql = "DELETE FROM users WHERE username = '$user'";
?>

UPDATE movies
SET favCount = 
SUM(movies.favCount)
FROM movies
INNER JOIN users ON movies.title = users.favMovie;