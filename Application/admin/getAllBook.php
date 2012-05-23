<?php
    require_once('../mysql.class.php');
    require_once('../global.inc.php');
    
    $qry = "SELECT *, (select name from kategori where id = book.kategori) as kategoriname FROM book";
    $result = mysql_query($qry);
    $book = array();
    while($row = mysql_fetch_array($result)){
        array_push($book, $row);
    }
    echo json_encode($book);
?>
