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
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Request Date - Admin</title>
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
  <div class="contentcontainer">
    <p align="center">&nbsp;</p>
  <strong><h2>Search by Date:</h2></strong>
    <table width="80%" align='center'>
  <tr>
  <?php
  $datea = $_GET['datea'];
  echo ("<h3><strong><u>Last " . $datea . "Days</u><strong></h3>");
  if ($datea == 30) {
   echo("<p align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='requestdate.php?datea=30'><font color='#000000'><u><strong>Last 30 Days</strong></u></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='requestdate.php?datea=60'><font color='#990000'><u><strong>Last 60 Days</strong></u></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='requestdate.php?datea=90'><font color='#990000'><u><strong>Last 90 Days</strong></u></font></a></p>");
  } elseif ($datea == 60) {
	  echo("<p align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='requestdate.php?datea=30'><font color='#990000'><u><strong>Last 30 Days</strong></u></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='requestdate.php?datea=60'><font color='#000000'><u><strong>Last 60 Days</strong></u></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='requestdate.php?datea=90'><font color='#990000'><u><strong>Last 90 Days</strong></u></font></a></p>");  
  } else {
	  echo("<p align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='requestdate.php?datea=30'><font color='#990000'><u><strong>Last 30 Days</strong></u></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='requestdate.php?datea=60'><font color='#990000'><u><strong>Last 60 Days</strong></u></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='requestdate.php?datea=90'><font color='#000000'><u><strong>Last 90 Days</strong></u></font></a></p>");  
  }
  
  echo ("<h3><strong><u>Last " . $datea . "Days</u><strong></h3>");
 $link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) { 
echo("<script>
<!--
location.replace('updated.php?page=error');
-->
</script>"); 
} 
$TableName = "`Assistance`";
$up = 'Yes';
mysql_select_db(reg_ister_13_info);

$query="SELECT * FROM $TableName WHERE Deleted !='$up'";


$result=mysql_query($query);

$row = mysql_fetch_array($result);
mysql_close();
if (!$row) {
		echo("<div align='center'><p></p> <p align='center'>&nbsp;</p>There are no request listings at this time.<p><p></div>
          <p align='center'>&nbsp;</p>
          <p align='center'><a href='adminrequest.php'><img src='backbut.png'></a></p>
		  <p align='center'>&nbsp;</p>
		  <p align='center'><img src='Logo2-12.jpg' width='300' height='114' alt='Logo' /></p>
		  <p align='center'>&nbsp;</p>
		   <p align='center'>&nbsp;</p>
<p align='center'>&nbsp;</p>");
} else {
	$i = 0;
	while($row)
  {
	
	     $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	$datev = strtotime($row['BillingDate']);
	$datecreated = strtotime($row['DateCreated']);
	
	if ($datea == 30) {
		$searchdate =  date('Y-m-d', strtotime('-30 days')); 
	} elseif ($datea == 60) {
		$searchdate =  date('Y-m-d', strtotime('-60 days')); 
	} elseif ($datea == 90) {
		$searchdate =  date('Y-m-d', strtotime('-90 days')); 
	}
	if ($datecreated > strtotime($searchdate)) {
		  if ($i == 0) {
	  echo("<table width='70%' align='center'>
	  <tr>
	  <td><strong><u>ID</u></strong></td>
	  <td><strong><u>TYPE</u></strong></td>
	  <td><strong><u>STATUS</u></strong></td>
	  <td><strong><u>REQUESTOR</u></strong></td></tr>");
	  }
	if (($datec > $today) and ($datev > $today)){
	  echo("<tr><td><strong><a href='requestdetails.php?ID=" . $row['ID'] . "'><font color='#990000'><u><strong>" . $row['ID'] . "</strong></u></font></a></td><td><strong>" . $row['Type'] . "</strong></td><td><strong>" . $row['Status'] . "</strong></td><td><strong>" . $row['Email'] . "</strong></td></tr>");
	} else {
	echo("<tr><td><strong><a href='requestdetails.php?ID=" . $row['ID'] . "'><font color='#990000'><u><strong>" . $row['ID'] . "</strong></u></font></a></td><td><strong>" . $row['Type'] . "</strong></td><td><strong>Expired</strong></td><td><strong>" . $row['Email'] . "</strong></td></tr>");	
	}
	 $i++;
	}
	 
	   $row = mysql_fetch_array($result);
  }
 echo("</table><p></p>");
}
if ($i == 0) {
		echo("<div align='center'><p></p> <p align='center'>&nbsp;</p>There are no request listings at this time.<p><p></div>
          <p align='center'>&nbsp;</p>
          <p align='center'><a href='adminrequest.php'><img src='backbut.png'>></a></p>
		  <p align='center'>&nbsp;</p>
		  <p align='center'><img src='Logo2-12.jpg' width='300' height='114' alt='Logo' /></p>
		  <p align='center'>&nbsp;</p>
		   <p align='center'>&nbsp;</p>
<p align='center'>&nbsp;</p>");
} else {
	echo("   <p align='center'><a href='adminrequest.php'><img src='backbut.png'></a></p>
		  <p align='center'>&nbsp;</p>
		  <p align='center'><img src='Logo2-12.jpg' width='300' height='114' alt='Logo' /></p>
		  <p align='center'>&nbsp;</p>
		   <p align='center'>&nbsp;</p>");
}
?>
      
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
