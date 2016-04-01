<?php session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();     // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}
if (!isset($_SESSION['email'])) {
	header( 'Location: updated.php?page=delete');
}

$TableName = "`Register Fields`";
$Table = "Assistance";
$up = 'Yes';

$link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
   echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>"); 
} 

mysql_select_db(reg_ister_13_info);

$Useremail =  $_SESSION['email'];
$query = "Update $TableName SET Deleted = '$up', DateDelete = CURDATE() WHERE EMAIL = '$Useremail'";
$q = "Update $Table SET Deleted = '$up' DateDelete = CURDATE() WHERE EMAIL = '$Useremail'";
$result = mysql_query($query);
$r= mysql_query($q);
mysql_close();
if($result){
    session_destroy();   // destroy session data in storage
    session_unset();
	header( 'Location: updated.php?page=deleted'); 
} else {
	header( 'Location: updated.php?page=error'); 
}
 ?>