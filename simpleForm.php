<?php
    $db = mysqli_connect('localhost', 'root', '', 'db_pedicure');

    if (isset($_POST['submit'])) {
        // Check isset to prevent undefined index error
        $email = mysqli_escape_string($db, $_POST['email']);
        $password = mysqli_escape_string($db, $_POST['password']);
        $firstname = mysqli_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_escape_string($db, $_POST['lastname']);
        $phonenumber = mysqli_escape_string($db, $_POST['phonenumber']);
        $apDate = mysqli_escape_string($db, $_POST['apDate']);
    }
        print($email);


    //    $apTime = mysqli_escape_string($db, $_POST['apTime']);

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO reservations (email, password, lastname, firstname, phone, apDate) 
                  VALUES ('$email', '$password', '$firstname', '$lastname', '$phonenumber', '$apDate')";

        $result = mysqli_query($db, $query);

        if ($result) {
            echo 'Account created! Ga naar de inlogpagina';
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        mysqli_query($db, $query);
        mysqli_close($db);


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
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email">E-mail:</label> <br>
        <input type="email" id="email" value="<?= isset($email) ? $email : '' ?>"> <br>

        <label for="password"> Wachtwoord:</label> <br>
        <input type="password" id="password" value="<?= isset($password) ? $password : '' ?>"> <br> <br>

        <label for="firstname">Voornaam:</label> <br>
        <input type="text" id="firstname" value="<?= isset($firstname) ? $firstname : '' ?>"> <br>

        <label for="lastname">Achternaam:</label> <br>
        <input type="text" id="firstname" value="<?= isset($lastname) ? $lastname : '' ?>"> <br>

        <label for="phonenumber">Telefoonnummer:</label> <br>
        <input type="number" id="phonenumber" value="<?= isset($phonenumber) ? $phonenumber : '' ?>"> <br>

        <label for="apDate">Kies een datum</label> <br>
        <input type="date" id="apDate" value="<?= isset($apDate) ? $apDate : '' ?>"> <br>

        <label for="apTime">Kies een tijd:</label> <br>
        <select id="apTime" >
            <option> 09:00 </option>
            <option> 10:00 </option>
            <option> 11:00 </option>
            <option> 13:30 </option>
            <option> 14:30 </option>
            <option> 15:30 </option>
        </select> <br>

        <input type="submit" name="submit" value="submit"/>

        <button id="biggerForm"><a href="index.php">Simpele versie</a></button>
</div>

