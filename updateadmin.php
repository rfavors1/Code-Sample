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

$Namea = $_POST['name'];
$Repa = $_POST['Rep'];
$Addressa = $_POST['Address'];
$Citya = $_POST['City'];
$Statea = $_POST['state'];
$Zipa = $_POST['Zip'];
$Telephonea = $_POST['telephone'];
$Emaila = $_POST['email'];
$NewEmaila = $_POST['newemail'];
$Disa = $_POST['Dis'];
$Confa = $_POST['conf'];
$Confirmeda = 'Yes';
$TableName = "`Register Fields`";

$Namea= stripslashes($Namea);
$Namea = str_replace("'","&#39;",$Namea);
$Repa= stripslashes($Repa);
$Repa = str_replace("'","&#39;",$Repa);
$Addressa= stripslashes($Addressa);
$Addressa = str_replace("'","&#39;",$Addressa);
$Citya= stripslashes($Citya);
$Citya = str_replace("'","&#39;",$Citya);
$Disa= stripslashes($Dis);
$Disa = str_replace("'","&#39;",$Disa);
$Confa= stripslashes($Confa);
$Confa = str_replace("'","&#39;",$Confa);
$NewEmaila= stripslashes($NewEmaila);
$NewEmaila = str_replace("'","&#39;",$NewEmaila);

$link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} 

mysql_select_db(reg_ister_13_info);

if($Emaila != $NewEmaila){
$exist = mysql_query("SELECT * FROM $TableName WHERE Email = '$NewEmaila'");
$row = mysql_fetch_array($exist);

if  ($row) {
header( 'Location: editaccadmin.php?valid=No') ;	

}
else {
$query = "Update $TableName SET `Name of Church` = '$Namea', `Name of Representative` = '$Repa', `Church Address` = '$Addressa',City = '$Citya', State = '$Statea', Zipcode = '$Zipa', `Church Phone Numbera` = '$Telephonea', Email = '$NewEmaila', `Name of District` = '$Disa',`Name of Annual Conference` = '$Confa',Confirmed = '$Confirmeda' WHERE Email = '$Emaila'";



$Table = "`Assistance`";
$q = "UPDATE $Table SET Email = '$NewEmaila' WHERE Email = '$Emaila'";

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
echo("<script>
<!--
location.replace('updated.php?page=adminupdate');
-->
</script>");

}
}else {
	
$query = "Update $TableName SET `Name of Church` = '$Namea', `Name of Representative` = '$Repa', `Church Address` = '$Addressa',City = '$Citya', State = '$Statea', Zipcode = '$Zipa', `Church Phone Number` = '$Telephonea', Email = '$NewEmaila', `Name of District` = '$Disa',`Name of Annual Conference` = '$Confa',Confirmed = '$Confirmeda' WHERE Email = '$Emaila'";

$result = mysql_query($query);
if (!$result) { 
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} 
echo("<script>
<!--
location.replace('updated.php?page=adminupdate');
-->
</script>");
}

mysql_close();
?>