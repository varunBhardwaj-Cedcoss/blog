<?php
namespace App;

$error = [];
$email = $arr[0]['email'];
$password = $arr[0]['password'];
if (empty($email)) {
    array_push($error, 'enter email');
}
if (empty($password)) {
    array_push($error, 'enter password');
}
if (count($error)==0) {
    $obj = new Database;
    $obj->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $result = $obj->resultSet();
    if (count($result)==0) {
        /* print_r($result); */
        array_push($error, 'not a valid user email or password');
    } else {
        $_SESSION['user_id'] = $result[0]['user_id'];
        $_SESSION['role'] = $result[0]['role'];
        $_SESSION['name'] = $result[0]['user_name'];
        $_SESSION['email'] = $result[0]['email'];
       /*  print_r($result);
        print_r($_SESSION['user_id']); */
        header('location:dashboard');
    }
} else {
    $_SESSION['errors'] = $error;
    header('location:signin');
}
