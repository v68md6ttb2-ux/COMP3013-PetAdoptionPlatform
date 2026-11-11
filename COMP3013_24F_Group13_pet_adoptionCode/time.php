<?php
$mysqli = new mysqli(hostname: "localhost", username: "root", password: "", database: "pet_adoption");

// check database connection
// query activities
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$queryStartTime = microtime(as_float: true);

$stmt = $mysqli->prepare(query: "SELECT * FROM admin");
if ($stmt === false) {
    die("MySQL prepare failed: " . $mysqli->error);
}

$queryEndTime = microtime(as_float: true);

$queryRuntime = $queryEndTime - $queryStartTime;

echo "Query Runtime: " . $queryRuntime . " seconds";

?>
