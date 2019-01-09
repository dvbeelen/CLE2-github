<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($email == "") {
    $errors['email'] = 'Dit veld kan niet leeg zijn';
}
if ($firstname == "") {
    $errors['firstname'] = 'Dit veld kan niet leeg zijn';
}
if ($lastname == "") {
    $errors['lastname'] = 'Dit veld kan niet leeg zijn';
}
if (!is_numeric($phonenumber) || strlen($phonenumber) != 10) {
    $errors['phone'] = 'Een telefoonnummer moet 10 cijfers lang zijn';
}
// this error message wil overwrite the previous error when year is empty
if ($phonenumber == "") {
    $errors['phone'] = 'Dit veld kan niet leeg zijn';
}
// this error message wil overwrite the previous error when tracks is empty
if ($apDate == "") {
    $errors['date'] = 'Dit veld kan niet leeg zijn';
}
if ($apTime == "") {
    $errors['time'] = 'Dit veld kan niet leeg zijn';
}

