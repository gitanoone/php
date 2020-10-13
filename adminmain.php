<?php
session_start();
if(!$_SESSION['admin']) die ("Доступ закрыт");
?>