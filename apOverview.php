<?php
session_start();

//May I even visit this page?
if (!isset($_SESSION['login'])){
    header('Location: login.php');
    exit;
}

$email = $_SESSION['login'];



?>

<!doctype html>
<html lang="en">
<head>
    <link rel="icon" type="ïmage/jpg" href="images/smalllogo.jpg"/>
    <link href="https://fonts.googleapis.com/css?family=Bubbler+One" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Uw afspraak</title>
</head>
<body>
<header>
    <div class="logo">
        <img src="images/logo.jpg">
    </div>
    <nav>
        <button class="navButton"><a href="https://www.didypedicure.nl/">Home</a></button>
        <button class="navButton"><a href="https://www.didypedicure.nl/aantekeningen/">Aantekeningen</a></button>
        <button class="navButton"><a href="https://www.didypedicure.nl/prijslijst/">Prijslijst</a></button>
        <button class="navButton"><a href="">Afspraak Maken</a></button>
        <button class="navButton"><a href="https://www.didypedicure.nl/de-praktijk/">De Praktijk</a></button>
        <button class="navButton"><a href="https://www.didypedicure.nl/contact/">Contact</a></button>
        <button class="navButton"><a href="https://www.didypedicure.nl/privacy/">Privacy</a></button>
        <button class="navButton"><a href="logout.php">Uitloggen</a></button>
    </nav>
</header>


<div id="appointmentInfo">
    <h2> Agenda voor komende week:</h2>
   <div class="weekday">
       <h2>Maandag</h2>
        <p>09:00 - 10:00</p>
        <p>10:00 - 11:00</p>
        <p>11:00 - 12:00</p>
        <p> PAUZE </p>
        <p>13:30 - 14:30</p>
        <p>14:30 - 15:30</p>
        <p>15:30 - 16:30</p>
    </div>
    <hr>
    <div class="weekday">
        <h2>Dinsdag</h2>
        <p>09:00 - 10:00</p>
        <p>10:00 - 11:00</p>
        <p>11:00 - 12:00</p>
        <p> PAUZE </p>
        <p>13:30 - 14:30</p>
        <p>14:30 - 15:30</p>
        <p>15:30 - 16:30</p>
    </div>
    <hr>
    <div class="weekday">
        <h2>Woensdag</h2>
        <p>09:00 - 10:00</p>
        <p>10:00 - 11:00</p>
        <p>11:00 - 12:00</p>
        <p> PAUZE </p>
        <p>13:30 - 14:30</p>
        <p>14:30 - 15:30</p>
        <p>15:30 - 16:30</p>
    </div>
    <hr>
    <div class="weekday">
        <h2>Donderdag</h2>
        <p>09:00 - 10:00</p>
        <p>10:00 - 11:00</p>
        <p>11:00 - 12:00</p>
        <p> PAUZE </p>
        <p>13:30 - 14:30</p>
        <p>14:30 - 15:30</p>
        <p>15:30 - 16:30</p>
    </div>
    <hr>
    <div class="weekday">
        <h2>Vrijdag</h2>
        <p>09:00 - 10:00</p>
        <p>10:00 - 11:00</p>
        <p>11:00 - 12:00</p>
        <p> PAUZE </p>
        <p>13:30 - 14:30</p>
        <p>14:30 - 15:30</p>
        <p>15:30 - 16:30</p>
    </div>
</div>