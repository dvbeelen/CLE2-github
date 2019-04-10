<?php
session_start();

//Check if user is logged in, else redirect to login
if (!isset($_SESSION['login'])){
    header('Location: login.php');
    exit;
}

//include settings.php
require 'includes/settings.php';

$email = $_SESSION['login'];

$db = mysqli_connect($host, $dbUser, $dbPassword, $table);
$apId = $_GET['id'];

//Here, the appointment is deleted.
$query = "DELETE FROM reservations WHERE id = " . mysqli_escape_string($db, $apId);
mysqli_query($db, $query) or die ('Error: '.mysqli_error($db));

//Close connection to database.
mysqli_close($db);

//Redirect to homepage after deleting the appointment & exit script.
header("Location: apOverview.php");
exit;



