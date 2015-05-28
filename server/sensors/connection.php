<?php
define("DB_SERVER", "localhost:8080");
define("DB_USER", "aquaponics");
define("DB_PASSWORD", "somepassword1");
define("DB_DATABASE", "sensors");
$db = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
