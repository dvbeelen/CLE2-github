<?php
    $db = mysqli_connect('localhost', 'root', '', 'db_pedicure');



    if (isset($_POST['submit'])) {

        $email = mysqli_escape_string($db, $_POST['email']);
        $firstname = mysqli_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_escape_string($db, $_POST['lastname']);
        $phonenumber = mysqli_escape_string($db, $_POST['phonenumber']);
        $apDate = mysqli_escape_string($db, $_POST['apDate']);
        $apTime = mysqli_escape_string($db, $_POST['apTime']);

        include_once 'form-validation.php';

        $query = "INSERT INTO reservations (email, firstname, lastname, phone, apDate, apTime) 
                  VALUES ('$email', '$firstname', '$lastname', '$phonenumber', '$apDate', '$apTime')";

        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);


        if ($result){
            header('Location: apConfirm.php');
        }

    }

mysqli_close($db);

    ?>

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
        <button class="navButton"><a href="apForm.php">Afspraak Maken</a></button>
        <button class="navButton"><a href="https://www.didypedicure.nl/de-praktijk/">De Praktijk</a></button>
        <button class="navButton"><a href="https://www.didypedicure.nl/contact/">Contact</a></button>
        <button class="navButton"><a href="https://www.didypedicure.nl/privacy/">Privacy</a></button>
        <button class="navButton"><a href="userLogin.php">Log In</a></button>
    </nav>
</header>
</header>

<div class= "appointForm">
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email" >E-mail: <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span></label> <br>
        <input type="email" id="email" name="email" value="<?= isset($email) ? $email : '' ?>"> <br>

        <label for="firstname">Voornaam:<?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></label> <br>
        <input type="text" id="firstname" name="firstname" value="<?= isset($firstname) ? $firstname : '' ?>"> <br>

        <label for="lastname">Achternaam: <?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></label> <br>
        <input type="text" id="lastname" name="lastname" value="<?= isset($lastname) ? $lastname : '' ?>"> <br>

        <label for="phonenumber">Telefoonnummer: <?= isset($errors['phone']) ? $errors['phone'] : '' ?></label> <br>
        <input type="number" id="phonenumber" name="phonenumber" value="<?= isset($phonenumber) ? $phonenumber : '' ?>"> <br>

        <label for="apDate">Kies een datum <?= isset($errors['date']) ? $errors['date'] : '' ?></label> <br>
        <input type="date" id="apDate" name="apDate" value="<?= isset($apDate) ? $apDate : '' ?>"> <br>

        <label for="apTime">Kies een tijd: <?= isset($errors['time']) ? $errors['time'] : '' ?></label> <br>
        <select name="apTime" >
            <option> Kies een tijd</option>
            <option> 09:00 </option>
            <option> 10:00 </option>
            <option> 11:00 </option>
            <option> 13:30 </option>
            <option> 14:30 </option>
            <option> 15:30 </option>
        </select>

        <div class="data-submit">
            <input id ="sendButton" type="submit" name="submit" value="Verstuur"/>
        </div>
    </form>
</div>
