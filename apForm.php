<?php
//Call on PHPMailer Library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/vendor/autoload.php';

//include settings.php
require 'includes/settings.php';

//Connect to database
$db = mysqli_connect($host, $dbUser, $dbPassword, $table);

//If the form is submitted, the following tasks are performed
    if (isset($_POST['submit'])) {

        //Protects against SQL-injections
        $id = mysqli_escape_string($db, $_POST['id']);
        $email = mysqli_escape_string($db, $_POST['email']);
        $firstname = mysqli_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_escape_string($db, $_POST['lastname']);
        $phonenumber = mysqli_escape_string($db, $_POST['phonenumber']);
        $apDate = mysqli_escape_string($db, $_POST['apDate']);
        $apTime = mysqli_escape_string($db, $_POST['apTime']);


        //The filled-in POST-data is inserted into the database
        $query = "INSERT INTO reservations (email, firstname, lastname, phone, apDate, apTime) 
                  VALUES ('$email', '$firstname', '$lastname', '$phonenumber', '$apDate', '$apTime')";

        //Form validation: Check if any input-fields are empty
        if (empty($email) || empty($firstname) || empty($lastname) || empty($phonenumber) || empty($apDate) || empty($apTime)) {
            header('Location: apForm.php?signup=empty');
            exit();
        }
        //Form validation: Check if the given phonenumber is of valid length
        else {
            $num_length = strlen((string)$phonenumber);
            if($num_length <= 9 || $num_length >= 11) {
                header('Location: apForm.php?signup=invalidphone');
                exit();
            }

            //Form validation: Check if given e-mail is valid
            else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header('Location: apForm.php?signup=invalidemail');
                    exit();
                }

                //If form is filled in correctly, send result to database.
                else {
                    $result = mysqli_query($db, $query)
                    or die('Error: ' . $query);
                   //If result is send, user is redirected to confirmation page
                    if ($result)
                        header('Location: apConfirm.php');

                    //If result is send, an e-mail with the name, date and time from the fom is send to the given email
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

                        }
                    }
                }



    }
    //Close connection to database.
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
        <button class="navButton"><a href="adminLogin.php">Log In</a></button>
    </nav>
</header>

<div class= "appointForm">
<!-- Here, trough htmlspecialchars, the database is prevented from getting JS or HTML code injected into it. -->
    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="email" >E-mail:</label> <br>
        <input type="email" id="email" name="email" value="<?= isset($email) ? $email : '' ?>"> <br>

        <label for="firstname">Voornaam:</label> <br>
        <input type="text" id="firstname" name="firstname" value="<?= isset($firstname) ? $firstname : '' ?>"> <br>

        <label for="lastname">Achternaam: </label> <br>
        <input type="text" id="lastname" name="lastname" value="<?= isset($lastname) ? $lastname : '' ?>"> <br>

        <label for="phonenumber">Telefoonnummer:</label> <br>
        <input type="number" id="phonenumber" name="phonenumber" value="<?= isset($phonenumber) ? $phonenumber : '' ?>"> <br>

        <label for="apDate">Kies een datum: </label> <br>
        <input type="date" id="apDate" name="apDate" value="<?= isset($apDate) ? $apDate : '' ?>"> <br>

        <label for="apTime">Kies een tijd: </label> <br>
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

    <?php
    //Error Messages
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //Form validation: This is the message the user recieves if one or multiple fields are empty.
    if (strpos($url, "signup=empty")){
        echo "<p class='error'> U heeft een veld niet ingevuld </p>";
        exit();
    }
    //Form validation: This is the message the user recieves if the given phonenumber is too short or too long.
    elseif (strpos($url, "signup=invalidphone")){
        echo "<p class='error'> Dit telefoonnummer is te kort </p>";
        exit();
    }
    //Form validation: This is the message the user recieves if the given e-mail is invalid.
    elseif (strpos($url, "signup=invalidemail")){
        echo "<p class='error'> Dit is geen juist e-mailadres </p>";
        exit();
    }

    ?>
</div>
<footer> </footer>
</body>