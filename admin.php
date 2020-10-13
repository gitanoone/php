<!DOCTYPE html>
<html lang="eng">
<head>    <title>First blog</title>
</head>
<header>
    <?$id = $_GET[‘id’];
echo $id;
session_start();
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    {
        if ($row == 1) {
            echo 'Login successful';
            $_SESSION['login'] = $login;
            header('Location: ../admin/index.php');
        } else {
            echo 'login failed';
            header('location: ../view/login.php');
        }
    }
}
session_destroy()
?>
    <div class="container center-div">
         <div class="heading text-center text-uppercase text-white">ADMIN LOGIN PAGE</div>
        <div class="container row">
            <div class="admin-form">
                <form action="../admin/index.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="login" class="form-control" id="exampleInputEmail1"placeholder="Enter login">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    <button><a href="../model/logout.php">Exit</button>
                    </form>
            </div>
        </div>
</div>
</header>
<body>
</body>
</html>