<?php
    require_once('../mysql.class.php');
    require_once('../global.inc.php');
    
    $name = $_POST['categoryName'];
    $result = mysql_query("Select count(*) as name from kategori where name = '$name'");
    if($result){
        if($row = mysql_fetch_array($result)){
            if($row[name] == 0){
                $qry = "insert into kategori (name) values ('$name')";
                $result = mysql_query($qry);
                header("Location:/meh-hil/views/admin/category.php");
            }
            else
            {
                header("Location:/meh-hil/views/admin/category.php?errora='Ada buku yang menggunakan kategori ini'");
            }
        }
    }
    
?>

