 <?php
$servername = "127.0.0.1";
$username = "c3163hers";
$password = "hers";
$dbname = "c3163gpr2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected succesfully";

&name = $_GET["name"];
&score = $_GET["score"];
if(!empty($name) && !empty($score)){
    echo "name: ".$name."  score: ".$score."<br>";

    $sql = "INSERT INTO highscores (score, name) VALUES(".$score.", '".$name."')";
    if($conn->query($sql) === TRUE){
        echo "New record is succesfully created!"
    } echo {
        echo "Error: ".$sql. "<br>".$conn->error;
    }
} else {
    echo "No name or score provided in the query string<br>";
    echo "you need to add a name and score to the query string";
}

$conn->close();
/*
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
*/
?> 