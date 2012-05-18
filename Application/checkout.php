<?php
    session_start();
    require_once('mysql.class.php');
    require_once('global.inc.php');
    global $db;
    
    createRental($db);
    
    function createRental($db){
        $custid = insertCustomer();
        $total = total();
        $norental = uniqid();
        $rentalid = uniqid();
        $qry = "INSERT INTO rental (id, norental, custid, rentaldate,expiredate, total, status)
                values ('$rentalid','$norental','$custid',NOW(),DATE_ADD(NOW(), INTERVAL 24 HOUR),'$total','Booking')";
        $result = mysql_query($qry);
        if($result){
            createRentalDetail($rentalid, $db);
            unset($_SESSION['cart']);
        }
    }
    
    function createRentalDetail($rentalid, $db){
        $items = $_SESSION['cart'];
        foreach ($items as $item) {
            $sql = 'SELECT * FROM book WHERE id = '.$item["id"];
            $result = $db->query($sql);
            $row = $result->fetch();
            extract($row);
            $total = ($amount * $item["qty"] * $item["hari"]);
            $qry = "INSERT INTO rentaldetail (rentalid, name, qty, term, total)
                    values ('$rentalid','$name','$item[qty]','$item[hari]', '$total')";
            mysql_query($qry);
        }
    }
    
    function insertCustomer(){
        $name = $_POST["name"];
        $title = $_POST["title"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $telp = $_POST["telp"];
        $email = $_POST["email"];
        $id = uniqid();
        
        $qrycust = "INSERT INTO customer (id, title, name, address, city, state,telp, email) 
                    values ('$id' ,'$title', '$name', '$address', '$city', '$state', '$telp', '$email')";
        $result = mysql_query($qrycust);
        if($result)
            return $id;
        return null;
    }
    function total(){
        global $db;
        $items = $_SESSION['cart'];
        $total = 0;
        foreach ($items as $item) {
            $sql = 'SELECT * FROM book WHERE id = '.$item["id"];
            $result = $db->query($sql);
            $row = $result->fetch();
            extract($row);
            $total += ($amount * $item["qty"] * $item["hari"]);           
        }
        return $total;
    }
?>
