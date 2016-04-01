<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();     // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}

if (!(isset($_SESSION['cart']))) {
$cart = array();	
}

$ID = $_SESSION['addtocart'];
$i = 0;
$array = array();
$array = $_SESSION['cart'];

if ((isset($_SESSION['cart']))) {
	while ($i != count($_SESSION['cart'])) {
	$temp = $array[$i];
		if($temp == $ID) {
			header( 'Location: ugiftit.php?ID=' . $ID . '&exist=yes');
$exist = 'yes';
		}
	$i++;
	}
} 
if (!($exist == 'yes')) {
array_push($cart,$ID);
$_SESSION['cart'] = $cart;
$_SESSION['cartcount'] = count($_SESSION['cart']);
$_SESSION['addedID'] = $ID; 
header( 'Location: ugiftit.php?ID=' . $ID);
}
?>