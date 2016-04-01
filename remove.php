<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();     // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}

if ((isset($_SESSION['cart']))) {


$ID = $_GET['ID'];
$temp = array();
array_push($temp,$ID);

$cart = $_SESSION['cart'];

$result = array_merge(array_diff($cart,$temp));
$_SESSION['cart'] = $result;
$_SESSION['cartcount'] = count($_SESSION['cart']);
if (count($_SESSION['cart']) == 0) {
	unset($_SESSION['cart']);
	unset($_SESSION['cartcount']);
}
header( 'Location: cart.php?deleted=yes');

}

?>