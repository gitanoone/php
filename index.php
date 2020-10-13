<?php
include 'dbcon.php';
date_default_timezone_set('Europe/Kiev');
$num = $_POST['num'];
$num_1 = $_POST['num_1'];
$summ = $_POST['summ'];
$summa = $num + $num_1;
if ($summ == $summa) {
    if (isset($_POST['commentSubmit'])) {
        $name = $_POST["name"];
        $page_id = $_POST["page_id"];
        $title = $_POST["title"];
        $text_comment = $_POST["text_comment"];
        $date = $_POST["date"];
        $like = $_POST["like"];
        $query = "INSERT INTO `comtable` (`page_id`, `name`,`title`, `text_comment`,`date`) VALUES ('$page_id','$name','$title','$text_comment','$date')";
        $link->query($query);
        header('location:/');
    }
}
else echo "<p>Неправильная сумма, пожалуйста, попробуйте еще раз</p>";
?>
<!DOCTYPE HTML>
<html lang="eng">
<script type="text/javascript">
    var likes =0;
    function like() {
        document.getElementById('show').innerHTML=likes;
        likes=likes+1;
    }
</script>
<head>
    <meta charset="utf-8">
    <title>Test Task</title>
    <link rel="stylesheet" type="text/css" href="style.css">
   <form method='POST' action=''>
  <p>
    <label>ФИО*:</label>
      <label>
          <input type='text' name='name' required />
      </label>
  </p>
       <p> Тематика*:
           <label class='container'>Благодарность
               <input type='radio' name='title' value='Благодарность' required/>
           </label>
           <label class='container'>Предложение о улучшении сервиса
               <input type='radio' name='title' value='Предложение о улучшении сервиса' required/>
           </label>
           <label class='container'>Жалоба
               <input type='radio' name='title' value='Жалоба' required/>
           </label>
       </p>
  <p>
    <label>Комментарий:</label>
    <br/>
      <label>
          <textarea name='text_comment' cols='50' rows='10' required></textarea>
       <p>
       </p>
       <input type='hidden' name='page_id' value=''/>
       <label>
           <input type='hidden' name='date' value='<?=date('Y-m-d H:i:s')?>'>
       </label>
       <p><input type="file" name="photo" multiple accept="image/jpeg,image/png"></p>
       <p>Пожалуйста, введите сумму любых двух чисел:</p>
       <table><tr><td ><input type="text" name="num" placeholder="Число" required class="captch">+</td>
           <td><input type='text' name='num_1' placeholder='Число' required class="captch">=</td>
           <td><input type='text' name='summ' placeholder='Сумма' required class="captch"</td></tr></table>
           <button type='submit' name='commentSubmit'>Отправить</button>
</form>
</head>
<body>
<button id="button" onclick="like()" name="like">like</button>
<p id='show'></p>
<?php
$num=7;
if (isset($_GET["page"]))
{
    $page  = $_GET["page"];
}
else {
    $page=1;
}
$start = ($page-1) * $num;
$query = 'SELECT * FROM comtable';
$result = mysqli_query($link,$query);
$total_records = mysqli_num_rows($result);
$total = ceil($total_records / $num);
echo "<a href='index.php?page=7'>".'|<'."</a> ";
for ($i=1; $i<=$total; $i++)
{
    echo "<a href='index.php?page=".$i."'>".$i."</a> ";
}
echo "<a href='index.php?page=$total'>".'>|'."</a> ";
    $sql = "SELECT  * FROM comtable ORDER by `date` DESC LIMIT $start, $num";
    $table_data=  mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($table_data)) {
        echo "<div class='comment-box'><p>";
                echo $row['name'] . "<br>";
                echo $row['date'] . "<br>";
                echo $row['title'] . "<br>";
                echo $row['text_comment'] . "<br>";
                echo "</p></div>";
    }
echo "<a href='index.php?page=1'>".'|<'."</a> ";
for ($i=1; $i<=$total; $i++)
{
    echo "<a href='index.php?page=".$i."'>".$i."</a> ";
}
echo "<a href='index.php?page=$total'>".'>|'."</a> ";
?>
</body>
</html>