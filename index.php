<?php
require_once 'db.php';
include 'add.php';
date_default_timezone_set('Europe/Kiev');
$num = $_POST['num'];
$num_1 = $_POST['num_1'];
$sum = $_POST['sum'];
$sum1 = $num + $num_1;
if ($sum ==$sum1) {
    if (isset($_POST['commentSubmit'])) {
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $title = $_POST["title"];
        $text_comment = $_POST["text_comment"];
        $date = $_POST["date"];
        $query = "INSERT IGNORE  INTO `comtable` (`user_id`, `name`,`title`, `text_comment`,`date`) VALUES ('$user_id','$name','$title','$text_comment','$date')";
        mysqli_query($link,$query);
        header('Location:/');
    }
}
else echo "<p>Неправильная сумма, пожалуйста, попробуйте еще раз</p>";
?>
<!DOCTYPE HTML>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <title>Test Task</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <form method='POST'>
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
          <input type='hidden' name='user_id' value="Аноним">
       <label>
           <input type='hidden' name='date' value='<?=date('Y-m-d H:i:s')?>'>
       </label>
       <p><input type='file' name='photo' multiple accept='image/jpeg,image/png'></p>
       <p>Пожалуйста, введите сумму любых двух чисел:</p>
       <table><tr><td ><label>
                       <input type='text' name='num' placeholder='Число' required '>
                   </label>+</td>
           <td><label>
                   <input type='text' name='num_1' placeholder='Число' required>
               </label>=</td>
           <td><label>
                   <input type='text' name='sum' placeholder='Сумма' required>
               </label></td></tr></table>
           <button type='submit' name='commentSubmit'>Отправить</button>
</form>
</head>
<body>
<?getCom($link, 7);
getAnalytic($link);?>
</body>
</html>


