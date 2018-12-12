<?php

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
    </div>>
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

<div class="formTime">
    <form>
        <h2> Kies een tijd </h2>
        <input class="availableTime" type="radio" name="time"> <h3>Datum/Maand 09:00</h3>
        <input class="availableTime" type="radio" name="time"> <h3>Datum/Maand 10:00</h3>
        <input class="availableTime" type="radio" name="time"> <h3>Datum/Maand 11:00</h3>
        <input class="availableTime" type="radio" name="time"> <h3>Datum/Maand 12:00</h3>
        <input class="availableTime" type="radio" name="time"> <h3>Datum/Maand 13:30</h3>
        <input class="availableTime" type="radio" name="time"> <h3>Datum/Maand 14:30</h3>
        <input class="availableTime" type="radio" name="time"> <h3>Datum/Maand 15:30</h3>
    </form>
</div>

<div class="pageNav">
    <button class="lastPage"><a href="formDate.php">Vorige pagina</a></button>
    <button class="nextPage"><a href="formEnd.php">Volgende pagina</a></button>
</div>

<footer>

</footer>
</body>
</html>