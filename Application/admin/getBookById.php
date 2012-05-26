<?php
    require_once('../mysql.class.php');
    require_once('../global.inc.php');
    
    $id = $_GET["id"];
    $qry = "SELECT *, (select name from kategori where id = book.kategori) as kategoriname FROM book where id = '$id'";
    $result = mysql_query($qry);
    $book;
    while($row = mysql_fetch_array($result)){
        $book = $row;
    }
    echo json_encode($book);
?>
