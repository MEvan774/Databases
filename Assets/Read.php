 <?php
$servername = "127.0.0.1";
$dbname = "c3163gpr2";

$debug = false;
if($debug){
	$username = "root";
	$password = "";
} else {
	$username = "c3163hers";
$password = "hers";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM highscores";
$result = $conn->query($sql);
$rows = array();

if($result->num_rows > 0){
	$json = "{\"entries\": [";
	while($r = $result->fetch_assoc()){
		$json.="{\"score\":".$r['score']. ", \"name\":\"".$r['name']."\", \"time\":\"".$r['entrytimestam']."\"}";
		$json.=",";
	}
	$json.="]}";
	$json = str_replace(",]}", "]}", $json);
	echo $json;
} else {
	echo "0 results";
}
$conn->close();
?> 