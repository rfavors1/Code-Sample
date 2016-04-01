<?php session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();   // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}
if (!isset($_SESSION['email'])) {
	header( 'Location: updated.php?page=viewrequest');
}

$TableName = "`Assistance`";
$ID = $_POST['ID'];
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
$User = $_SESSION['email'];
$Status = $_POST['Status'];
$BillingDate = $_POST['BillingDate'];
$BillingName = $_POST['BillingName'];

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
$BillingDate= stripslashes($BillingDate);
$BillingDate = str_replace("'","&#39;",$BillingDate);
$BillingName= stripslashes($BillingName);
$BillingName = str_replace("'","&#39;",$BillingName);
$newdate = substr($BillingDate,6,4) . "-" . substr($BillingDate,0,2) . "-" . substr($BillingDate,3,2);

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

$query = "UPDATE $TableName SET ContactName  = '$ContactName',ContactAddress = '$ContactAddress',ContactCity = '$ContactCity',ContactState = '$ContactState',ContactZip = '$ContactZip',ContactPhone = '$ContactNumber',Request = '$Request',Type = '$Type',Best = '$Best',CompanyName = '$CompanyName',CompanyAddress = '$CompanyAddress',CompanyCity = '$CompanyCity',CompanyState = '$CompanyState',CompanyZip = '$CompanyZip',Account = '$Account',Amount = '$Amount',CompanyPhone = '$CompanyNumber',ContactEmail = '$ContactEmail', Status = '$Status', BillingName = '$BillingName', BillingDate = '$newdate' WHERE ID = '$ID'";

$result = mysql_query($query);
mysql_close();
if($result){


echo("<script>
<!--
location.replace('updated.php?page=editrequest');
-->
</script>");
}

else {
location.replace('updated.php?page=error');	
}

?> 
