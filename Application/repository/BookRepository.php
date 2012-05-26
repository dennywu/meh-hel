<?php
    function getBooks($offset){
        $qry = "Select * from book where stock > 0 limit 10 offset $offset";
        $result = mysql_query($qry);
        $books = array();
        while($row = mysql_fetch_array($result)){
            array_push($books, $row);
        }
        return $books;
    }
    function getBookById($id){
        $qry = "SELECT *, (select name from kategori where id = book.kategori) as kategoriname FROM book where id = '$id'";
        $result = mysql_query($qry);
        $book;
        while($row = mysql_fetch_array($result)){
            $book = $row;
        }
        return $book;
    }
    function getBookByCategory($category,$offset){
        $qry = "Select * from book where kategori = '$category' and stock > 0 limit 10 offset $offset";
        $result = mysql_query($qry);
        $books = array();
        while($row = mysql_fetch_array($result)){
            array_push($books, $row);
        }
        return $books;
    }
    function countBook($category){
        if($category == ''){
            $qry = "select count(*) as total from book where stock > 0";
        }
        else{
            $qry = "select count(*) as total from book where stock > 0 and kategori = '$category'";
        }
        $result = mysql_query($qry);
        $total;
        while($row = mysql_fetch_array($result)){
            $total = $row[total];
        }
        return $total;
    }
    function getCategory(){
        $qry = "Select * from kategori";
        $result = mysql_query($qry);
        $kategori = array();
        while($row = mysql_fetch_array($result)){
            array_push($kategori, $row);
        }
        return $kategori;
    }
?>
