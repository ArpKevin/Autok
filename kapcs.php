<?php
header("Content-Type:text/html; charset=utf-8");

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "autok"); // Change database name here

$dbconn = @mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection
if (!$dbconn) {
    die("Hiba az adatbázis csatlakozásakor!: " . mysqli_connect_error());
}
echo "Sikeres kapcsolat!";

mysqli_query($dbconn, "SET NAMES utf8");
?>
