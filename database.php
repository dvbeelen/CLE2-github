<?php

$host = "localhost";
$database = "db_pedicure";
$user = "root";
$password = '';

$db = mysqli_connect($host, $database, $user, $password)
    or die("Error: " . mysqli_connect_error());;