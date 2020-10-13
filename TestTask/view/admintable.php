<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8" content="Admin Table for code-it">
    <title>Blog</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class>
    <h1>Admin panel</h1>
    <div>
<table>
    <tr>
        <th>Date</th>
        <th>Title</th>
        <th>Function</th>
    </tr>
   <? if(isset($blog))
    foreach($blog as $a):?>
    <tr>
    <td><?=$a['date']?></td>
    <td><?=$a['title']?></td>
    <td><input type="button" class="delete" value="Delete" onclick=location.href="../root/adm.php?action=delete&id=<?=$a['id']?>"></td>
    </tr>
    <?endforeach?>
</table>
        <input type="button"  class="exit" value="Exit" onClick='location.href="../model/logout.php"'>
    </div>
    <footer>
        <p>My admin panel @ Ruslan Romanov</p>
    </footer>
</div>
</body>
</html>