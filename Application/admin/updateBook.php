<?php
    require_once('../mysql.class.php');
    require_once('../global.inc.php');
    
    $data = $_POST;
    $filename = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    if($fileSize > 0 || $fileError == 0){ //check if the file is corrupt or error
        $move = move_uploaded_file($_FILES['image']['tmp_name'], '../../images/books/'.$filename); //save image to the folder
    }

    if($filename){
            $qry = "Update book set name = '$data[name]', kategori = '$data[kategori]', author='$data[author]',publisher ='$data[publisher]',
                    published = '$data[published]', sinopsi = '$data[sinopsi]', amount = '$data[amount]', stock = '$data[stock]', image= '$filename'
                    where id = '$data[id]'";
        }
    else{
            $qry = "Update book set name = '$data[name]', kategori = '$data[kategori]', author='$data[author]',publisher ='$data[publisher]',
                    published = '$data[published]', sinopsi = '$data[sinopsi]', amount = '$data[amount]', stock = '$data[stock]'
                    where id = '$data[id]'";
        }
    
    $result = mysql_query($qry);
    header("location:/meh-hil/views/admin/book.php");
?>
