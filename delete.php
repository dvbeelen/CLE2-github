<?php
session_start();

//May I even visit this page?
if (!isset($_SESSION['login'])){
    header('Location: login.php');
    exit;
}

$email = $_SESSION['login'];

$db = mysqli_connect('sql.hosted.hr.nl', '0959940', 'goleodou', '0959940');

$apId = $_GET['id'];

$query = "DELETE FROM reservations WHERE id = " . mysqli_escape_string($db, $apId);
mysqli_query($db, $query) or die ('Error: '.mysqli_error($db));
//Close connection
mysqli_close($db);
//Redirect to homepage after deletion & exit script
header("Location: apOverview.php");
exit;



