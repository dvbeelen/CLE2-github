<?php
if (isset($_POST['submit'])) {
//Require database in this file & image helpers
    $db = mysqli_connect('sql.hosted.hr.nl', '0959940', 'goleodou', '0959940');
//Postback with the data showed to the user, first retrieve data from 'Super global'
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);
//Special check for add form only
    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO users (email, password)
                  VALUES ('$email', '$password')";
        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);
        if ($result) {
            header('Location: apOverview.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="email" value=""/>
    <input type="password" name="password" value=""/>
    <input type="submit" name="submit" value="Verzenden"/>
</form>
</body>
</html>