<?php 
session_start();

$Name = $_POST['name'];
$Rep = $_POST['Rep'];
$Address = $_POST['Address'];
$City = $_POST['City'];
$State = $_POST['state'];
$Zip = $_POST['Zip'];
$Telephone = $_POST['telephone'];
$Email = $_POST['email'];
$Dis = $_POST['Dis'];
$Conf = $_POST['conf'];
$Confirmed = 'No';
$Verified = 'No';
$Pass = $_POST['password'];
$TableName = "`Register Fields`";

$Name= stripslashes($Name);
$Name = str_replace("'","&#39;",$Name);
$Rep= stripslashes($Rep);
$Rep = str_replace("'","&#39;",$Rep);
$Address= stripslashes($Address);
$Address = str_replace("'","&#39;",$Address);
$City= stripslashes($City);
$City = str_replace("'","&#39;",$City);
$Email= stripslashes($Email);
$Email = str_replace("'","&#39;",$Email);
$Dis= stripslashes($Dis);
$Dis = str_replace("'","&#39;",$Dis);
$Conf= stripslashes($Conf);
$Conf = str_replace("'","&#39;",$Conf);
$Pass= stripslashes($Pass);
$Pass = str_replace("'","&#39;",$Pass);
$Pass = md5($Pass);
$Admin = 'admin@ugiftit.org';
$count = 0;


$link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
echo("<script>
<!--
location.replace('updated.php?page=login');
-->
</script>");
} 

mysql_select_db(reg_ister_13_info);

$query = "INSERT INTO $TableName(`Name of Church`,`Name of Representative`,`Church Address`,City,State,Zipcode,`Church Phone Number`,Email,`Name of District`,`Name of Annual Conference`,Password,Confirmed, Verified, LogIn, Deleted,DateRegister,DateDelete) VALUES ('$Name','$Rep', '$Address','$City','$State','$Zip','$Telephone','$Email','$Dis','$Conf','$Pass','$Confirmed', '$Verified','$count','',CURDATE(),'')";

$result = mysql_query($query);

if($result){
$EmailFrom = "info@UGiftIt.org";
$subject = "Confirm E-mail - UGiftIt.org";
$mailhead = "From: $EmailFrom\n";
$email_message .= "Your registration has been submitted.\n\nYour information must be verified before you may log in to the site. Verification takes 3 - 5 business Days. You will receive an e-mail once your information is verified.\n\nPlease click on the following link to  confirm your e-mail address (or copy link into your browser): http://wwww.UGiftIt.org/confirm.php?email=" . $Email;
mail($Email,$subject,$email_message, $mailhead);

$EmailF = "info@UGiftIt.org";
$sub = "Verify User - UGiftIt.org";
$mailh = "From: $EmailF\n";
$email_mes .= "There was a new registration request.\n\nName of Church: " . $Name . "\nRepresentative: " . $Rep ."\nAddress: " . $Address . "\nCity: " . $City . "\nState: " . $State . "\nZip: " . $Zip . "\nTelephone: " . $Telephone . "\nEmail: " . $Email . "\nDistrict: " . $Dis . "\nConference: " . $Conf . "\n\nOnce you verify the information, please go to http://www.UGiftIt.org/verify.php?email=" . $Email . " to verify the user.";
mail($Admin,$sub,$email_mes, $mailh);
echo("<script>
<!--
location.replace('updated.php?page=login');
-->
</script>");
}

else {
	$_SESSION['emailr'] = $Email;
	$_SESSION['namer'] =  $Name;
	$_SESSION['repr'] =  $Rep;
	$_SESSION['addressr'] = $Address;
	$_SESSION['phoner'] = $Telephone;
	$_SESSION['cityr'] = $City; 
	$_SESSION['stater'] =  $State; 
	$_SESSION['zipr'] = $Zip;
	$_SESSION['confr'] = $Conf;
	$_SESSION['disr'] = $Dis;
	header( 'Location: exist.php?exist=yes') ;
}


mysql_close();
?> 
