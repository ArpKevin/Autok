<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
header("Content-Type:text/html; charset=utf-8");

define("DBHOST", $_ENV['DBHOST']);
define("DBUSER", $_ENV['DBUSER']);
define("DBPASS", $_ENV['DBPASS']);
define("DBNAME", $_ENV['DBNAME']);

$dbconn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($dbconn->connect_error) {
    error_log("Adatbázis kapcsolat hiba:" . $dbconn->connect_error);
} else {
    // echo "Kapcs ok";
}

if (!$dbconn->set_charset("utf8")) {
    error_log("Nem sikerült a karakter készlet beállítása: " . $dbconn->error);
    die("Hiba az adatbázis karakter készlet beállításában");
}
?>
