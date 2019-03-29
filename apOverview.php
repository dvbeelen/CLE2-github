<?php
session_start();

//If user is not logged in, get redirected to log-in page.
if (!isset($_SESSION['login'])){
    header('Location: adminLogin.php');
    exit;
}

//Connect to database.
$db = mysqli_connect('sql.hosted.hr.nl', '0959940', 'goleodou', '0959940');

//Get the result set from the database with an SQL query
$query = "SELECT * FROM reservations";
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$reservations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}
//Close connection
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
    <h2 id ="overviewHeader"> Alle afspraken</h2>
</header>
<!--Redirect user to page where a new appointment can be created.-->
<button id ="newAp"><a href="apForm.php"> Nieuwe afspraak </a></button>

<!--Results from database-query is looped into the table-->
<table>
    <thead>
    <tr>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>E-mail</th>
        <th>Telefoonnummer</th>
        <th>Datum Afspraak</th>
        <th>Tijd Afspraak</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reservations as $reservation) { ?>
        <tr>
            <td><?= $reservation['firstname']; ?></td>
            <td><?= $reservation['lastname']; ?></td>
            <td><?= $reservation['email']; ?></td>
            <td><?= $reservation['phone']; ?></td>
            <td><?= $reservation['apDate']; ?></td>
            <td><?= $reservation['apTime']; ?></td>

            <!--Redirect user to update page.-->
            <td><button><a href="apUpdate.php?id=<?= $reservation['id']; ?>">Wijzigen</a></button></td>

            <!--User is given an error prompt to avoid accidental delete of appointments.-->
            <td><button onclick="return confirm('Weet u zeker dat u deze afspraak wilt verwijderen?');"> <a href="delete.php?id=<?= $reservation['id']; ?>">Verwijderen</a></button></td>

        </tr>
    <?php } ?>
    </tbody>
</table>
</body>