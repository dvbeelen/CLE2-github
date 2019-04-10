<?php
session_start();

//Session is destroyed, user is logged out.
session_destroy();

header("Location:adminLogin.php")
?>