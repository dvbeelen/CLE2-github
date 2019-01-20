<?php
    $db = mysqli_connect('localhost', 'root', '', 'db_pedicure');
    

    if (isset($_POST['submit'])) {

        $id = mysqli_escape_string($db, $_POST['íd']);
        $email = mysqli_escape_string($db, $_POST['email']);
        $firstname = mysqli_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_escape_string($db, $_POST['lastname']);
        $phonenumber = mysqli_escape_string($db, $_POST['phonenumber']);
        $apDate = mysqli_escape_string($db, $_POST['apDate']);
        $apTime = mysqli_escape_string($db, $_POST['apTime']);


        $query = "INSERT INTO reservations (email, firstname, lastname, phone, apDate, apTime) 
                  VALUES ('$email', '$firstname', '$lastname', '$phonenumber', '$apDate', '$apTime')";




        //Form validation: Check if input is empty
        if (empty($email) || empty($firstname) || empty($lastname) || empty($phonenumber) || empty($apDate) || empty($apTime)) {
            header('Location: apForm.php?signup=empty');
            exit();
        } else {
            //Form validation: Check if phonenumber is valid
            $num_length = strlen((string)$phonenumber);
            if($num_length <= 9 || $num_length >= 11) {
                header('Location: apForm.php?signup=invalidphone');
                exit();
            } else {
                //Form validation: Check if e-mail is not valid
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header('Location: apForm.php?signup=invalidemail');
                    exit();
                } else {
                    $result = mysqli_query($db, $query)
                    or die('Error: ' . $query);
                    if ($result) {
                        header('Location: apConfirm.php');
                    }
                }

            }
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
        <button class="navButton"><a href="adminLogin.php">Log In</a></button>
    </nav>
</header>

<div class= "appointForm">
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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

    if (strpos($url, "signup=empty")){
        echo "<p class='error'> U heeft een veld niet ingevuld </p>";
        exit();
    }
    elseif (strpos($url, "signup=invalidphone")){
        echo "<p class='error'> Dit telefoonnummer is te kort </p>";
        exit();
    }
    elseif (strpos($url, "signup=invalidemail")){
        echo "<p class='error'> Dit is geen juist e-mailadres </p>";
        exit();
    }

    ?>
</div>
<footer> </footer>
</body>