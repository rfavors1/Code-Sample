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
$Feedback = $_POST['type'];
$to = "rfavors09@gmail.com";
$subject = "Feedback";
$mailhead = "From: $Email\n";

 function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Type: ".clean_string($Feedback)."\n";
	$email_message .= "Name: ".clean_string($Name)."\n";
    $email_message .= "Email: ".clean_string($Email)."\n";
    $email_message .= "Website: ".clean_string($Website)."\n";
    $email_message .= "Comment: ".clean_string($Comment)."\n";
	
	
	mail($to,$subject,$email_message, $mailhead);
	echo("<script>
	<!--
	location.replace('updated.php?page=feedback');
	-->
	</script>");
?>
<body>
</body>
</html>