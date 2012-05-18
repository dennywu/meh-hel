<?php
error_reporting(E_WARNING);
// Include MySQL class
require_once('mysql.class.php');
// Include database connection
require_once('global.inc.php');
function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return '0 Buku.';
	} else {
		// Parse the cart session variable
		//$items = explode(',',$cart);
		//$s = (count($items) > 1) ? 's':'';
		return "<a href='rentalcart.php' id='haveItemInCart'>".count($cart)." Buku.</a>";
	}
}

function showCart() {
	global $db;
	$cart = $_SESSION['cart'];
	if (count($cart)) {
                $items = $cart;
		//$items = explode(',',$cart);
		//$contents = array();
		//foreach ($items as $item) {
		//	$contents[$item["id"]] = (isset($contents[$item["id"]])) ? $contents[$item["id"]] + 1 : 1;
		//}
		foreach ($items as $item) {
			$sql = 'SELECT * FROM book WHERE id = '.$item["id"];
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
                        $output[] = "
                        
                        <form action='/meh-hil/Application/cart.php?action=update' method='post'>
                        <tr>
                        <td width='60px'><a><img class='small-product' src='http://www.gramediashop.com/images/preview/9786020026435.jpg'></a></td>
                        <td>
                            <div class='detail-product'>
                                <span class='title-product'>".$name."</span></br>
                                <span class='font10 c_abu'>".$author."</span></br></br>
                                <span class='font10 c_abu'>".$publisher."</span></br>
                                <span class='font10 c_abu'>Publisher: ".$published."</span></br>
                            </div>
                        </td>
                        <td>
                            <div class='text-right'>".convertCurr($amount)."</div>
                        </td>
                        <td>
                            <div class='text-right'>
                                <input class='qty' type='number' name='qty' min='1' value='".$item["qty"]."'/>
                            </div>
                        </td>
                        <td>
                            <div class='text-right'>
                                <input class='hari' type='number' name='hari' min='1' value='".$item["hari"]."'/> Hari
                            </div>
                        </td>
                        <td>
                            <div class='text-right'>".convertCurr(($amount * $item["qty"])* $item["hari"])."</div>
                        </td>
                        <td>
                                <input type='hidden' name='id' value='".$item["id"]."'/>
                                <div class='text-right'><button type='submit' style='font-size: 9px;'>Update</button></div>
                            
                        </td>
                        <td>
                            <div class='text-right'><a class='remove' href='/meh-hil/Application/cart.php?action=delete&id=".$item["id"]."' title='Hapus Barang'>X</a></div>
                        </td>
                    </tr></form>";
			$total += ($amount * $item["qty"] * $item["hari"]);
		}
		$output[] = '<tr><td colspan="8"><div class="text-right">Total Akhir : <strong>'.convertCurr($total).'</strong></div></td></tr>';
                $output[] = '<tr><td colspan="8"><div class="text-right">
                            <button type="submit" id="btncheckout" >CheckOut</button>
                            </div></td></tr>';
	} else {
		$output[] = '<tr><td colspan="8" align="center";><p>Keranjang penyewaan anda Kosong.</p></td></tr>';
	}
	return join('',$output);
}
?>