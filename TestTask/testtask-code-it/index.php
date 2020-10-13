<?php
require_once ("db.php");
require_once ("model/blogs.php");
$link = db_connect();
$blogs = blog_all($link);
include ("view/blogs.php");