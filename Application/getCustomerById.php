<?php
    require_once('mysql.class.php');
    require_once('global.inc.php');
    
	$id= $_GET["id"];
    $qry = "Select * from customer where id = '$id'";
    $result = mysql_query($qry);
    $customer = null;
    while($row = mysql_fetch_array($result)){
		$customer = $row;
    }
    
    echo json_encode($customer);
?>
