<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
 <?php 
$Name = $_POST['name'];
$Email = $_POST['email'];
$Website = $_POST['website'];
$Comment = $_POST['comment'];
$NotifyBox = $_POST['notifybox'];
$NotifyBoxx = $_POST['notifyboxx'];

$link = mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', '*password*'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 

mysql_select_db(reg_ister_13_info);

$query = "INSERT INTO Table VALUES ('NULL','$Name','$Email','$Website','$Comment')";

mysql_query($query) or die ('Error updating database');

mysql_close ();
?> 
<body>
</body>
</html>