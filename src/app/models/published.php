<?php
namespace App;

$error = [];
$title = $arr[0]['title'];
$content = $arr[0]['content'];
if (empty($title)) {
    array_push($error, 'enter Title of the blog');
} if (empty($content)) {
    array_push($error, 'enter Content of the blog');
}
if (count($error)==0) {
    $userId = $_SESSION['user_id'];
    $name = $_SESSION['name'];
    $obj = new Database;
    $obj->query("INSERT INTO blogs (user_id, user_name, title, content, status)
    VALUES ('$userId', '$name', '$title', '$content', 'Approved')");
    $obj->execute();
    if ($_SESSION['role']=='Admin') {
        header('location:blogs');
    } else {
        header('location:userBlogs');
    }
} else {
    $_SESSION['errors'] = $error;
    header('location:writeBlog');
}
