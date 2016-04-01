<?php

if (!get_magic_quotes_gpc()) { 
$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);
}


$TableName = "`Register Fields`";

$link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
    	echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} 


mysql_select_db(reg_ister_13_info);
$exist = mysql_query("SELECT * FROM $TableName WHERE Email = '$email' AND Password = '$password'");
$row = mysql_fetch_array($exist);

if ($row) {
	if ($row['Deleted'] == 'Yes') {
		header( 'Location: updated.php?page=invalid');
	}
	if ($row['Confirmed'] == 'Yes') {
		if ($row['Verified'] == 'Yes') {
	session_start();
	if ($row['Admin'] == 'Yes') {
	 $_SESSION['admin'] = 'Yes';
	}
	$count = $row['LogIn'];
	$count++;
	$query = "Update $TableName SET LogIn = '$count' WHERE Email = '$email'";
	$result = mysql_query($query);
	mysql_close();
	
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['name'] = $row['Name of Church'];
	$_SESSION['rep'] = $row['Name of Representative']; 
	$_SESSION['address'] = $row['Church Address'];
	$_SESSION['phone'] = $row['Church Phone Number'];
	$_SESSION['cityu'] = $row['City'];
	$_SESSION['stateu'] = $row['State']; 
	$_SESSION['zip'] = $row['Zipcode']; 
	$_SESSION['conf'] = $row['Name of Annual Conference'];
	$_SESSION['pass'] = $row['Password'];
	$_SESSION['dis'] = $row['Name of District']; 
	$_SESSION['confirmed'] = $row['Confirmed'];
	$_SESSION['LAST_ACTIVITY'] = time();
	if ($_SESSION['page'] == "assistance") {
		unset($_SESSION['page']);
		header( 'Location: assistance.php');
	} elseif ($_SESSION['page'] == "update") {
		unset($_SESSION['page']);
		header( 'Location: update.php');
	} elseif ($_SESSION['page'] == "delete") {
		unset($_SESSION['page']);
		header( 'Location: delete.php');
	} elseif ($_SESSION['page'] == "request") {
		unset($_SESSION['page']);
		header( 'Location: assistance.php');
	} elseif ($_SESSION['page'] == "deletingrequest") {
		unset($_SESSION['page']);
		header( 'Location: myrequests.php');
	} elseif ($_SESSION['page'] == "viewrequest") {
		unset($_SESSION['page']);
		header( 'Location: myrequests.php');
	}else {
		header( 'Location: index.php');
	}
	} else  {
		header( 'Location: updated.php?page=notverified');
	}	
	
  } else {
		header( 'Location: updated.php?page=not');
  }
} else {
	header( 'Location: updated.php?page=invalid');
}
?>