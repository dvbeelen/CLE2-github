<?php
session_start();

if (!isset($_SESSION['login'])){
    header('Location: adminLogin.php');
    exit;
}

if (isset($_POST['submit'])) {
//Connect to database
    $db = mysqli_connect('sql.hosted.hr.nl', '0959940', 'goleodou', '0959940');

 
// The data filled in in the form is send to the database. 
    $email = mysqli_real_escape_string($db, $_POST['email']);

// Passwords are hashed before being put into the database, thus storing them safely in the database.
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);

//Save the record to the database
    $query = "INSERT INTO users (email, password)
                VALUES ('$email', '$password')";
    $result = mysqli_query($db, $query)
    or die('Error: ' . $query);

//Form validation: Check if any input-fields are empty
if (empty($email) || empty($password)){
    header('Location: addAdmin.php?signup=empty');
    exit();
}
//If the query is executed succesfully, the user is redirected to the overviewpage. 
    if ($result) {
        header('Location: apOverview.php');
        exit;

// If the query has not been excecuted correctly, the user recieves an error. 
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
            exit;
        //Close connection
        mysqli_close($db);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Bubbler+One" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin toevoegen</title>
</head>
<body>
<form id = "addAdmin"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <h2 id="addAdminTitle"> Nieuwe Admin-gebruiker toevoegen </h2>
    <p> Hier kunt u een nieuwe admin-gebruiker toevoegen. Deze nieuwe gebruiker heeft toegang tot het afsprakenoverzicht
        en heeft de bevoegdheid om de afspraken in dit overzicht te wijzigen of te verwijderen. </p>
    <input type="text" name="email" value=""/> <br>
    <input type="password" name="password" value=""/> <br>
    <input class="sendButton" type="submit" name="submit" value="verzenden"/>
</form>
</body>
</html>

<?php
 $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 //Form validation: This is the message the user recieves if one or multiple fields are empty.
 if (strpos($url, "signup=empty")){
     echo "<p class='error'> U heeft een veld niet ingevuld </p>";
     exit();
 }
?>