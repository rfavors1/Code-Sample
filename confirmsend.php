<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Confirm/title>
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
mysql_close();
if($row) {

$EmailFrom = "info@UGiftIt.org";
$to = $row['Email'];
$subject = "Confirm E-Mail - UGiftIt.org";
$mailhead = "From: $EmailFrom\n";
$email_message .= "Please click on the following link to  confirm your e-mail address: http://www.UGiftIt.org/confirm.php?email=" . $Email;
mail($to,$subject,$email_message, $mailhead);
echo("<script>
	<!--
	location.replace('updated.php?page=login');
	--></script>");
} else {
echo("<script>
	<!--
	location.replace('send.php?valid=no');
	--></script>");
}
?>
<body>
</body>
</html>