<?php 
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();     // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}


$Email = $_GET['email'];

$link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
   echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} 
mysql_select_db(reg_ister_13_info);

$Confirmed = "Yes";
$TableName = "`Register Fields`";

$query = "UPDATE $TableName SET Confirmed = '$Confirmed' WHERE Email = '$Email'";

$result = mysql_query($query);

mysql_close();
if (!$result) { 
   echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} else {

echo("<script>
<!--
location.replace('updated.php?page=confirmed');
-->
</script>");
}

mysql_close();
?>