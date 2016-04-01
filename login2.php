<?php

if (!get_magic_quotes_gpc()) { 
$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);
}


$TableName = "`Register Fields`";

$link = mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 


mysql_select_db(reg_ister_13_info);
$exist = mysql_query("SELECT * FROM $TableName WHERE Email = '$email' AND Password = '$password'");
$row = mysql_fetch_array($exist);
if ($row) {
	if ($row['Confirmed'] == 'Yes') {
	mysql_close();
	session_start();
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['name'] = $row['Name of Church'];
	$_SESSION['rep'] = $row['Name of Representative']; 
	$_SESSION['address'] = $row['Church Address'];
	$_SESSION['phone'] = $row['Church Phone Number'];
	$_SESSION['city'] = $row['City'];
	$_SESSION['state'] = $row['State']; 
	$_SESSION['zip'] = $row['Zipcode']; 
	$_SESSION['conf'] = $row['Name of Annual Conference'];
	$_SESSION['pass'] = $row['Password'];
	$_SESSION['dis'] = $row['Name of District']; 
	$_SESSION['confirmed'] = $row['Confirmed'];
	$_SESSION['LAST_ACTIVITY'] = time();
	echo($_SESSION['city'] . "<br>");
	echo($_SESSION['state'] . "<br>");
	echo($_SESSION['email'] . "<br>");
	}
}
?>