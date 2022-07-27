<?php
session_start();

// connect to database
// coming soon...
$conn = mysqli_connect("localhost", "root", "sulayMarym=1", "bantaba");



if (!$conn) {
    die("Error connecting to database: " . mysqli_connect_error());
}

define('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost:8001/');
