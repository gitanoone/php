<?php
require_once("db.php");
require_once("model/blogs.php");
$link=db_connect();
$blog=blog_all($link);
include("view/admintable.php");
