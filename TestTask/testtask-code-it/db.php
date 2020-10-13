<?php
function db_connect(){
    $host = 'testtask';
    $database = 'db';
    $user = 'root';
    $password = '';
    $link=mysqli_connect($host,$user,$password,$database)
        or die("Error:".mysqli_error($link));
    if(!mysqli_set_charset($link,"utf8")){
        printf("Error".mysqli_error($link));
    }
    return $link;
}
