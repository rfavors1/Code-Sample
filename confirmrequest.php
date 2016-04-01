<?php session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();     // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Confirm Request</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 "Times New Roman", Times, serif;
	background-color: #ae5d5c;
	background-image: url(background.jpg);
	background-repeat: repeat-x;
	margin: 0;
	padding: 0;
	color: #000;
}
input
{
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:11px;
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
	min-width: 900px;/* a min-width may be desirable to keep this layout from getting too narrow. This keeps line length more readable in the side columns. IE6 does not respect this declaration. */
	background: #FFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout. It is not needed if you set the .container's width to 100%. */
}
.contentcontainer {
	width: 80%;
	max-width: 1260px;/* a max-width may be desirable to keep this layout from getting too wide on a large monitor. This keeps line length more readable. IE6 does not respect this declaration. */
	min-width: 900px;/* a min-width may be desirable to keep this layout from getting too narrow. This keeps line length more readable in the side columns. IE6 does not respect this declaration. */
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
#centeredmenu {
   float:left;
   width:100%;
   background:#ccc;
   border-bottom: 1px solid #ccc; 
   overflow:hidden;
   position:relative;
}
#centeredmenu ul {
   clear:left;
   float:left;
   list-style:none;
   margin:0;
   padding:0;
   position:relative;
   left:50%;
   text-align:center;
}
#centeredmenu ul li {
   display:block;
   float:left;
   list-style:none;
   margin:0;
   padding:0;
   position:relative;
   right:50%;
}
#centeredmenu ul li a {
   display:block;
   margin:0;
   padding:.4em .8em;
   border-left:1px solid #C8C8C8;
   border-right:1px solid #A8A8A8;
   text-decoration:none;
   line-height:1.0em
}
#centeredmenu ul li.first {
		border-left:1px solid #A8A8A8;
	}
#centeredmenu ul li.last {
		border-right:1px solid #C8C8C8;
	}
#centeredmenu ul li a span {
		display:block;
	}
-->
</style>
<script type="text/javascript">
function ValidateLogin()
{
var email=document.forms["login"]["email"].value;
var password=document.forms["login"]["password"].value;

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
}
</script>
</head>

<body>

