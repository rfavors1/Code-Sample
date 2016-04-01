<?php session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();     // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}
if (!isset($_SESSION['email'])) {
	header( 'Location: updated.php?page=update');
}

$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$TableName = "`Register Fields`";
$Email = $_SESSION['email'];

$oldpassword= stripslashes($oldpassword);
$oldpassword = str_replace("'","&#39;",$oldpassword);
$newpassword= stripslashes($newpassword);
$newpassword = str_replace("'","&#39;",$newpassword);

$link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
      echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>"); 
} 

mysql_select_db(reg_ister_13_info);

$exist = mysql_query("SELECT * FROM $TableName WHERE Email = '$Email'");
$row = mysql_fetch_array($exist);

if  (!$row) {
header( 'Location: updated.php?page=error') ;	

}
else {
	if ($row['Password'] == $oldpassword) {

$query = "UPDATE $TableName SET Password = '$newpassword' WHERE Email = '$Email'";

$result = mysql_query($query);

mysql_close();

if ($result) {

$_SESSION['Pass'] = $newpassword;

$EmailFrom = "info@UGiftIt.org";
$subject = "Password Change - UGiftIt.org";
$mailhead = "From: $EmailFrom\n";
$email_message .= "Your password has been changed.\n\nIf you did not change your password, please visit UGiftIt.org to verify your password.";
mail($Email,$subject,$email_message, $mailhead);
echo("<script>
<!--
location.replace('updated.php?page=password');
-->
</script>");

}
}else {
	
echo("<script>
<!--
location.replace('changepassword.php?valid=no');
-->
</script>");
}
}


?>