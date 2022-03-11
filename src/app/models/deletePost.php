<?php

use App\Database;

$obj = new Database;
$obj->query("DELETE FROM blogs WHERE blog_id='$arr'");
$obj->execute();