<div class="container">
  <div class="header">
    <table width="100%" border="0">
      <tr>
        <td width="60%"><a href="index.php"><img src="Logo-12.jpg" alt="Logo" name="Logo" width="150" height="57" id="Insert_logo" style="background: #CCCCC; color: #CCC;" /></a>&nbsp;&nbsp;<img src="connecting.jpg" width="212" height="20" alt="connecting" /></a></td>
          <td  width="20%" valign="top">
                <?php  if (isset($_SESSION['email'])) { echo ("<a href='assistance.php'><font size='4' color='#000000'><strong><u>REQUEST A GIFT</u></strong></font></a>"); }?>
				<?php if (!isset($_SESSION['email'])) { echo ("<a href='registration.php'><font size='2'><strong><u>REGISTRATION</u></strong></font></a>"); } ?>
                	<?php if (isset($_SESSION['admin'])) { echo ("<br><a href='admin.php'><font size='3'><strong><u>Admin</u></strong></font></a>"); } ?>
                <br /><div align="center">
                <table>
                <tr><td valign="middle">
                <?php if ((isset($_SESSION['cartcount']))) {
					echo("<a href='cart.php'><strong><font color='#990000'>(" . $_SESSION['cartcount'] . ") </a></font></strong>");
				} else echo("&nbsp;");
				?>
                </td>
                <td>
                <br />
                <a href="cart.php"><img src="shopping_cart.png"></a></div>
                </td></tr>
                </table>
                </td>
         <?php
        if (isset($_SESSION['email'])) {
				echo ("<td VALIGN='top'><font color='#000000' size='-1'><strong>Welcome " . $_SESSION['rep'] . "!</strong></font><br><font  size='-2'>&nbsp;&nbsp;&nbsp;&nbsp;</font><a href='update.php'><font  size='-1'><strong><u>Update Account</u></strong></font></a><br><font  size='-2'>&nbsp;&nbsp;&nbsp;&nbsp;</font><a href='myrequests.php'><font  size='-1'><strong><u>My Requests</u></strong></font></a><br><font  size='-2'>&nbsp;&nbsp;&nbsp;&nbsp;</font><a href='logout.php'><font  size='-1'><strong><u>Log Out</u></strong></font></a></td>");
		} else {
			echo("<td width='15%'><form name='login' action='login.php' method='post' id='login' onsubmit='return ValidateLogin();'>
          <table bgcolor='#FFFFF' width='100%'>
            <tr>
          
        <td><font color='#000000' size='-2'><strong>E-MAIL</strong></font></td>
        <td><input type='text' name='email' id='login3' size='12' placeholder='e-mail'/></td>
      </tr>
      <tr>
        <td><font color='#000000' size='-2'><strong>PASSWORD</strong></font></td>
        <td><input type='password' name='password' id='loginpass' size='12' placeholder='password'/></td>
      </tr>
      <tr>
        <td><input type='submit' name='login' id='login'value='Log in'></td>
        <td><a href='password.php'><font color='#000000' size='-1'><u>Forgot Password?</u></font></a></td> </tr></table></form></td>");
		}
		?> 
      </tr>
    </table>
<div id="centeredmenu">
      <ul>
	<li class="first"><strong><a href="index.php"><font size="2">HOME</font></a></strong></li>
	<li><strong><a href="about.php"><font size="2">ABOUT US</font></a></strong></li>
	<li><strong><a href="household-bills.php"><font size="2">HOUSEHOLD BILLS</font></a></strong></li>
	<li><strong><a href="time-talents.php"><font size="2">TIME &amp; TALENTS</font></a></strong></li>
    <li><strong><a href="clothing.php"><font size="2">CLOTHING</font></a></strong></li>
    <li><strong><a href="food.php"><font size="2">FOOD</font></a></strong></li>
	<li><strong><a href="shared-ministries.php"><font size="2">SHARED MINISTRIES</font></a></strong></li>
    <li class="last"><strong><a href="contact.php"><font size="2">CONTACT</font></a></strong></li>
    </ul>
    </div>
  <!-- end .header --></div>
  <div class="content">
  <div class="contentcontainer">
  <p>&nbsp;</p>
  Please confirm your information is correct before submitting your request.
  <p></p>
  <?php
$Type = $_POST['Type']; 
$ContactName = $_POST['ContactName'];
$ContactNumber = $_POST['ContactNumber'];
$ContactAddress = $_POST['ContactAddress'];
$ContactCity = $_POST['ContactCity'];
$ContactState = $_POST['ContactState'];
$ContactZip = $_POST['ContactZip'];
$ContactEmail = $_POST['ContactEmail'];
$Best = $_POST['best'];
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

$_SESSION['Type'] = $Type; 
$_SESSION['ContactName']  = $ContactName;
$_SESSION['ContactNumber'] = $ContactNumber;
$_SESSION['ContactAddress'] = $ContactAddress;
$_SESSION['ContactCity'] = $ContactCity;
$_SESSION['ContactState'] = $ContactState;
$_SESSION['ContactZip'] = $ContactZip;
$_SESSION['ContactEmail'] = $ContactEmail;
$_SESSION['best'] = $Best;
$_SESSION['Comment'] = $Request;
$_SESSION['Account'] = $Account;
$_SESSION['Amount'] = $Amount;
$_SESSION['CompanyName'] = $CompanyName;
$_SESSION['CompanyNumber'] = $CompanyNumber;
$_SESSION['CompanyAddress'] = $CompanyAddress;
$_SESSION['CompanyCity'] = $CompanyCity;
$_SESSION['CompanyState'] = $CompanyState;
$_SESSION['CompanyZip'] = $CompanyZip;
$_SESSION['BillingName'] = $BillingName;
$_SESSION['BillingDate'] = $BillingDate;

  echo("<table width='70%' align='center'>
  <tr><td width='50%'>Type:</td>
  <td width='50%'>" . $Type . "</td>
  </tr>
  <tr><td width='50%'>Contact Name:</td>
  <td width='50%'>" . $ContactName . "</td>
  </tr>
  <tr><td width='50%'>Contact Address:</td>
  <td width='50%'>" . $ContactAddress . "</td>
  </tr>
  <tr><td width='50%'>Contact City: </td>
  <td width='50%'>" . $ContactCity . "</td>
  </tr>
  <tr><td width='50%'>Contact State:</td>
  <td width='50%'>" . $ContactState . "</td>
  </tr>
    <tr><td width='50%'>Contact Zip Code:</td>
  <td width='50%'>" . $ContactZip . "</td>
  </tr>
    <tr><td width='50%'>Contact E-Mail:</td>
  <td width='50%'>" . $ContactEmail . "</td>
  </tr>
    <tr><td width='50%'>Contact Phone Number:</td>
  <td width='50%'>" . $ContactNumber . "</td>
  </tr>
    <tr><td width='50%'>Best Way to Contact:</td>
  <td width='50%'>" . $Best . "</td>
  </tr>
    <tr><td width='50%'>Request:</td>
  <td width='50%'>" . $Request . "</td>
  </tr>");

if((($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas'))) {
   echo("   <tr><td width='50%'>Contact Billing Company/Landlord Name:</td>
  <td width='50%'>" . $CompanyName . "</td>
  </tr>
    <tr><td width='50%'>Billing Address:</td>
  <td width='50%'>" . $CompanyAddress . "</td>
  </tr>
    <tr><td width='50%'>Billing City:</td>
  <td width='50%'>" . $CompanyCity . "</td>
  </tr>
    <tr><td width='50%'>Billing State:</td>
  <td width='50%'>" . $CompanyState . "</td>
  </tr>
    <tr><td width='50%'>Billing Zip Code:</td>
  <td width='50%'>" . $CompanyZip . "</td>
  </tr>
    <tr><td width='50%'>Billing Phone Number:</td>
  <td width='50%'>" . $CompanyNumber . "</td>
  </tr>
  <tr><td width='50%'>Name on Account:</td>
  <td width='50%'>" . $BillingName . "</td>
  </tr>
    <tr><td width='50%'>Due Date:</td>
  <td width='50%'>" . $BillingDate . "</td>
  </tr>
    <tr><td width='50%'>Account:</td>
  <td width='50%'>" . $Account . "</td>
  </tr>
      <tr><td width='50%'>Amount:</td>
  <td width='50%'>" . $Amount . "</td>
  </tr>");
}
echo("
</table>
<p></p>
<form action='submitrequest.php' method='post' name='update' id='update'>
 <input type='hidden' name='ContactName' id='ContactName' size='50' required='required' value='" . $ContactName . "'/>
  <input type='hidden' name='ContactAddress' id='ContactAddress' size='40' required='required' value='" . $ContactAddress . "'/>
  <input type='hidden' name='ContactCity' id='ContactCity' required='required' value='" . $ContactCity . "'/>
  <input type='hidden' name='ContactState' id='ContactState' required='required' value='" . $ContactState . "'/>
  <input type='hidden' name='ContactZip' id='ContactZip' size='5' maxlength='5' required='required' value='" . $ContactZip . "'/>
   <input name='ContactNumber' id='ContactNumber' type='hidden' size='10' maxlength='10' required='required' value='" . $ContactNumber . "'/>
   <input type='hidden' name='ContactEmail' id='ContactEmail' size='50' required='required' value='" . $ContactEmail . "'/>
   <input type='hidden' name='Best' id='Best' size='50' required='required' value='" . $Best . "'/>
   <input type='hidden' name='Type' id='Type' size='50' required='required' value='" . $Type . "'/>
   <input type='hidden' name='Comment' id='Comment' size='50' required='required' value='" . $Request . "'/>
   <input type='hidden' name='CompanyName' id='CompanyName' size='50' required='required' value='" . $CompanyName . "'/>
    <input type='hidden' name='CompanyAddress' id='CompanyAddress' size='40' required='required' value='" . $CompanyAddress . "'/>
	<input type='hidden' name='CompanyCity' id='CompanyCity' required='required' value='" . $CompanyCity . "'/>
	<input type='hidden' name='CompanyState' id='ContactState' required='required' value='" . $CompanyState . "'/>
	<input type='hidden' name='CompanyZip' id='CompanyZip' size='5' maxlength='5' required='required' value='" . $CompanyZip . "'/>
	 <input name='CompanyNumber' id='CompanyNumber' type='hidden' size='10' maxlength='10' required='required' value='" . $CompanyNumber . "'/>
	  <input type='hidden' name='BillingName' id='BillingName' size='50' required='required' value='" . $BillingName . "'/>
	  <input type='hidden' name='BillingDate' id='BillingDate' size='50' required='required' value='" . $BillingDate . "'/>
	 <input type='hidden' name='Account' id='Account' size='20' value='" . $Account . "'/>
	 <input type='hidden' name='Amount' id='Amount' size='20' required='required' value='" . $Amount . "'/>
		
			<center><input type='submit' name='singup' id='singup' value='Submit Request' /></form>&nbsp;&nbsp;<a href='changerequest.php'><font color='#990000'><u>GO BACK</u></font></a>
");

?>


        <p align="center">&nbsp;</p>
</div>
  </div>
  <div class="footer">
 <div class="fltrt"><br /><br /><strong>Join us on</strong> <a href="http://wwww.facebook.com/UGiftIt" target="_new"><img src="facebook.png" width="20" height="20"/></a>&nbsp;&nbsp;<a href="http://www.twitter.com/UGiftItOrg" target="_new"><img src="Twitterlogo.png" width="20" height="20"/></a>&nbsp;&nbsp;</div>
     <p align="center"><Strong><font color='#990000'>U Gift It</font></strong><br />
<font size="3"><i>connecting through sharing</i></font><br />
    <font size="2">© U Gift It, 2012. All rights reserved.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Designed by <a href="mailto: rfavors09@gmail.com"><u>Richard A. Favors, Jr.</u></a></font>
  <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
