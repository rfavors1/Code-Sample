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
<title>Registration</title>
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
input
{
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:11px;
}
.contentcontainer {
	width: 80%;
	max-width: 1260px;/* a max-width may be desirable to keep this layout from getting too wide on a large monitor. This keeps line length more readable. IE6 does not respect this declaration. */
	min-width: 900px;/* a min-width may be desirable to keep this layout from getting too narrow. This keeps line length more readable in the side columns. IE6 does not respect this declaration. */
	background: #FFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout. It is not needed if you set the .container's width to 100%. */
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
function validateForm()
{
var z=document.forms["RegistrationForm"]["password"].value;
var name=document.forms["RegistrationForm"]["name"].value;
var rep=document.forms["RegistrationForm"]["Rep"].value;
var address=document.forms["RegistrationForm"]["Address"].value;
var city=document.forms["RegistrationForm"]["City"].value;
var state=document.forms["RegistrationForm"]["state"].value;
var zip=document.forms["RegistrationForm"]["Zip"].value;
var telephone=document.forms["RegistrationForm"]["Telephone"].value;
var conf=document.forms["RegistrationForm"]["conf"].value;
var dis=document.forms["RegistrationForm"]["Dis"].value;
var s=document.forms["RegistrationForm"]["confpassword"].value;
var v=document.forms["RegistrationForm"]["verifybox"].checked;
var t=document.forms["RegistrationForm"]["termbox"].checked;

if((isNaN(zip))) {
	 alert('Please enter a valid zip code');
	 document.forms["RegistrationForm"]["Zip"].focus();
    return false;
}

if((isNaN(telephone))) {
 alert('Please enter a valid telephone number');
	 document.forms["RegistrationForm"]["Telephone"].focus();
    return false;
}

if (v != 1) {
	 alert('You must check that U Gift It Organization can call the District Office.');
	 document.forms["RegistrationForm"]["verifybox"].focus();
    return false;
}

if (t != 1) {
	 alert('You must agree to the terms and conditions.');
	 document.forms["RegistrationForm"]["termbox"].focus();
    return false;
}

if (z != s) {
	 alert('Your passwords do not match.');
	 document.forms["RegistrationForm"]["password"].focus();
    return false;
}
var x=document.forms["RegistrationForm"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  document.forms["RegistrationForm"]["email"].focus();
  return false;
  }

var y=document.forms["RegistrationForm"]["emailConf"].value;
var atpos=y.indexOf("@");
var dotpos=y.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=y.length)
  {
  alert("Not a valid e-mail address");
  document.forms["RegistrationForm"]["emailConf"].focus();
  return false;
  } 
if (x != y) {
	 alert('Your e-mail addresses do not match.');
	 document.forms["RegistrationForm"]["email"].focus();
    return false;
}
if (z.length == 0) {
	 alert('Please enter a password');
	 document.forms["RegistrationForm"]["password"].focus();
    return false;
}
if (name.length == 0) {
	 alert('Please enter a church name');
	 document.forms["RegistrationForm"]["name"].focus();
    return false;
}
if (rep.length == 0) {
	 alert('Please enter a representative name');
	 document.forms["RegistrationForm"]["Rep"].focus();
    return false;
}
if (address.length == 0) {
	 alert('Please enter an address');
	 document.forms["RegistrationForm"]["Address"].focus();
    return false;
}
if (city.length == 0) {
	 alert('Please enter a city');
	 document.forms["RegistrationForm"]["City"].focus();
    return false;
}
if (state.length == 0) {
	 alert('Please enter a state');
	 document.forms["RegistrationForm"]["state"].focus();
    return false;
}
if (zip.length == 0) {
	 alert('Please enter a zip code');
	 document.forms["RegistrationForm"]["Zip"].focus();
    return false;
}
if (zip.length != 5) {
	 alert('Please enter a valid zip code');
	 document.forms["RegistrationForm"]["Zip"].focus();
    return false;
}
if (telephone.length == 0) {
	 alert('Please enter a telephone number');
	 document.forms["RegistrationForm"]["Telephone"].focus();
    return false;
}
if (telephone.length != 10) {
	 alert('Please enter a valid telephone number');
	 document.forms["RegistrationForm"]["Telephone"].focus();
    return false;
}
if (conf.length == 0) {
	 alert('Please enter your annual conference');
	 document.forms["RegistrationForm"]["conf"].focus();
    return false;
}
if (dis.length == 0) {
	 alert('Please enter your district');
	 document.forms["RegistrationForm"]["DIs"].focus();
    return false;
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
        <td width="65%"><a href="index.html"><img src="Logo-12.jpg" alt="Logo" name="Logo" width="150" height="57" id="Insert_logo" style="background: #CCCCC; color: #CCC;" /></a>&nbsp;&nbsp;<img src="connecting.jpg" width="212" height="20" alt="connecting" /></a></td>
   <td  width="20%" valign="top">
                <?php  if (isset($_SESSION['email'])) { echo ("<a href='assistance.php'><font size='4'><strong><u>REQUEST A GIFT</u></strong></font></a>"); }?>
				<?php if (!isset($_SESSION['email'])) { echo ("<a href='registration.php'><font size='2' color='#000000'><strong><u>REGISTRATION</u></strong></font></a>"); } ?>
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
			echo ("<td VALIGN='top'><font color='#000000' size='-2'><strong>Welcome " . $_SESSION['rep'] . "!</strong></font><br><a href='update.php'><font  size='-2'><strong><u>Update Account</u></strong></font></a><br><a href='logout.php'><font  size='-2'><strong><u>Log Out</u></strong></font></a></td>");
		} else {
			echo("<td width='15%'><form name='login' action='login.php' method='post' id='login'>
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
  
 <?php
 $exist = $_GET['exist'];
 if ($exist=="yes") {
	 echo("
  <font color='#FF0000'>The e-mail address you have selected is already in use. If you have forgotten your password, please click <a href='password.php'><font color='#000000'><U>Forgot Password?</U></font></a>  or enter another e-mail address to complete registration.</font><p></p>");
 }
 ?>
          <h2><strong><u>REGISTRATION</u></strong></h2>
<strong>&nbsp;&nbsp;&nbsp;Register Your Church</strong><br />
           &nbsp;&nbsp;&nbsp;<i>All fields are required</i></font><br>
          <hr size="3" border="none" align="left" width="75%" color="#990000" />
          <form action="regconfirm.php" method="post" name="RegistrationForm" id="RegistrationForm" onsubmit="return validateForm();">
<?php

$Name = $_SESSION['namer'];
$Rep = $_SESSION['repr'];
$Address = $_SESSION['addressr'];
$City = $_SESSION['cityr'];
$State = $_SESSION['stater'];
$Zip = $_SESSION['zipr'];
$Telephone = $_SESSION['phoner'];
$Email = $_SESSION['emailr'];
$Dis = $_SESSION['disr'];
$Conf = $_SESSION['confr'];

			echo "
              <p>Name of Church:
  <input type='text' name='name' id='nameChurch' size='50' required='required' value='" . $Name . "'/>
              </p>
              <p>Name of Representative:
  <input type='text' name='Rep' id='nameRep' required='required' value='" . $Rep . "'/>
              </p>
              <p>Church Address:
  <input type='text' name='Address' id='churchAddress' size='40' required='required' value='" . $Address . "'/>
              </p>
              <p>City:
  <input type='text' name='City' id='CityName' required='required' value='" . $City . "'/>
                &nbsp;&nbsp;&nbsp;State:
                <select name='state' size='1' required='required'>
				<option selected='"  . $State . "'/>" . $State . "</option>
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
                &nbsp;&nbsp;&nbsp;Zipcode:
                <input type='text' name='Zip' id='ZipCode' size='5' maxlength='5' required='required' value='" . $Zip . "'/>
              </p>
              <p>Church Telephone Number:
  <input name='telephone' id='Telephone' type='text' size='10' maxlength='10' onkeyup='if (this.value.length == 3) this.form.second.focus()' required='required' value='" . $Telephone . "'/>
                (format: 5551112222)
              </p>
              <p>Annual Conference:
  <input type='text' name='conf' id='AnnualConf' required='required' value='" . $Conf . "'/>
                District:
                <input type='text' name='Dis' id='District' required='required' value='" . $Dis . "'/>
              </p>
              <p>Email Address:
  <input type='text' name='email' id='EmailAdd' size='30' required='required' value='" . $Email . "'/>
                &nbsp;&nbsp;&nbsp;Confirm Email:
                <input type='text' name='emailConf' id='ConfEmail' size='30' required='required' value='" . $Email . "'/></p>
              <p>Password:
  <input type='password' name='password' id='pass' required='required'/>
                &nbsp;&nbsp;&nbsp;Confirm Password:
                <input type='password' name='confpassword' id='confpass' required='required'/>
                &nbsp;
              </p>
              <p>
                <input type='checkbox' name='verifybox' id='verify' />
                I verify that The U Gift It Organization can call the District Office to confirm this information
              </p>
              <p>
                <input type='checkbox' name='termbox' id='terms' required='required'/>
                I accept The U Gift It.org <a href='terms.html' title='Terms' target='_self'><font color='#990000'><u>terms and conditions</u></font></a>
              </p>
              <h5 align='center'>";
			  ?>
                <input type="submit" name="singup" id="singup" value="Sign Up" />
                &nbsp;&nbsp;
                <input type="reset" value="Reset" />
              </h5>
            </blockquote>
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
