<?php
function blog_all($link){
 $query="SELECT * FROM blog ORDER BY 'id' DESC";
 $result=mysqli_query($link,$query);
 if (!$result)
     die(mysqli_error($link));
 $n=mysqli_num_rows($result);
 $blog=array();
 for ($i=0;$i<$n;$i++)
 {
     $row=mysqli_fetch_assoc($result);
     $blog[]=$row;
 }
 return $blog;
}
function blog_delete($link, $id){
    $id=(int)$id;
    if($id==0)
        return false;
    $query = sprintf("DELETE FROM blog WHERE id='%d'", $id);
    $result=mysqli_query($link,$query);
    if(!$result)
        die (mysqli_error($link));
    return mysqli_affected_rows($link);
}