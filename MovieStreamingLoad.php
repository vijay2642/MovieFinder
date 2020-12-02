<?php
include "MovieInfoLoad.php";
function getdb() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "MovieFinder";
	try {

		$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
		echo "Connected successfully";
	} catch (exception $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	return $conn;
}

function loadMovieStreamingInfo() {
	$conn = getdb();
	if (($h = fopen("../SunNxtFiles/SunNxt_Malayalam.csv", "r")) !== false) {

		while (($data = fgetcsv($h, 1000, ",")) !== false) {
			$title = $data[0];
			$movie_url = $data[1];
			$image = $data[2];

			echo ($title);
			echo ("\n");

			$sql = "INSERT INTO MovieStreamingInfo (title,Movie_url,Image,Provider,Country)
                    values ('$title','$movie_url','$image','SunNxt','India')";
			$conn->exec($sql);

		}

		fclose($h);
	}
}

function loadMovieInfo() {

}

// getdb();

// readCSV();
$movie = getOMDBInfo('Kabali');
echo ($movie)

?>