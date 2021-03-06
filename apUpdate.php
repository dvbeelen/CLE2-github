<?php
session_start();

//If user is not logged in, get redirected to log-in page.
if (!isset($_SESSION['login'])){
    header('Location: adminLogin.php');
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/vendor/autoload.php';

//include settings.php
require 'includes/settings.php';

//Connect to database.
$db = mysqli_connect($host, $dbUser, $dbPassword, $table);

if (isset($_POST['submit'])) {
    $apid = mysqli_escape_string($db, $_POST['id']);
    $firstname = mysqli_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_escape_string($db, $_POST['lastname']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $phonenumber = mysqli_escape_string($db, $_POST['phonenumber']);
    $apDate = mysqli_escape_string($db, $_POST['apDate']);
    $apTime = mysqli_escape_string($db, $_POST['apTime']);

    $reservation = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'phonenumber' => $phonenumber,
        'apDate' => $apDate,
        'apTime' => $apTime,
    ];
        //Update the record in the database
        $query = "UPDATE reservations
                  SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone = '$phonenumber', apDate = '$apDate', apTime = '$apTime'
                  WHERE id = '$apid'";
        $result = mysqli_query($db, $query);


        if ($result) {
            header('Location: apOverview.php');
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // or 58
                $mail->Username = $mailUser;                 // SMTP username
                $mail->Password = $mailPassword;                           // SMTP password


                //
                $mail->setFrom($mailUser, 'D van Beelen');
                $mail->addAddress($email, $firstname);


                //This is the body and content of the e-mail
                $mail->isHTML(true); // The e-mail is now sent in an HTML format
                $mail->Subject = 'Uw afspraak voor '.$apDate.'.'; //Subject of the e-mail
                $mail->Body ='Beste '.$firstname.', <br> <br>
                 U ontvangt deze mail ter bevestiging van uw afspraak. Uw afspraak staat gepland op '.$apDate.' om '.$apTime.' <br> <br>
                Als u uw afspraak wilt afzeggen of wijzijgen, kunt u contact met mij opnemen via het telefoonnummer  06-xxxxxxx <br> <br>
                Ik zie u graag binnenkort in de praktijk. <br> <br>
                Met vriendelijke groet, <br>
                Didy Pedicure';

                $mail->AltBody = 'Beste '.$firstname.', <br> <br>
                U ontvangt deze mail ter bevestiging van uw afspraak. Uw afspraak staat gepland op '.$apDate.' om '.$apTime.' <br> <br>
                Als u uw afspraak wilt afzeggen of wijzijgen, kunt u contact met mij opnemen via het telefoonnummer 06-xxxxxxxx <br> <br>
                Ik zie u graag binnenkort in de praktijk. <br> <br>
                Met vriendelijke groet, <br>
                Didy Pedicure';

                $mail->send();
//                            echo 'Message has been sent';
                } catch (Exception $e) {
//                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }

        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

} else {
    //Retrieve the id of the appointment 
    $apid = $_GET['id'];

    //Get the record from the database result
    $query = "SELECT * FROM reservations WHERE id = " . mysqli_escape_string($db, $apid);
    $result = mysqli_query($db, $query);
    $reservation = mysqli_fetch_assoc($result);
}
//Close connection
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
    <title>Afspraak wijzigen </title>
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
        <button class="navButton"><a href="apOverview.php">Afspraken overzicht</a></button>
    </nav>
</header>

<h2 id ='updateTitle'> Verander de afspraak </h2>
<div class= "appointForm">
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email" >E-mail:</label> <br>
        <input type="email" id="email" name="email" value="<?= $reservation['email'] ?>"> <br>

        <label for="firstname">Voornaam:</label> <br>
        <input type="text" id="firstname" name="firstname" value="<?= $reservation['firstname'] ?>"> <br>

        <label for="lastname">Achternaam: </label> <br>
        <input type="text" id="lastname" name="lastname" value="<?= $reservation['lastname'] ?>"> <br>

        <label for="phonenumber">Telefoonnummer:</label> <br>
        <input type="number" id="phonenumber" name="phonenumber" value="<?= $reservation['phone'] ?>"> <br>

        <label for="apDate">Kies een datum: </label> <br>
        <input type="date" id="apDate" name="apDate" value="<?= $reservation['apDate'] ?>"> <br>

        <label for="apTime">Kies een tijd: </label> <br>
        <select name="apTime">
            <option> Kies een tijd</option>
            <option> 09:00 </option>
            <option> 10:00 </option>
            <option> 11:00 </option>
            <option> 13:30 </option>
            <option> 14:30 </option>
            <option> 15:30 </option>
        </select>

        <div class="data-submit">
            <input type="hidden" name="id" value="<?= $apid; ?>"/>
            <input class ="sendButton" type="submit" name="submit" value="Verstuur"/>
        </div>
    </form>

</div>
</body>

