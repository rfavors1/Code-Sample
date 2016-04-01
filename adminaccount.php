<?php session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();
	header( 'Location: updated.php?page=verify');       // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}
if (!isset($_SESSION['admin'])) {
	header( 'Location: updated.php?page=verify');
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin - Look Up Account</title>
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
function validateFormE()
{
var email=document.forms["SearchEmail"]["emaill"].value;
if (email.length==0)
{
alert("Enter a e-mail address");
document.forms["SearchEmail"]["emaill"].focus();
  return false;
  }	
}
function validateFormC()
{
var church=document.forms["SearchChurch"]["churchl"].value;
if (church.length==0)
{
alert("Enter a church name");
document.forms["SearchChurch"]["churchl"].focus();
  return false;
  }	
}
function validateFormR()
{
var rep=document.forms["SearchRep"]["repl"].value;
if (rep.length==0)
{
alert("Enter a representative name");
document.forms["SearchRep"]["repl"].focus();
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
function validateFormR()
{
var datefrom=document.forms["SearchDate"]["dateafrom"].value;
var dateto=document.forms["SearchDate"]["dateato"].value;
if (datefrom.length==0)
{
alert("Enter a date");
document.forms["SearchDate"]["dateafrom"].focus();
  return false;
  }	
  if (datefrom.length!=10)
{
alert("Enter a valid date");
document.forms["SearchDate"]["dateafrom"].focus();
  return false;
  }	
  if (dateto.length==0)
{
alert("Enter a date");
document.forms["SearchDate"]["dateato"].focus();
  return false;
  }	
  if (dateto.length!=10)
{
alert("Enter a valid date");
document.forms["SearchDate"]["dateato"].focus();
  return false;
  }	
}
function validateFormD()
{
var datefrom=document.forms["SearchDelDate"]["dateafrom"].value;
var dateto=document.forms["SearchDelDate"]["dateato"].value;
if (datefrom.length==0)
{
alert("Enter a date");
document.forms["SearchDelDate"]["dateafrom"].focus();
  return false;
  }	
  if (datefrom.length!=10)
{
alert("Enter a valid date");
document.forms["SearchDelDate"]["dateafrom"].focus();
  return false;
  }	
  if (dateto.length==0)
{
alert("Enter a date");
document.forms["SearchDelDate"]["dateato"].focus();
  return false;
  }	
  if (dateto.length!=10)
{
alert("Enter a valid date");
document.forms["SearchDelDate"]["dateato"].focus();
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
                	<?php if (isset($_SESSION['admin'])) { echo ("<br><a href='admin.php'><font size='3' color='#000000'><strong><u>Admin</u></strong></font></a>"); } ?>
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
  <p align="center">&nbsp;</p>
  <h2><u>Accounts</u></h2>
  <p><strong>Search Aphabetically by Church:</strong></p>
  <table width="90%">
  <tr>
  <td><a href="alphaccount.php?page=a"><font color="#990000"><u><strong>A</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=b"><font color="#990000"><u><strong>B</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=c"><font color="#990000"><u><strong>C</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=d"><font color="#990000"><u><strong>D</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=e"><font color="#990000"><u><strong>E</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=f"><font color="#990000"><u><strong>F</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=g"><font color="#990000"><u><strong>G</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=h"><font color="#990000"><u><strong>H</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=i"><font color="#990000"><u><strong>I</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=j"><font color="#990000"><u><strong>J</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=k"><font color="#990000"><u><strong>K</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=l"><font color="#990000"><u><strong>L</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=m"><font color="#990000"><u><strong>M</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=n"><font color="#990000"><u><strong>N</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=o"><font color="#990000"><u><strong>O</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=p"><font color="#990000"><u><strong>P</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=q"><font color="#990000"><u><strong>Q</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=r"><font color="#990000"><u><strong>R</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=s"><font color="#990000"><u><strong>S</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=t"><font color="#990000"><u><strong>T</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=u"><font color="#990000"><u><strong>U</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=v"><font color="#990000"><u><strong>V</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=w"><font color="#990000"><u><strong>W</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=x"><font color="#990000"><u><strong>X</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=y"><font color="#990000"><u><strong>Y</strong></u></font></a></td>
  <td><a href="alphaccount.php?page=z"><font color="#990000"><u><strong>Z</strong></u></font></a></td>
  </tr>
  </table>
   <p>&nbsp;</p>
     <p><strong>Search Aphabetically by Representative Name:</strong></p>
  <table width="90%">
  <tr>
  <td><a href="alphrep.php?page=a"><font color="#990000"><u><strong>A</strong></u></font></a></td>
  <td><a href="alphrep.php?page=b"><font color="#990000"><u><strong>B</strong></u></font></a></td>
  <td><a href="alphrep.php?page=c"><font color="#990000"><u><strong>C</strong></u></font></a></td>
  <td><a href="alphrep.php?page=d"><font color="#990000"><u><strong>D</strong></u></font></a></td>
  <td><a href="alphrep.php?page=e"><font color="#990000"><u><strong>E</strong></u></font></a></td>
  <td><a href="alphrep.php?page=f"><font color="#990000"><u><strong>F</strong></u></font></a></td>
  <td><a href="alphrep.php?page=g"><font color="#990000"><u><strong>G</strong></u></font></a></td>
  <td><a href="alphrep.php?page=h"><font color="#990000"><u><strong>H</strong></u></font></a></td>
  <td><a href="alphrep.php?page=i"><font color="#990000"><u><strong>I</strong></u></font></a></td>
  <td><a href="alphrep.php?page=j"><font color="#990000"><u><strong>J</strong></u></font></a></td>
  <td><a href="alphrep.php?page=k"><font color="#990000"><u><strong>K</strong></u></font></a></td>
  <td><a href="alphrep.php?page=l"><font color="#990000"><u><strong>L</strong></u></font></a></td>
  <td><a href="alphrep.php?page=m"><font color="#990000"><u><strong>M</strong></u></font></a></td>
  <td><a href="alphrep.php?page=n"><font color="#990000"><u><strong>N</strong></u></font></a></td>
  <td><a href="alphrep.php?page=o"><font color="#990000"><u><strong>O</strong></u></font></a></td>
  <td><a href="alphrep.php?page=p"><font color="#990000"><u><strong>P</strong></u></font></a></td>
  <td><a href="alphrep.php?page=q"><font color="#990000"><u><strong>Q</strong></u></font></a></td>
  <td><a href="alphrep.php?page=r"><font color="#990000"><u><strong>R</strong></u></font></a></td>
  <td><a href="alphrep.php?page=s"><font color="#990000"><u><strong>S</strong></u></font></a></td>
  <td><a href="alphrep.php?page=t"><font color="#990000"><u><strong>T</strong></u></font></a></td>
  <td><a href="alphrep.php?page=u"><font color="#990000"><u><strong>U</strong></u></font></a></td>
  <td><a href="alphrep.php?page=v"><font color="#990000"><u><strong>V</strong></u></font></a></td>
  <td><a href="alphrep.php?page=w"><font color="#990000"><u><strong>W</strong></u></font></a></td>
  <td><a href="alphrep.php?page=x"><font color="#990000"><u><strong>X</strong></u></font></a></td>
  <td><a href="alphrep.php?page=y"><font color="#990000"><u><strong>Y</strong></u></font></a></td>
  <td><a href="alphrep.php?page=z"><font color="#990000"><u><strong>Z</strong></u></font></a></td>
  </tr>
  </table>
   <p>&nbsp;</p>
   <form action="searchchurch.php" method="post" name="SearchChurch" id="VerifyForm" onsubmit="return validateFormC();">
     <p><strong>Search by Church Name: </strong><input type="text" name="churchl" size="30" id="church" required="required"/>&nbsp;&nbsp;&nbsp;<input type="submit" name="singup" id="singup" value="Search" /></p>
     </form>
     <form action="searchrep.php" method="post" name="SearchRep" id="SearchRep" onsubmit="return validateFormR();">
          <p><strong>Search by Representative Name: </strong><input type="text" name="repl" size="30" id="rep" required="required"/>&nbsp;&nbsp;&nbsp;<input type="submit" name="singup" id="singup" value="Search" /></p>
          </form>
      <form action="searchemail.php" method="post" name="SearchEmail" id="SearchEmail" onsubmit="return validateFormE();">   
      <p><strong>Search by E-mail Address: </strong><input type="text" name="emaill" id="EmailAdd" size="30" required="required"/>&nbsp;&nbsp;&nbsp;<input type="submit" name="singup" id="singup" value="Search" /></p>
      </form>
      <form action="searchregdate.php" method="post" name="SearchDate" id="SearchDate" onsubmit="return validateFormR();">
   <p><strong>Search by Registration Date: Between</strong> <i>(format: mm/dd/yyyy)</i><strong>:</strong> <input type="text" name="dateafrom" size="10" id="dateaa" required="required" placeholder="mm/dd/yyyy"/>&nbsp;&nbsp;<strong>and</strong>&nbsp;&nbsp;<input type="text" name="dateato" size="10" id="dateab" required="required" placeholder="mm/dd/yyyy"/>&nbsp;&nbsp;&nbsp;<input type="submit" name="singup" id="singup" value="Search" /></form></p>
   <form action="searchdeldate.php" method="post" name="SearchDelDate" id="SearchDelDate" onsubmit="return validateFormD();">
   <p><strong>Search by Deletion Date: Between</strong> <i>(format: mm/dd/yyyy)</i><strong>:</strong> <input type="text" name="dateafrom" size="10" id="dateaa" required="required" placeholder="mm/dd/yyyy"/>&nbsp;&nbsp;<strong>and</strong>&nbsp;&nbsp;<input type="text" name="dateato" size="10" id="dateab" required="required" placeholder="mm/dd/yyyy"/>&nbsp;&nbsp;&nbsp;<input type="submit" name="singup" id="singup" value="Search" /></form></p>
      <p><a href="deletedaccounts.php"><strong><font color="#990000"><u>Deleted Accounts</u></font></strong></a></p>
          <p>&nbsp;</p>
           <p align="center"><a href="admin.php"><img src='backbut.png'></a></p>
            <p>&nbsp;</p>
        <p align="center"><img src="Logo2-12.jpg" width="300" height="114" alt="Logo" /></p>
        <p align="center">&nbsp;</p>
 <div align="right"><br /><br /><strong>Join us on</strong> <a href="http://wwww.facebook.com/UGiftIt" target="_new"><img src="facebook.png" width="20" height="20"/></a>&nbsp;&nbsp;<a href="http://www.twitter.com/UGiftItOrg" target="_new"><img src="Twitterlogo.png" width="20" height="20"/></a>&nbsp;&nbsp;</div>
  </div>
  <div class="footer">
     <p align="center"><Strong><font color='#990000'>U Gift It</font></strong><br />
<font size="3"><i>connecting through sharing</i></font><br />
    <font size="2">© U Gift It, 2012. All rights reserved.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Designed by <a href="mailto: rfavors09@gmail.com"><u>Richard A. Favors, Jr.</u></a></font>
  <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
