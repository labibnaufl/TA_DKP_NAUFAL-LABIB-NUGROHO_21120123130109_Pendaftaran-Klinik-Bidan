<?php

$hostname = "Localhost";
$username = "root";
$password = "";
$databse_name = "datapasien";

$db = new mysqli($hostname, $username, $password, $databse_name);

if($db-> connect_error) {
   die("Connection failed: " . $db->connect_error);
}

?>