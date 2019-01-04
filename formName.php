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
    <title>Maak een afspraak</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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

<div class="form">
    <form action="formEnd.php" method="post">
        <h2> Wat is uw voornaam? </h2>
        <input class="inputBar" type="text" name="firstname">
        <input type="submit" name="submit">
    </form>
</div>

<div class="pageNav">
    <button class="lastPage"><a href="index.php">Vorige pagina</a></button>
    <button type="submit" class="nextPage"><a href="formLastName.php">Volgende pagina</a></input></button>
</div>

<footer>

</footer>
</body>
</html>
