<?php
session_start();

//Connect to database
$db = mysqli_connect('sql.hosted.hr.nl', '0959940', 'goleodou', '0959940');

//If user is already logged in, this page is skipped.
if (isset($_SESSION['login'])) {
    header("Location: apOverview.php");
    exit;
}
//If form is posted, the given user-information is validated.
if (isset($_POST['submit'])) {

    //Retrieve values
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    //Get password & name from DB
    $query = "SELECT id, password FROM users
              WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    //Check if email exists in database
    $errors = [];
    if ($user) {
        //Validate password
        if (password_verify($password, $user['password'])) {
            //Set email for later use in Session
            $_SESSION['login'] = [
                'name' => $user['name'],
                'id' => $user['id']
            ];
            //Redirect to appointment overview & exit script
            header("Location: apOverview.php");
            exit;
            //If password is incorrect, this message is shown.
        } else {
            $errors[] = 'Uw wachtwoord is onjuist';
        }
        //If given e-mail is incorrect or doesn't exist in the database, this message is shown.
    } else {
        $errors[] = 'Er bestaat geen account dat aan dit e-mailadres gekoppeld is';
    }
}
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
</header>

<div class= "appointForm">
    <form class="form" action="<<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>" method="post">
        <label for="email" >E-mail: </label> <br>
        <input type="email" id="email" name="email" value="<?= isset($email) ? $email : '' ?>"> <br>

        <label for="firstname">Wachtwoord:</label> <br>
        <input type="password" id="password" name="password" value="<?= isset($firstname) ? $firstname : '' ?>"> <br>


        <div class="data-submit">
            <input class ="sendButton" type="submit" name="submit" value="Log in"/>
        </div>
    </form>
</div>