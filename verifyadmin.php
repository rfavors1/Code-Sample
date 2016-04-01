<?php session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();     // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}
if (!isset($_SESSION['admin'])) {
	header( 'Location: updated.php?page=verify');
}


$Email = $_SESSION['emaila'];
$Administrator = $_POST['verify'];
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


$query = "Update $TableName SET Admin = '$Administrator' WHERE Email = '$Email'";



$result = mysql_query($query);

if ($result) {
	
echo("<script>
<!--
location.replace('updated.php?page=administrator');
-->
</script>");

} else {
	echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
}

mysql_close();
?>