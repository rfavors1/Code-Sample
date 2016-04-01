<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Thank You</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #a53131;
	background-image: url(background.jpg);
	background-repeat: repeat-x;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing div. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px; /* adding the padding to the sides of the elements within the divs, instead of the divs themselves, gets rid of any box model math. A nested div with side padding can also be used as an alternate method. */
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}

/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color: #903;
	text-decoration: none; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	text-decoration: none;
	color: #903;
}
a:hover {
	text-decoration: none;
	color: #FFF;
}
a:active {
	text-decoration: none;
	color: #999;
}

/* ~~ this container surrounds all other divs giving them their percentage-based width ~~ */
.container {
	width: 80%;
	max-width: 1260px;/* a max-width may be desirable to keep this layout from getting too wide on a large monitor. This keeps line length more readable. IE6 does not respect this declaration. */
	min-width: 780px;/* a min-width may be desirable to keep this layout from getting too narrow. This keeps line length more readable in the side columns. IE6 does not respect this declaration. */
	background: #FFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout. It is not needed if you set the .container's width to 100%. */
}

/* ~~the header is not given a width. It will extend the full width of your layout. It contains an image placeholder that should be replaced with your own linked logo~~ */
.header {
	background: #CCC;
}

/* ~~ This is the layout information. ~~ 

1) Padding is only placed on the top and/or bottom of the div. The elements within this div have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

*/
.content {
	padding: 0px 0;
	border: none;
}

/* ~~ This grouped selector gives the lists in the .content area space ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* this padding mirrors the right padding in the headings and paragraph rule above. Padding was placed on the bottom for space between other elements on the lists and on the left to create the indention. These may be adjusted as you wish. */
}

/* ~~ The footer ~~ */
.footer {
	padding: 10px 0;
	background: #CCC;
}

/* ~~ miscellaneous float/clear classes ~~ */
.fltrt {  /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page. The floated element must precede the element it should be next to on the page. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class can be placed on a <br /> or empty div as the final element following the last floated div (within the #container) if the #footer is removed or taken out of the #container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
#apDiv1 {
	position:absolute;
	width:721px;
	height:659px;
	z-index:1;
	left: 137px;
	top: 82px;
	background-color: #FFFFFF;
}
#apDiv25 {
	position:absolute;
	width:182px;
	height:72px;
	z-index:1;
	left: 744px;
	top: 11px;
}
-->
</style>
<script type="text/javascript">
function ValidateLogin()
{
var email=document.forms["login"]["login2"].value;
var password=document.forms["login"]["loginpassword"].value;

var atpos=email.indexOf("@");
var dotpos=email.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
if (email.length==0)
{
alert("Enter your e-mail address");
  return false;
  }	
if (password.length==0)
{
alert("Enter your password");
  return false;
  }	
  document['login'].submit();
}
</script>
</head>

<body>
<?php
$con = mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db(reg_ister_13_info);
$TableName = "`Register Fields`";
$result = mysql_query("SELECT * FROM $TableName
WHERE Username='richard'");
$row = mysql_fetch_array($result);
$to = $row['Church Email'];
$subject = "Password Recovery - UGiftIt.org";
$mailhead = "From: info@UGiftIt.org\n";
$email_message .= "Your pasword is: " . $row['Password'] . ". Please return to UGiftIt.org to log in using your pasword.";
mail($to,$subject,$email_message, $mailhead);
?>
<div class="container">
  <div class="header">
    <table width="100%" border="0">
      <tr>
        <td width="85%"><a href="index.html"><img src="Logo-12.jpg" alt="Logo" name="Logo" width="150" height="57" id="Insert_logo" style="background: #CCCCC; color: #CCC;" /></a>&nbsp;&nbsp;<img src="connecting.jpg" width="212" height="20" alt="connecting" /></a></td>
        <td width="15%"><form name="login" action="login.php" method="post" id="login">
          <table width="100%" border="0">
            <tr>
        <td><font color="#000000" size="-2"><strong>USERNAME</strong></font></td>
        <td><input type="text" name="login2" id="login3" size="12" placeholder="username"/></td>
      </tr>
      <tr>
        <td><font color="#000000" size="-2"><strong>PASSWORD</strong></font></td>
        <td><input type="password" name="loginpassword" id="loginpass" size="12" placeholder="password"/></td>
      </tr>
      <tr>
        <td><a href="#" onclick="document['formname'].submit(); return false"><font color="#000000" size="-2"><u><strong>LOG IN</strong></u></font></a></td>
        <td><a href="password.html"><font color="#000000" size="-2"><u>Forgot Password?</u></font></a></td>
      </tr>
  </table>
        </form></td>
      </tr>
    </table>
    <center>
    <table width="85%" border="0">
      <tr>
        <td><strong><a href="index.html"><font size="2">HOME</font></a><font size="2">&nbsp;&nbsp;&nbsp;</font></strong></td>
        <td><strong><a href="about.html"><font size="2">ABOUT US</font></a><font size="2">&nbsp;&nbsp;&nbsp;</font></strong></td>
        <td><strong><a href="household-bills.html"><font size="2">HOUSEHOLD BILLS</font></a><font size="2">&nbsp;&nbsp;&nbsp;</font></strong></td>
        <td><strong><a href="time-talents.html"><font size="2">TIME &amp; TALENTS</font></a><font size="2">&nbsp;&nbsp;&nbsp;</font></strong></td>
        <td><strong><a href="shared-ministries.html"><font size="2">SHARED MINISTRIES</font></a><font size="2">&nbsp;&nbsp;&nbsp;</font></strong></td>
        <td><strong><a href="registration.html"><font size="2">REGISTRATION</font></a><font size="2">&nbsp;&nbsp;&nbsp;</font></strong></td>
        <td><strong><a href="contact.html"><font size="2">CONTACT</font></a><font size="2">&nbsp;&nbsp;&nbsp;</font></strong></td>
      </tr>
    </table> 
    </center>
  <!-- end .header --></div>
  <div class="content">
    <table width="100%" height="100%" border="0">
      <tr>
        <td width="5%" bgcolor="#666666"><p>&nbsp;</p>
        <p>&nbsp;</p></td>
        <td width="1%" bgcolor="#000000">&nbsp;</td>
        <td width="84%"><h5>&nbsp;</h5>
          <h5>&nbsp;</h5>
          <h5>&nbsp;</h5>
          <div align="center"><font size="2">Please check the email you provided during registration for password information.</font></div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p align="center"><img src="Logo-12.jpg" width="300" height="114" alt="Logo" /></p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        <p>&nbsp;</p></td>
        <td width="1%" bgcolor="#000000">&nbsp;</td>
        <td width="5%" bgcolor="#666666">&nbsp;</td>
      </tr>
    </table>
  </div>
  <div class="footer">
    <p>Foote</p>
  <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
