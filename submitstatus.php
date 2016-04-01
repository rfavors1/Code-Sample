<?php session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();   // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}
if (!isset($_SESSION['email'])) {
	header( 'Location: updated.php?page=request');
}

$TableName = "`Assistance`";
$ID = $_POST['ID'];
$User = $_SESSION['email'];
$Status = $_POST['Status'];

$link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>"); 
} 

mysql_select_db(reg_ister_13_info);

$result = mysql_query($query);

$query = "UPDATE $TableName SET Status = '$Status' WHERE ID = '$ID'";

$result = mysql_query($query);
mysql_close();
if($result){


echo("<script>
<!--
location.replace('myrequests.php');
-->
</script>");
}

else {
location.replace('updated.php?page=error');	
}

?> 
