<?php $host = 'testtask';
$database = 'db';
$user = 'root';
$password = '';
$link=mysqli_connect($host,$user,$password,$database)
or die("Error:".mysqli_error($link));
session_start();
if(isset($_POST["login"])){
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $username=($_POST['username']);
        $password=($_POST['password']);
        $query = mysqli_query($link,"SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'");
        $num = mysqli_num_rows($query);
        if($num!=0)
        {
            while($row=mysqli_fetch_assoc($query))
            {
                $dbuser=$row['username'];
                $dbpassword=$row['password'];
            }
            if($username == $dbuser && $password == $dbpassword)
            {$_SESSION['session_username']=$username;
            header('Location:admin');
            }
        } else {
           echo"<p class='p'>INVALID LOGIN OR PASSWORD, PLEASE TRY AGAIN<p>";
        }
    } else {
        echo "<p class='p'>INVALID LOGIN OR PASSWORD, PLEASE TRY AGAIN</p>";
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" content="Login Admin Table">
    <title> Admin Panel</title>
    <link href="../style.css" media="screen" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container-login">
    <div id="login">
        <h1>Login admin panel</h1>
        <form action="" id="login" method="post" name="login">
            <p><label for="user_login">User name<br>
                    <input class="input" id="username" name="username" size="20"
                           type="text" value=""></label></p>
            <p><label for="user_pass">Password <br>
                    <input class="input" id="password" name="password" size="20"
                           type="password" value=""></label></p>
            <input class="button" name="login" type= "submit" value="Log In">
                <input type="button" class="exit" value="Exit" onClick='location.href="../model/logout.php"'>
        </form>
    </div>
</div>
<footer>
    <p>My first blog</p>
</footer>
</body>
</html>