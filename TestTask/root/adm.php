<?php
require_once("../db.php");
require_once("../model/blogs.php");
$link = db_connect();
if (isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "";
if ($action == "delete") {
    $id = $_GET['id'];
    $blog = blog_delete($link, $id);
    include('../admin.php');
} else {
    $blog = blog_all($link);
    include("../view/admintable.php");
}