<?php
namespace App;

session_start();
$error = [];
$_SESSION = [];
$username = $arr[0]['name'];
$email = $arr[0]['email'];
$password = $arr[0]['password'];
$password2 = $arr[0]['password2'];
if (empty($username)) {
    array_push($error, 'enter user name');
} if (empty($email)) {
    array_push($error, 'enter email');
} if (empty($password)) {
    array_push($error, 'enter password');
} if (empty($password2)) {
    array_push($error, 'enter password in second filed also');
} if ($password != $password2) {
    array_push($error, 'enter same password in both filed');
}
if (count($error)==0) {
    $obj = new Database;
    $obj->query("INSERT INTO users (user_name, email, password, role, status)
    VALUES ('$username', '$email', '$password', 'Admin', 'Approved')");
    $obj->execute();
    header('location:../pages/sigin');
} else {
    $_SESSION['errors'] = $error;
    header('location:../pages/signup');
}
