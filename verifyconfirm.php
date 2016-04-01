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


$Email = $_POST['email'];
$Verified = $_POST['verify'];
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


$query = "Update $TableName SET Verified = '$Verified' WHERE Email = '$Email'";



$result = mysql_query($query);

if ($result) {
	
	if($Verified == 'Yes') {

$EmailFrom = "info@UGiftIt.org";
$subject = "Account Verified - UGiftIt.org";
$mailhead = "From: $EmailFrom\n";
$email_message .= "Your account has been verified. You may now visit http://www.UGiftIt.org to log in.\n\nIf you have not already done so, Please visit the following link to  confirm your e-mail address: http://www.UGiftIt.org/confirm.php?email=" . $Email;
mail($Email,$subject,$email_message, $mailhead);

	} else {
$EmailF = "info@UGiftIt.org";
$sub = "Account Verification - UGiftIt.org";
$mailh = "From: $EmailF\n";
$email_mes .= "We are sorry but your account information could not be verified at this time. If you believe there has been an error, please visit http://www.UGiftIt.org/contact.php with questions."; 
mail($Email,$sub,$email_mes, $mailh);		
	}
echo("<script>
<!--
location.replace('updated.php?page=verified');
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