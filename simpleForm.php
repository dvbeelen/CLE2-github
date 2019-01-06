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


        $query = "INSERT INTO users (firstname, lastname. email, password, phonenumber, date, time) 
              VALUES ('$firstname', '$lastname', '$email', '$password', '$phonenumber', '$date', '$time',)";

        if ($result) {
            echo 'Account created! Ga naar de inlogpagina';
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        mysqli_query($db, $query);
        mysqli_close($db);

    }
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
    <title>Maak een afspraak</title>
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
    </nav>
</header>

<div class= "appointFolder">
    <form class="form">
        <label for="email">E-mail:</label> <br>
        <input type="email" id="email"> <br>

        <label for="password"> Wachtwoord:</label> <br>
        <input type="password" id="password"> <br> <br>

        <label for="firstname">Voornaam:</label> <br>
        <input type="text" id="firstname"> <br>

        <label for="lastname">Achternaam:</label> <br>
        <input type="text" id="firstname"> <br>

        <label for="phonenumber">Telefoonnummer:</label> <br>
        <input type="number" id="phonenumber"> <br>

        <label for="date">Kies een datum</label> <br>
        <input type="date" id="date"> <br>

        <label for="time">Kies een tijd:</label> <br>
        <input type="time" id="time"> <br> <br>

        <input type="submit" name="submit" value="Versturen"/>

        <button id="biggerForm"><a href="index.php">Simpele versie</a></button>
</div>

