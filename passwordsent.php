<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Forgot Password</title>
<?php
$con = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610');
if (!$con)
  {
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
  }

mysql_select_db(reg_ister_13_info);
$TableName = "`Register Fields`";
$Email = $_POST['email'];
$result = mysql_query("SELECT * FROM $TableName
WHERE Email = '$Email'");
$row = mysql_fetch_array($result);

if($row) {

$EmailFrom = "info@UGiftIt.org";
$to = $row['Email'];
$subject = "Password Recovery - UGiftIt.org";
$mailhead = "From: $EmailFrom\n";
$email_message .= "Your pasword is: " . $row['Password'] . "\n\n Please return to http://www.UGiftIt.org to log in using your pasword.";
mail($to,$subject,$email_message, $mailhead);
echo("<script>
	<!--
	location.replace('updated.php?page=password');
	--></script>");
} else {
echo("<script>
	<!--
	location.replace('password.php?valid=no');
	--></script>");
}
?>
<body>
</body>
</html>