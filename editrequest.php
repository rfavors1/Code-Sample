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
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Edit Request</title>
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
	padding: 5px 0;
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
function ValidateForm()
{
var contactname=document.forms["Request"]["ContactName"].value;
var contactaddress=document.forms["Request"]["ContactAddress"].value;
var contactcity=document.forms["Request"]["ContactCity"].value;
var contactstate=document.forms["Request"]["ContactState"].value;
var contactzip=document.forms["Request"]["ContactZip"].value;
var contactnumber=document.forms["Request"]["ContactNumber"].value;
var contactemail=document.forms["Request"]["ContactEmail"].value;
var best=document.forms["Request"]["best"].value;
var request=document.forms["Request"]["Comment"].value;
var companyname=document.forms["Request"]["CompanyName"].value;
var companyaddress=document.forms["Request"]["CompanyAddress"].value;
var companycity=document.forms["Request"]["CompanyCity"].value;
var companystate=document.forms["Request"]["CompanyState"].value;
var companyzip=document.forms["Request"]["CompanyZip"].value;
var companynumber=document.forms["Request"]["CompanyNumber"].value;
var account=document.forms["Request"]["Account"].value;
var amount=document.forms["Request"]["Amount"].value;
var type=document.forms["Request"]["Type"].value;
var billingname=document.forms["Request"]["BillingName"].value;
var billingdate=document.forms["Request"]["BillingDate"].value;

if((isNaN(contactzip))) {
	 alert('Please enter a valid zip code');
	 document.forms["Request"]["ContactZip"].focus();
    return false;
}

if((isNaN(contactnumber))) {
 alert('Please enter a valid telephone number');
	 document.forms["Request"]["ContactNumber"].focus();
    return false;
}

var atpos=contactemail.indexOf("@");
var dotpos=contactemail.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=contactemail.length)
  {
  alert("Not a valid e-mail address");
  document.forms["Request"]["ContactEmail"].focus();
  return false;
  }

  if (contactname.length == 0) {
	 alert('Please enter a contact name');
	 document.forms["Request"]["ContactName"].focus();
    return false;
}
  if (contactaddress.length == 0) {
	 alert('Please enter a contact address');
	 document.forms["Request"]["ContactAddress"].focus();
    return false;
} 
  if (contactcity.length == 0) {
	 alert('Please enter a contact city');
	 document.forms["Request"]["ContactCity"].focus();
    return false;
} 
  if (contactstate.length == 0) {
	 alert('Please enter a contact state');
	 document.forms["Request"]["ContactState"].focus();
    return false;
} 
  if (contactzip.length == 0) {
	 alert('Please enter a contact zip code');
	 document.forms["Request"]["ContactZip"].focus();
    return false;
} 
if (contactzip.length != 5) {
	 alert('Please enter a valid zip code');
	 document.forms["Request"]["ContactZip"].focus();
    return false;
} 
  if (contactnumber.length == 0) {
	 alert('Please enter a contact number');
	 document.forms["Request"]["ContactNumber"].focus();
    return false;
} 
  if (contactnumber.length != 10) {
	 alert('Please enter a valid contact number');
	 document.forms["Request"]["ContactNumber"].focus();
    return false;
} 
  if (contactemail.length == 0) {
	 alert('Please enter a contact email');
	 document.forms["Request"]["ContactEmail"].focus();
    return false;
}
  if (best.length == 0) {
	 alert('Please enter the best way to contact you');
	 document.forms["Request"]["best"].focus();
    return false;
}
  if (request.length == 0) {
	 alert('Please enter your request');
	 document.forms["Request"]["Comment"].focus();
    return false;
}
if ((type == "Telephone") || (type == "Electricity/Gas") || (type == "Mortgage/Rent")){
  if (companyname.length == 0) {
	 alert('Please enter a company biling/landlord name');
	 document.forms["Request"]["CompanyName"].focus();
    return false;
}
  if (companyaddress.length == 0) {
	 alert('Please enter a company address');
	 document.forms["Request"]["CompanyAddress"].focus();
    return false;
} 
  if (companycity.length == 0) {
	 alert('Please enter a company city');
	 document.forms["Request"]["CompanyCity"].focus();
    return false;
} 
  if (companystate.length == 0) {
	 alert('Please enter a company state');
	 document.forms["Request"]["CompanyState"].focus();
    return false;
} 
  if (companyzip.length == 0) {
	 alert('Please enter a company zip code');
	 document.forms["Request"]["CompanyZip"].focus();
    return false;
} 
 if (companyzip.length != 5) {
	 alert('Please enter a valid zip code');
	 document.forms["Request"]["CompanyZip"].focus();
    return false;
} 
  if (companynumber.length == 0) {
	 alert('Please enter a company number');
	 document.forms["Request"]["CompanyNumber"].focus();
    return false;
}
 if (billingname.length == 0) {
	 alert('Please enter a billing name');
	 document.forms["Request"]["BillingName"].focus();
    return false;
}
  if (billingdate.length == 0) {
	 alert('Please enter a due date');
	 document.forms["Request"]["BillingDate"].focus();
    return false;
}
  if (billingdate.length != 10) {
	 alert('Please enter a valid due date');
	 document.forms["Request"]["BillingDate"].focus();
    return false;
}
  if (amount.length == 0) {
	 alert('Please enter the billing amount');
	 document.forms["Request"]["Amount"].focus();
    return false;
}

if((isNaN(amount))) {
	alert('Please enter a valid billing amount');
	 document.forms["Request"]["Amount"].focus();
    return false;
}

if((isNaN(companyzip))) {
	 alert('Please enter a valid zip code');
	 document.forms["Request"]["CompanyZip"].focus();
    return false;
}

if((isNaN(companynumber))) {
 alert('Please enter a valid telephone number');
	 document.forms["Request"]["CompanyNumber"].focus();
    return false;
} 
}
}

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
                <?php  if (isset($_SESSION['email'])) { echo ("<a href='assistance.php'><font size='4'><strong><u>REQUEST A GIFT</u></strong></font></a>"); }?>
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
				echo ("<td VALIGN='top'><font color='#000000' size='-1'><strong>Welcome " . $_SESSION['rep'] . "!</strong></font><br><font  size='-2'>&nbsp;&nbsp;&nbsp;&nbsp;</font><a href='update.php'><font  size='-1'><strong><u>Update Account</u></strong></font></a><br><font  size='-2'>&nbsp;&nbsp;&nbsp;&nbsp;</font><a href='myrequests.php'><font  size='-1' color='#000000'><strong><u>My Requests</u></strong></font></a><br><font  size='-2'>&nbsp;&nbsp;&nbsp;&nbsp;</font><a href='logout.php'><font  size='-1'><strong><u>Log Out</u></strong></font></a></td>");
		} else {
			echo("<td width='15%'><form name='login' action='login.php' method='post' id='login' onsubmit='return ValidateLogin();'>
          <table bgcolor='#FFFFF' width='100%'>
            <tr>
          
        <td><font color='#000000' size='-2'><strong>E-MAIL</strong></font></td>
        <td><input type='text' name='email' id='login3' placeholder='e-mail'/></td>
      </tr>
      <tr>
        <td><font color='#000000' size='-2'><strong>PASSWORD</strong></font></td>
        <td><input type='password' name='password' id='loginpass' placeholder='password'/></td>
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
<h2><strong>Edit Request</strong></h2>
   
        <i>&nbsp;&nbsp;&nbsp;All fields are required</i><br>
        <hr size="3" align="left" border="none" color="#990000" width="75%" />
    <form action="confirmeditreq.php" method="post" name="Request" id="Request" onsubmit="return ValidateForm();">
    <?php 
	 $link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
      echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>"); 
} 
$TableName = "`Assistance`";
$User = $_SESSION['email'];
$number = $_GET['ID'];
$up = 'Yes';

mysql_select_db(reg_ister_13_info);

$query="SELECT * FROM $TableName WHERE ID = '$number' AND Deleted != '$up'";
$result=mysql_query($query);


$row = mysql_fetch_array($result);
 
mysql_close();
if (!$row) {
	echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} else {
if (($row['Email'] != $User) or ($row['Status'] == 'Fulfilled') or ($row['Status'] == 'Pending')) {
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>");
} else {
$ID=$row['ID'];
$Type=$row['Type'];
$ContactName=$row['ContactName'];
$ContactAddress=$row['ContactAddress'];
$ContactCity=$row['ContactCity'];
$ContactState=$row['ContactState'];
$ContactZip=$row['ContactZip'];
$ContactPhone=$row['ContactPhone'];
$ContactEmail=$row['ContactEmail'];
$Request=$row['Request'];
$Best=$row['Best'];
$CompanyName=$row['CompanyName'];
$CompanyAddress=$row['CompanyAddress'];
$CompanyCity=$row['CompanyCity'];
$CompanyState=$row['CompanyState'];
$CompanyZip=$row['CompanyZip'];
$CompanyPhone=$row['CompanyPhone'];
$Account=$row['Account'];
$Amount=$row['Amount'];
$Status=$row['Status'];
$BillingName=$row['BillingName'];
$BillingDate = $row['BillingDate'];
$newdateb = substr($BillingDate,5,2) . "/" . substr($BillingDate,8,2) . "/" . substr($BillingDate,0,4);
if(!(($Type == 'Telephone') or ($Type == 'Rent') or ($Type == 'Electricity'))) {
 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	if (!($datec > $today)) {
		echo("<script>
<!--
location.replace('updated.php?page=error');
	-->
</script>");	
	}
} else {
	 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	$datev = strtotime($row['BillingDate']);
	if  (!(($datec > $today) and ($datev > $today))) {
		echo("<script>
<!--
location.replace('updated.php?page=error');
	-->
</script>");	
	}
	}
	echo("
   <p>ID: " .$ID . "&nbsp;&nbsp;&nbsp;Assistance Type: <u>" . $Type . "</u><input type='hidden' name='Type' id='Type' size='30' required='required' value='" . $Type . "'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#FF0000'><strong>STATUS:" . $Status . "</strong></font> 
<input type='hidden' name='Status' id='Status' size='30' required='required' value='" . $Status . "'/> 
   </p><input type='hidden' name='ID' id='ID' size='30' required='required' value='" . $ID . "'/> 
               <p><strong>Contact Information:</strong></p> 
              <p>Contact Name:
  <input type='text' name='ContactName' id='ContactName' size='50' required='required' value='" . $ContactName . "'/>
              </p>
              <p>Contact Address:
  <input type='text' name='ContactAddress' id='ContactAddress' size='40' required='required' value='" . $ContactAddress . "'/>
              </p>
              <p>Contact City:
  <input type='text' name='ContactCity' id='ContactCity' required='required' value='" . $ContactCity . "'/>
                &nbsp;&nbsp;&nbsp;Contact State:
                <select name='ContactState' size='1' required='required'>
				<option selected='"  . $ContactState . "'/>" . $ContactState . "</option>
                  <option value=''></option>
                  <option value='AK'>AK</option>
                  <option value='AL'>AL</option>
                  <option value='AR'>AR</option>
                  <option value='AZ'>AZ</option>
                  <option value='CA'>CA</option>
                  <option value='CO'>CO</option>
                  <option value='CT'>CT</option>
                  <option value='DC'>DC</option>
                  <option value='DE'>DE</option>
                  <option value='FL'>FL</option>
                  <option value='GA'>GA</option>
                  <option value='HI'>HI</option>
                  <option value='IA'>IA</option>
                  <option value='ID'>ID</option>
                  <option value='IL'>IL</option>
                  <option value='IN'>IN</option>
                  <option value='KS'>KS</option>
                  <option value='KY'>KY</option>
                  <option value='LA'>LA</option>
                  <option value='MA'>MA</option>
                  <option value='MD'>MD</option>
                  <option value='ME'>ME</option>
                  <option value='MI'>MI</option>
                  <option value='MN'>MN</option>
                  <option value='MO'>MO</option>
                  <option value='MS'>MS</option>
                  <option value='MT'>MT</option>
                  <option value='NC'>NC</option>
                  <option value='ND'>ND</option>
                  <option value='NE'>NE</option>
                  <option value='NH'>NH</option>
                  <option value='NJ'>NJ</option>
                  <option value='NM'>NM</option>
                  <option value='NV'>NV</option>
                  <option value='NY'>NY</option>
                  <option value='OH'>OH</option>
                  <option value='OK'>OK</option>
                  <option value='OR'>OR</option>
                  <option value='PA'>PA</option>
                  <option value='RI'>RI</option>
                  <option value='SC'>SC</option>
                  <option value='SD'>SD</option>
                  <option value='TN'>TN</option>
                  <option value='TX'>TX</option>
                  <option value='UT'>UT</option>
                  <option value='VA'>VA</option>
                  <option value='VT'>VT</option>
                  <option value='WA'>WA</option>
                  <option value='WI'>WI</option>
                  <option value='WV'>WV</option>
                  <option value='WY'>WY</option>
                </select>
                &nbsp;&nbsp;&nbsp;Contact Zip Code:
                <input type='text' name='ContactZip' id='ContactZip' size='5' maxlength='5' required='required' value='" . $ContactZip . "'/>
              </p>
              <p>Contact Phone Number:
  <input name='ContactNumber' id='ContactNumber' type='text' size='10' maxlength='10' required='required' value='" . $ContactPhone . "'/>
                <i>(format: 5551112222)</i></p>
                <p>Contact E-Mail:
                <input type='text' name='ContactEmail' id='ContactEmail' size='50' required='required' value='" . $ContactEmail . "'/></p>
                <p>Best Way to Contact:
                <select name='best' size='1' required='required'>
				<option selected='"  . $Best . "'/>" . $Best . "</option>
                  <option value=''></option>
                  <option value='Phone'>Phone</option>
                  <option value='Email'>E-Mail</option>
                  </select></p>
                <p>Request:
                <textarea name='Comment' id='Comment' cols='45' rows='5'>" . $Request . "</textarea> <i>(please be specific)</i></p>");
            if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
			              echo("<hr size='1' align='left' width='75%' border='none' color='#990000' /><p><strong>Billing/Landlord Information:</strong></p><p>Billing Company/Landlord Name:
  <input type='text' name='CompanyName' id='CompanyName' size='50' required='required' value='" . $CompanyName . "'/>
              </p>
              <p>Address:
  <input type='text' name='CompanyAddress' id='CompanyAddress' size='40' required='required' value='" . $CompanyAddress . "'/>
              </p>
              <p>City:
  <input type='text' name='CompanyCity' id='CompanyCity' required='required' value='" . $CompanyCity . "'/>
                &nbsp;&nbsp;&nbsp;State:
                <select name='CompanyState' size='1' required='required'>
				<option selected='"  . $CompanyState . "'/>" . $CompanyState . "</option>
                  <option value=''></option>
                  <option value='AK'>AK</option>
                  <option value='AL'>AL</option>
                  <option value='AR'>AR</option>
                  <option value='AZ'>AZ</option>
                  <option value='CA'>CA</option>
                  <option value='CO'>CO</option>
                  <option value='CT'>CT</option>
                  <option value='DC'>DC</option>
                  <option value='DE'>DE</option>
                  <option value='FL'>FL</option>
                  <option value='GA'>GA</option>
                  <option value='HI'>HI</option>
                  <option value='IA'>IA</option>
                  <option value='ID'>ID</option>
                  <option value='IL'>IL</option>
                  <option value='IN'>IN</option>
                  <option value='KS'>KS</option>
                  <option value='KY'>KY</option>
                  <option value='LA'>LA</option>
                  <option value='MA'>MA</option>
                  <option value='MD'>MD</option>
                  <option value='ME'>ME</option>
                  <option value='MI'>MI</option>
                  <option value='MN'>MN</option>
                  <option value='MO'>MO</option>
                  <option value='MS'>MS</option>
                  <option value='MT'>MT</option>
                  <option value='NC'>NC</option>
                  <option value='ND'>ND</option>
                  <option value='NE'>NE</option>
                  <option value='NH'>NH</option>
                  <option value='NJ'>NJ</option>
                  <option value='NM'>NM</option>
                  <option value='NV'>NV</option>
                  <option value='NY'>NY</option>
                  <option value='OH'>OH</option>
                  <option value='OK'>OK</option>
                  <option value='OR'>OR</option>
                  <option value='PA'>PA</option>
                  <option value='RI'>RI</option>
                  <option value='SC'>SC</option>
                  <option value='SD'>SD</option>
                  <option value='TN'>TN</option>
                  <option value='TX'>TX</option>
                  <option value='UT'>UT</option>
                  <option value='VA'>VA</option>
                  <option value='VT'>VT</option>
                  <option value='WA'>WA</option>
                  <option value='WI'>WI</option>
                  <option value='WV'>WV</option>
                  <option value='WY'>WY</option>
                </select>
                &nbsp;&nbsp;&nbsp;Zip Code:
                <input type='text' name='CompanyZip' id='CompanyZip' size='5' maxlength='5' required='required' value='" . $CompanyZip . "'/>
              </p>
              <p>Phone Number:
  <input name='CompanyNumber' id='CompanyNumber' type='text' size='10' maxlength='10' required='required' value='" . $CompanyPhone . "'/>
                <i>(format: 5551112222)</i></p>
				<p>Name on Account:
  <input type='text' name='BillingName' id='BillingName' size='50' required='required' value='" . $BillingName . "'/>
              </p>
			  <p>Due Date:
  <input type='text' name='BillingDate' id='BillingDate' size='10' required='required' value='" . $newdateb . "'/><i>(format: mm/dd/yyyy)</i>
              </p>
			<p>Account Number: 
                <input type='text' name='Account' id='Account' size='20' value='" . $Account . "'/><i> (if applicable)</i>&nbsp;&nbsp;&nbsp;Amount: $
                <input type='text' name='Amount' id='Amount' size='20' required='required' value='" . $Amount . "'/>
              </p>");	  
			  }
}
}
			  ?>
<h5 align="center">
                <input type="submit" name="submit" id="Submit" value="Submit" />
                &nbsp;&nbsp;
                <input type="reset" value="Reset" />
              </h5>
              </form>
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