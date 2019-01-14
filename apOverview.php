<?php
$db = mysqli_connect('localhost', 'root', '', 'pedicure_db');

if (isset($_POST['submit'])) {
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = mysqli_escape_string($db, $_POST['password']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $firstname = mysqli_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_escape_string($db, $_POST['lastname']);
    $phonenumber = mysqli_escape_string($db, $_POST['phonenumber']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);
}

    $query = "SELECT * FROM users";
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
        <button class="navButton"><a href="adminLogin.php">Log In</a></button>
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