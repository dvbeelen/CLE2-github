<?php
session_start();
//Check if post isset

if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Security checks Tip: make this way more secure!
    if($email == "" || $password == ""){
        $error = "Vul beide gegevens in!";
    }

    elseif($email!= "info@didyooms.nl" || $password != "wachtwoord"){
        $error = "Combinatie gebruikersnaam /wachtwoord onjuist";
    }

    if (!isset($error)){
        $_SESSION['login'] = $email;
    }
}
// Am i logged in? Please go to secure page

if (isset($_SESSION['login'])){
    header('Location: apOverview.php');
    exit;
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
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email" >E-mail: </label> <br>
        <input type="email" id="email" name="email" value="<?= isset($email) ? $email : '' ?>"> <br>

        <label for="firstname">Wachtwoord:</label> <br>
        <input type="password" id="password" name="password" value="<?= isset($firstname) ? $firstname : '' ?>"> <br>


        <div class="data-submit">
            <input id ="sendButton" type="submit" name="submit" value="Log in"/>
        </div>
    </form>
</div>