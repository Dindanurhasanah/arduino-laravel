<?php
$mysqli = new mysqli("localhost", "root", "", "project2");


if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
?>