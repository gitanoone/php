<?php
function getCom($link,$num)
{
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $start = ($page - 1) * $num;
    $query = 'SELECT * FROM comtable';
    $result = mysqli_query($link, $query);
    $total_records = mysqli_num_rows($result);
    $total = ceil($total_records / $num);
    echo "<a href='index.php?page=1'>" . '<' . "</a> ";
    for ($i = 1; $i <= $total; $i++) {
        echo "<a href='index.php?page=" . $i . "'>" . $i . "</a> ";
    }
    echo "<a href='index.php?page=$total'>" . '>' . "</a> ";
    $sql = "SELECT  * FROM comtable ORDER by `date` DESC LIMIT $start, $num";
    $table_data = mysqli_query($link, $sql);
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        $sql = "UPDATE comtable set liked = liked +1 where `id` =" . $_POST['id'];
        mysqli_query($link, $sql);
    }
    while ($row = mysqli_fetch_array($table_data)) {
        echo "<div class='comment-box'><p>";
        echo $row['name'] . "<br>";
        echo $row['date'] . "<br>";
        echo $row['title'] . "<br>";
        echo $row['text_comment'] . "<br>";
        echo "Количество лайков:" . $row['liked'] . "<br>";
        echo "<form method='POST'><input type='hidden' name='id' value=" . $row['id'] . ">
<button type = 'submit' name='liked'>Like</button></form>";
        echo "<br></div>";
    }
    echo "<a href='index.php?page=1'>" . '<' . "</a> ";
    for ($i = 1; $i <= $total; $i++) {
        echo "<a href='index.php?page=" . $i . "'>" . $i . "</a> ";
    }
    echo "<a href='index.php?page=$total'>" . '>' . "</a> ";
    echo '<br>';
}
function getAnalytic($link){
$sql="SELECT * FROM `comtable` WHERE `title` LIKE 'Благодарность%'";
$result=mysqli_query($link,$sql);
$row=mysqli_num_rows($result);
$sql1="SELECT * FROM `comtable` WHERE `title` LIKE 'Предложение о улучшении сервиса%'";
$result1=mysqli_query($link,$sql1);
$row1=mysqli_num_rows($result1);
$sql2="SELECT * FROM `comtable` WHERE `title` LIKE 'Жалоба%'";
$result2=mysqli_query($link,$sql2);
$row2=mysqli_num_rows($result2);
if($row>$row2+$row1){
    echo 'Клиенты нас любят.';}
elseif($row2>$row+$row1) {
    echo 'Надо сжечь это место.';}
elseif($row2>=$row1 and $row2>=$row) {
    echo 'Пора меняться.';}
else{echo 'Нам надо совершенствоваться.';}
$sum=$row1+$row;
echo '<br>Количество позитивных отзывов: '.$sum;
echo '<br>Количество негативных отзывов: '.$row2;
}

