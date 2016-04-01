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

$Name = $_POST['name'];
$Rep = $_POST['Rep'];
$Address = $_POST['Address'];
$City = $_POST['City'];
$State = $_POST['state'];
$Zip = $_POST['Zip'];
$Telephone = $_POST['telephone'];
$Email = $_POST['email'];
$NewEmail = $_POST['newemail'];
$Dis = $_POST['Dis'];
$Conf = $_POST['conf'];
$Confirmed = 'Yes';
$TableName = "`Register Fields`";

$Name= stripslashes($Name);
$Name = str_replace("'","&#39;",$Name);
$Rep= stripslashes($Rep);
$Rep = str_replace("'","&#39;",$Rep);
$Address= stripslashes($Address);
$Address = str_replace("'","&#39;",$Address);
$City= stripslashes($City);
$City = str_replace("'","&#39;",$City);
$Dis= stripslashes($Dis);
$Dis = str_replace("'","&#39;",$Dis);
$Conf= stripslashes($Conf);
$Conf = str_replace("'","&#39;",$Conf);
$NewEmail= stripslashes($NewEmail);
$NewEmail = str_replace("'","&#39;",$NewEmail);

$link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} 

mysql_select_db(reg_ister_13_info);

if($Email != $NewEmail){
$exist = mysql_query("SELECT * FROM $TableName WHERE Email = '$NewEmail'");
$row = mysql_fetch_array($exist);

if  ($row) {
header( 'Location: update.php?valid=No') ;	

}
else {
$Confirmed = "No";
$query = "Update $TableName SET `Name of Church` = '$Name', `Name of Representative` = '$Rep', `Church Address` = '$Address',City = '$City', State = '$State', Zipcode = '$Zip', `Church Phone Number` = '$Telephone', Email = '$NewEmail', `Name of District` = '$Dis',`Name of Annual Conference` = '$Conf',Confirmed = '$Confirmed' WHERE Email = '$Email'";



$Table = "`Assistance`";
$q = "UPDATE $Table SET Email = '$NewEmail' WHERE Email = '$Email'";

$result = mysql_query($query);
$r = mysql_query($q);
if (!$result) { 
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} 
if (!$r) { 
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} 

    session_destroy();   // destroy session data in storage
    session_unset();

$EmailFrom = "info@UGiftIt.org";
$subject = "Confirm E-mail - UGiftIt.org";
$mailhead = "From: $EmailFrom\n";
$email_message .= "Please click on the following link to  confirm your new e-mail address: UGiftIt.org/confirm.php?email=" . $NewEmail;
mail($NewEmail,$subject,$email_message, $mailhead);
echo("<script>
<!--
location.replace('updated.php?page=new');
-->
</script>");

}
}else {
	
$query = "Update $TableName SET `Name of Church` = '$Name', `Name of Representative` = '$Rep', `Church Address` = '$Address',City = '$City', State = '$State', Zipcode = '$Zip', `Church Phone Number` = '$Telephone', Email = '$NewEmail', `Name of District` = '$Dis',`Name of Annual Conference` = '$Conf',Confirmed = '$Confirmed' WHERE Email = '$Email'";

$result = mysql_query($query);

if (!$result) { 
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} 

	$_SESSION['email'] = $NewEmail;
	$_SESSION['name'] = $Name;
	$_SESSION['rep'] = $Rep; 
	$_SESSION['address'] = $Address;
	$_SESSION['phone'] = $Telephone;
	$_SESSION['cityu'] = $City;
	$_SESSION['stateu'] = $State; 
	$_SESSION['zip'] = $Zip; 
	$_SESSION['conf'] = $Conf;
	$_SESSION['dis'] = $Dis; 
	$_SESSION['confirmed'] = 'Yes';
	
$EmailFrom = "info@UGiftIt.org";
$subject = "Account Changes - UGiftIt.org";
$mailhead = "From: $EmailFrom\n";
$email_message .= "Your account information information has been updated.\n If you did not make these changes, Please visit UGiftIt.org to verify your information is correct.";
mail($NewEmail,$subject,$email_message, $mailhead);

echo("<script>
<!--
location.replace('updated.php?page=updated');
-->
</script>");
}

mysql_close();
?>