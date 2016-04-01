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
$Type = $_POST['Type']; 
$ContactName = $_POST['ContactName'];
$ContactNumber = $_POST['ContactNumber'];
$ContactAddress = $_POST['ContactAddress'];
$ContactCity = $_POST['ContactCity'];
$ContactState = $_POST['ContactState'];
$ContactZip = $_POST['ContactZip'];
$ContactEmail = $_POST['ContactEmail'];
$Best = $_POST['Best'];
$Request = $_POST['Comment'];
$Account = $_POST['Account'];
$Amount = $_POST['Amount'];
$CompanyName = $_POST['CompanyName'];
$CompanyNumber = $_POST['CompanyNumber'];
$CompanyAddress = $_POST['CompanyAddress'];
$CompanyCity = $_POST['CompanyCity'];
$CompanyState = $_POST['CompanyState'];
$CompanyZip = $_POST['CompanyZip'];
$BillingName = $_POST['BillingName'];
$BillingDate = $_POST['BillingDate'];
$User = $_SESSION['email'];
$Status = 'Unfulfilled';
$newdate = substr($BillingDate,6,4) . "-" . substr($BillingDate,0,2) . "-" . substr($BillingDate,3,2);

$ContactName= stripslashes($ContactName);
$ContactName = str_replace("'","&#39;",$ContactName);
$ContactAddress= stripslashes($ContactAddress);
$ContactAddress = str_replace("'","&#39;",$ContactAddress);
$ContactCity= stripslashes($ContactCity);
$ContactCity = str_replace("'","&#39;",$ContactCity);
$ContactEmail= stripslashes($ContactEmail);
$ContactEmail = str_replace("'","&#39;",$ContactEmail);
$Request= stripslashes($Request);
$Request = str_replace("'","&#39;",$Request);
$Account= stripslashes($Account);
$Account = str_replace("'","&#39;",$Account);
$Amount= stripslashes($Amount);
$Amount = str_replace("'","&#39;",$Amount);
$CompanyName= stripslashes($CompanyName);
$CompanyName = str_replace("'","&#39;",$CompanyName);
$CompanyAddress= stripslashes($CompanyAddress);
$CompanyAddress = str_replace("'","&#39;",$CompanyAddress);
$CompanyCity= stripslashes($CompanyCity);
$CompanyCity = str_replace("'","&#39;",$CompanyCity);
$BillingName= stripslashes($BillingName);
$BillingName = str_replace("'","&#39;",$BillingName);
$BillingDate= stripslashes($BillingDate);
$BillingDate = str_replace("'","&#39;",$BillingDate);
$expired = date( 'y-m-d', strtotime('+30 days'));

$link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} 

mysql_select_db(reg_ister_13_info);

$query = "INSERT INTO $TableName(Email,ContactName,ContactAddress,ContactCity,ContactState,ContactZip,ContactPhone,Request,Type,Best,CompanyName,CompanyAddress,CompanyCity,CompanyState,CompanyZip,Account,Amount,CompanyPhone,ContactEmail,Status,DateCreated,DatePending,DateFulfilled,BillingName,DateExpired,BillingDate,Deleted,DateDelete) VALUES ('$User','$ContactName','$ContactAddress','$ContactCity','$ContactState','$ContactZip', '$ContactNumber','$Request','$Type','$Best','$CompanyName','$CompanyAddress','$CompanyCity','$CompanyState','$CompanyZip','$Account','$Amount','$CompanyNumber','$ContactEmail','$Status',CURDATE(),'','','$BillingName','$expired','$newdate','','')";


$result = mysql_query($query);

if($result){
$subject = "New Request";
$mailhead = "From: $User\n";
$to = "admin@ugiftit.org";
$email_message .= "A new request has been submitted.\n\nType: " . $Type . "\nUser: " . $User . "\nContact Name: " . $ContactName . "\nContact Address: " .  $ContactAddress . "\nContact City: " . $ContactCity . "\nContact State: " . $ContactState . "\nContact Zip Code: " . $ContactZip . "\nContact Phone Number: " . $ContactNumber . "\nContact Email: " . $ContactEmail . "\nRequest: " . $Request . "\nBest Way to Contact: " . $Best . "\nCompany/Landlord Name: " . $CompanyName . "\nCompany Address: " .  $CompanyAddress . "\nCompany City: " . $CompanyCity . "\nCompany State: " . $CompanyState . "\nCompany Zip Code: " . $CompanyZip . "\nCompany Phone Number: " . $CompanyNumber . "\nName on Account: " . $BillingName . "\nDue Date: " . $BillingDate . "\nAccount Number: " . $Account . "\nAmount: $" . $Amount;
mail($to,$subject,$email_message, $mailhead);

echo("<script>
<!--
location.replace('updated.php?page=newrequest');
-->
</script>");
}

else {
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
}
mysql_close();
?> 
