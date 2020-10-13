<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8" content="My blog for code-it">
    <title>Blog</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>First blog</h1>
    <input type="button" class="AdminPanel" value="Admin Panel" onClick='location.href="login"'>
    <div>
        <?php foreach($blogs as $a):?>
        <div class="blog">
            <h3><?=$a['title']?></a></h3>
            <em>Date:<?=$a['date']?></em>
            <p><?=$a['content']?></p>
        </div>
        <?endforeach?>
    </div>
    <footer>
        <p>My first blog</p>
    </footer>
</div>
</body>
</html>