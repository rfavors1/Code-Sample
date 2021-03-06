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
<title>Home</title>
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
input
{
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:11px;
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
	margin-left: 15px;
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
  <table width="100%">
  <tr>
  <td width="60%">
  <?php
  $my_t=getdate(date("U"));
echo("<p><strong>$my_t[weekday], $my_t[month] $my_t[mday], $my_t[year]</strong></p>");
?>
<h3><font color='#990000'>The U Gift It Organization</font></h3>
<p>The U Gift It Organization grew from the seed planted by the grace of God through and in Jesus Christ. In Jesus, we learn to share tangible manifestations of grace. The U Gift It Organization provides an opportunity for people of this created world to connect and share a gift that helps meet the practical needs of God's people. So please, in the name of Jesus, see the needs of the world, pray about it, and then can u gift it. </p>
<p><strong>Help someone in need, give grace, be part of someone's story... U Gift It</strong></p>
<strong><font size="5"><p><font color='#990000'>U Gift It Categories</font></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="household-bills.php"><font color="#990000"><u>Household Bills</u></font></a></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="time-talents.php"><font color="#990000"><u>Time & Talents</u></font></a></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="clothing.php"><font color="#990000"><u>Clothing</u></font></a></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="food.php"><font color="#990000"><u>Food</u></font></a></p></font></strong>
  </td>
  <td width="40%" valign="top">
  <?php

if (!(isset($_SESSION['randomID']))) {
 $link = @mysql_connect('ugiftitorg.ipagemysql.com', 'ugiftitorg', 'JandW3610'); 
if (!$link) {
    
} else {
$TableName = "`Assistance`";
$Table = "`Register Fields`";
$Status = 'Fulfilled';
mysql_select_db(reg_ister_13_info);
 if (!(isset($_SESSION['number']))) {
$number ="SELECT * FROM $TableName";
$num = mysql_query($number);
$num_rows = mysql_num_rows($num);
$_SESSION['number'] = $num_rows;
 }
  if (!(isset($_SESSION['totalgifts']))) {
$totalgifts  ="SELECT * FROM $TableName WHERE Status = '$Status'";
$totalg = mysql_query($totalgifts);
$num_g = mysql_num_rows($totalg);
$_SESSION['totalgifts'] = $num_g;
  }
    if (!(isset($_SESSION['totaldollars']))) {
$totaldollars = "SELECT SUM(Amount) FROM $TableName WHERE Status = '$Status' AND (Type = 'Telephone' OR Type = 'Electricity/Gas' OR Type = 'Mortgage/Rent')";
$totald = mysql_query($totaldollars);
$totd=mysql_fetch_array($totald);
$_SESSION['totaldollars'] = $totd['SUM(Amount)'];
	}
 if ((isset($_SESSION['number']))) {
   echo("<font color='#990000' size='4'><strong>Total Requests: <font color='#000000'>" . $_SESSION['number'] . "</font><br>");
 }
 if ((isset($_SESSION['totalgifts']))) {
  echo("Total Gifts: <font color='#000000'>" . $_SESSION['totalgifts'] . "</font><br>");
 }
   if ((isset($_SESSION['totaldollars']))) {
  echo("Total Dollars Gifted: <font color='#000000'>$" . $_SESSION['totaldollars'] . "</font></strong></font>  <p>&nbsp;</p>");
   }
$random = rand(1,$_SESSION['number']);

$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";

$result=mysql_query($query);

$row = mysql_fetch_array($result);


if ($row) {
	 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	  if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
	$datev = strtotime($row['BillingDate']);
	
	if (($datec > $today) and ($datev > $today)){
$User = $row['Email'];
$q="SELECT * FROM $Table WHERE Email = '$User'";
$r=mysql_query($q);
$org=mysql_fetch_array($r);
mysql_close();
if($r) {
	echo("I am here 4");
	
$ID=$row['ID'];

$Request=$row['Request'];
$church=$org['Name of Church'];
$city=$org['City'];
$state=$org['State'];
$Type = $row['Type'];
$DateCreated = $row['DateCreated'];
$newdate = substr($DateCreated,5,2) . "/" . substr($DateCreated,8,2) . "/" . substr($DateCreated,0,4);
$BillingDate = $row['BillingDate'];
$newdateb = substr($BillingDate,5,2) . "/" . substr($BillingDate,8,2) . "/" . substr($BillingDate,0,4);
   $amount=$row['Amount'];
     $_SESSION['randomID'] = $ID;
  $_SESSION['randomRequest'] =  $Request;
$_SESSION['randomName'] = $church;
$_SESSION['randomCity'] = $city;
$_SESSION['randomState'] = $state;
$_SESSION['randomType'] = $Type;
$_SESSION['randomAmount'] =  $amount;
$_SESSION['daterequested'] = $newdate;
$_SESSION['duedate'] =  $newdateb;
$_SESSION['dateexpired'] =  $row['DateExpired'];
$_SESSION['billingdate'] = $BillingDate;

 if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
if ((strtotime($_SESSION['billingdate'])) > (strtotime($_SESSION['dateexpired']))) {		 
   $date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
	
	$diff = abs(strtotime($date1) - strtotime($date2)); 

$years   = floor($diff / (365*60*60*24)); 
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60); 
	
} else {
   $date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
$diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60); 

 } 
 } else {
	   $date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
$diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60); 
 }

	echo(" <table width='100%' align='right' cellspacing='0' cellpadding='0'>
	<tr>
 <td colspan='2' align='right'><font color='#FF0000' size='4'><strong>Expires: "); if ($days !=0) {echo($days . " d ");} if ($hour !=0) {echo($hour . " h ");} if ($minute !=0) {echo($minute . " m");}
   echo("</strong></font></td><td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr><tr><td bgcolor='#FFFFFF' colspan='3'>&nbsp;</td></tr>
   <tr><td bgcolor='#990000' width='55%'><strong><font color='#FFFFFF'>Date Requested: " . $_SESSION['daterequested'] . "</font></strong></td><td width='45%' bgcolor='#990000' align='right'><strong><font color='#FFFFFF'>Type: " . $_SESSION['randomType'] . "<font></strong></td>
	<td bgcolor='#FFFFFF'width='2%'>&nbsp;</td>
		</tr>
   <tr><td colspan='2' bgcolor='#990000'><strong><font color='#FFFFFF'>Type: " . $row['Type'] . "<font></strong></td>
	<td bgcolor='#FFFFFF'width='2%'>&nbsp;</td>
	</tr>
   <tr bgcolor='#CCCCCC'>
   <td width='55%'><strong>" . $church . "</strong></td>
   <td width='45%' align='right'><strong>" . $city . ", " . $state. "</strong></td></tr>
   <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   <tr><td colspan='2'>
   <table>
   <tr>
   <td width='11%' valign='top'><strong>Request:</strong></td>
     <td width='87%' valign='top'>" . $Request . "</td>
	 </tr>
	 </table>
	 <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   </tr>");
   if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
 echo("<tr><td colspan='3' valign='top'><strong>Billing Amount:</strong> $" . $amount . "<strong>&nbsp;&nbsp;&nbsp;&nbsp;Due Date:</strong> " . $newdateb . "</td>
   </tr>");
   }
   echo("<tr><td colspan='3'>&nbsp;</td></tr>
   <tr><td align='center' colspan='3'><a href='ugiftit.php?ID=" . $ID . "'><font color='990000'><u><strong>U GIFT IT</strong></u></font></a></td></tr>
 </table>");
  }
	} else {
		$random = rand(1,$_SESSION['number']);
		$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";
		$result=mysql_query($query);

        $row = mysql_fetch_array($result);
		 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	  if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
	$datev = strtotime($row['BillingDate']);

	while ($row and ($datec > $today) and ($datev > $today)) {
		$random = rand(1,$_SESSION['number']);
		$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";
		$result=mysql_query($query);

        $row = mysql_fetch_array($result);
		 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	  if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
	$datev = strtotime($row['BillingDate']);
	}
	} } else {
		while ($row and ($datec > $today)) {
			$random = rand(1,$_SESSION['number']);
		$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";
		$result=mysql_query($query);

        $row = mysql_fetch_array($result);
		 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
		}
	}
			
	
$User = $row['Email'];
$q="SELECT * FROM $Table WHERE Email = '$User'";
$r=mysql_query($q);
$org=mysql_fetch_array($r);
mysql_close();
if($r) {
	
$ID=$row['ID'];

$Request=$row['Request'];
$church=$org['Name of Church'];
$city=$org['City'];
$state=$org['State'];
$Type = $row['Type'];
   $amount=$row['Amount'];
   $DateCreated = $row['DateCreated'];
$newdate = substr($DateCreated,5,2) . "/" . substr($DateCreated,8,2) . "/" . substr($DateCreated,0,4);
$BillingDate = $row['BillingDate'];
$newdateb = substr($BillingDate,5,2) . "/" . substr($BillingDate,8,2) . "/" . substr($BillingDate,0,4);
  $_SESSION['randomID'] = $ID;
  $_SESSION['randomRequest'] =  $Request;
$_SESSION['randomName'] = $church;
$_SESSION['randomCity'] = $city;
$_SESSION['randomState'] = $state;
$_SESSION['randomType'] = $Type;
$_SESSION['randomAmount'] =  $amount;
$_SESSION['daterequested'] = $newdate;
$_SESSION['duedate'] =  $newdateb;
$_SESSION['dateexpired'] =  $row['DateExpired'];
$_SESSION['billingdate'] = $BillingDate;

 if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
if ((strtotime($_SESSION['billingdate'])) > (strtotime($_SESSION['dateexpired']))) {		 
  $date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60); 
	
} else {
$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
}
 } else {
	$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
 }

	echo(" <table width='100%' align='right' cellspacing='0' cellpadding='0'>
	<tr>
 <td colspan='2' align='right'><font color='#FF0000' size='4'><strong>Expires: "); if ($days !=0) {echo($days . " d ");} if ($hour !=0) {echo($hour . " h ");} if ($minute !=0) {echo($minute . " m");}
   echo("</strong></font></td><td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr><tr><td bgcolor='#FFFFFF' colspan='3'>&nbsp;</td></tr>
   <tr><td bgcolor='#990000' width='55%'><strong><font color='#FFFFFF'>Date Requested: " . $_SESSION['daterequested'] . "</font></strong></td><td width='45%' bgcolor='#990000' align='right'><strong><font color='#FFFFFF'>Type: " . $_SESSION['randomType'] . "<font></strong></td>
	<td bgcolor='#FFFFFF'width='2%'>&nbsp;</td>
	</tr>
   <tr bgcolor='#CCCCCC'>
   <td width='55%'><strong>" . $church . "</strong></td>
   <td width='45%' align='right'><strong>" . $city . ", " . $state. "</strong></td></tr>
   <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   <tr><td colspan='2'>
   <table>
   <tr>
   <td width='11%' valign='top'><strong>Request:</strong></td>
     <td width='87%' valign='top'>" . $Request . "</td>
	 </tr>
	 </table>
	 <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   </tr>");
   if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
 echo("<tr><td colspan='3' valign='top'><strong>Billing Amount:</strong> $" . $amount . "<strong>&nbsp;&nbsp;&nbsp;&nbsp;Due Date:</strong> " . $newdateb . "</td>
   </tr>");
   }
   echo("<tr><td colspan='3'>&nbsp;</td></tr>
   <tr><td align='center' colspan='3'><a href='ugiftit.php?ID=" . $ID . "'><font color='990000'><u><strong>U GIFT IT</strong></u></font></a></td></tr>
 </table>");
  }
}
	
	  } else {
	if (($datec > $today)){
$User = $row['Email'];
$q="SELECT * FROM $Table WHERE Email = '$User'";
$r=mysql_query($q);
$org=mysql_fetch_array($r);
mysql_close();
if($r) {
	
$ID=$row['ID'];

$Request=$row['Request'];
$church=$org['Name of Church'];
$city=$org['City'];
$state=$org['State'];
$Type = $row['Type'];
$DateCreated = $row['DateCreated'];
$newdate = substr($DateCreated,5,2) . "/" . substr($DateCreated,8,2) . "/" . substr($DateCreated,0,4);
$BillingDate = $row['BillingDate'];
$newdateb = substr($BillingDate,5,2) . "/" . substr($BillingDate,8,2) . "/" . substr($BillingDate,0,4);
  $_SESSION['randomID'] = $ID;
  $_SESSION['randomRequest'] =  $Request;
$_SESSION['randomName'] = $church;
$_SESSION['randomCity'] = $city;
$_SESSION['randomState'] = $state;
$_SESSION['randomType'] = $Type;
$_SESSION['randomAmount'] =  $amount;
$_SESSION['daterequested'] = $newdate;
$_SESSION['duedate'] =  $newdateb;
   $amount=$row['Amount'];
   $_SESSION['dateexpired'] =  $row['DateExpired'];
$_SESSION['billingdate'] = $BillingDate;

 if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
if ((strtotime($_SESSION['billingdate'])) > (strtotime($_SESSION['dateexpired']))) {		 
   $date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s");  
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
	
} else {
$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
}
 } else {
	$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
 }

	echo(" <table width='100%' align='right' cellspacing='0' cellpadding='0'>
	<tr>
  <td colspan='2' align='right'><font color='#FF0000' size='4'><strong>Expires: "); if ($days !=0) {echo($days . " d ");} if ($hour !=0) {echo($hour . " h ");} if ($minute !=0) {echo($minute . " m");}
   echo("</strong></font></td><td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr><tr><td bgcolor='#FFFFFF' colspan='3'>&nbsp;</td></tr>
   <tr><td bgcolor='#990000' width='55%'><strong><font color='#FFFFFF'>Date Requested: " . $_SESSION['daterequested'] . "</font></strong></td><td width='45%' bgcolor='#990000' align='right'><strong><font color='#FFFFFF'>Type: " . $_SESSION['randomType'] . "<font></strong></td>
	<td bgcolor='#FFFFFF'width='2%'>&nbsp;</td>
	</tr>
   <tr bgcolor='#CCCCCC'>
   <td width='55%'><strong>" . $church . "</strong></td>
   <td width='45%' align='right'><strong>" . $city . ", " . $state. "</strong></td></tr>
   <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   <tr><td colspan='2'>
   <table>
   <tr>
   <td width='11%' valign='top'><strong>Request:</strong></td>
     <td width='87%' valign='top'>" . $Request . "</td>
	 </tr>
	 </table>
	 <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   </tr>");
   if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
 echo("<tr><td colspan='3' valign='top'><strong>Billing Amount:</strong> $" . $amount . "<strong>&nbsp;&nbsp;&nbsp;&nbsp;Due Date:</strong> " . $newdateb . "</td>
   </tr>");
   } 
   echo("<tr><td colspan='3'>&nbsp;</td></tr>
   <tr><td align='center' colspan='3'><a href='ugiftit.php?ID=" . $ID . "'><font color='990000'><u><strong>U GIFT IT</strong></u></font></a></td></tr>
 </table>");
  }
	} else {
		$random = rand(1,$_SESSION['number']);
		$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";
		$result=mysql_query($query);

        $row = mysql_fetch_array($result);
		 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	  if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
	$datev = strtotime($row['BillingDate']);

	while ($row and ($datec > $today) and ($datev > $today)) {
		$random = rand(1,$_SESSION['number']);
		$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";
		$result=mysql_query($query);

        $row = mysql_fetch_array($result);
		 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	  if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
	$datev = strtotime($row['BillingDate']);
	}
	} } else {
		while ($row and ($datec > $today)) {
			$random = rand(1,$_SESSION['number']);
		$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";
		$result=mysql_query($query);

        $row = mysql_fetch_array($result);
		 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
		}
	}
			
	
$User = $row['Email'];
$q="SELECT * FROM $Table WHERE Email = '$User'";
$r=mysql_query($q);
$org=mysql_fetch_array($r);
mysql_close();
if($r) {
	
$ID=$row['ID'];

$Request=$row['Request'];
$church=$org['Name of Church'];
$city=$org['City'];
$state=$org['State'];
$Type = $row['Type'];
   $amount=$row['Amount'];
   $DateCreated = $row['DateCreated'];
$newdate = substr($DateCreated,5,2) . "/" . substr($DateCreated,8,2) . "/" . substr($DateCreated,0,4);
$BillingDate = $row['BillingDate'];
$newdateb = substr($BillingDate,5,2) . "/" . substr($BillingDate,8,2) . "/" . substr($BillingDate,0,4);
  $_SESSION['randomID'] = $ID;
  $_SESSION['randomRequest'] =  $Request;
$_SESSION['randomName'] = $church;
$_SESSION['randomCity'] = $city;
$_SESSION['randomState'] = $state;
$_SESSION['randomType'] = $Type;
$_SESSION['randomAmount'] =  $amount;
$_SESSION['daterequested'] = $newdate;
$_SESSION['duedate'] =  $newdateb;
$_SESSION['dateexpired'] =  $row['DateExpired'];
$_SESSION['billingdate'] = $BillingDate;

 if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
if ((strtotime($_SESSION['billingdate'])) > (strtotime($_SESSION['dateexpired']))) {		 
  $date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
	
} else {
$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s");  
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
}
 } else {
	 $date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
 }

	echo(" <table width='100%' align='right' cellspacing='0' cellpadding='0'>
	<tr>
 <td colspan='2' align='right'><font color='#FF0000' size='4'><strong>Expires: "); if ($days !=0) {echo($days . " d ");} if ($hour !=0) {echo($hour . " h ");} if ($minute !=0) {echo($minute . " m");}
   echo("</strong></font></td><td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr><tr><td bgcolor='#FFFFFF' colspan='3'>&nbsp;</td></tr>
   <tr><td bgcolor='#990000' width='55%'><strong><font color='#FFFFFF'>Date Requested: " . $_SESSION['daterequested'] . "</font></strong></td><td width='45%' bgcolor='#990000' align='right'><strong><font color='#FFFFFF'>Type: " . $_SESSION['randomType'] . "<font></strong></td>
	<td bgcolor='#FFFFFF'width='2%'>&nbsp;</td>
	</tr>
   <tr bgcolor='#CCCCCC'>
   <td width='55%'><strong>" . $church . "</strong></td>
   <td width='45%' align='right'><strong>" . $city . ", " . $state. "</strong></td></tr>
   <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   <tr><td colspan='2'>
   <table>
   <tr>
   <td width='11%' valign='top'><strong>Request:</strong></td>
     <td width='87%' valign='top'>" . $Request . "</td>
	 </tr>
	 </table>
	 <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   </tr>");
   if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
 echo("<tr><td colspan='3' valign='top'><strong>Billing Amount:</strong> $" . $amount . "<strong>&nbsp;&nbsp;&nbsp;&nbsp;Due Date:</strong> " . $newdateb . "</td>
   </tr>");
   }
   echo("<tr><td colspan='3'>&nbsp;</td></tr>
   <tr><td align='center' colspan='3'><a href='ugiftit.php?ID=" . $ID . "'><font color='990000'><u><strong>U GIFT IT</strong></u></font></a></td></tr>
 </table>");
  }
}
	  }
}
 else {
$random = rand(1,$_SESSION['number']);
		$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";
		$result=mysql_query($query);

        $row = mysql_fetch_array($result);
		 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	  if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
	$datev = strtotime($row['BillingDate']);

	while ($row and ($datec > $today) and ($datev > $today)) {
		$random = rand(1,$_SESSION['number']);
		$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";
		$result=mysql_query($query);

        $row = mysql_fetch_array($result);
		 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
	  if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
	$datev = strtotime($row['BillingDate']);
	}
	} } else {
		while ($row and ($datec > $today)) {
			$random = rand(1,$_SESSION['number']);
		$query="SELECT * FROM $TableName WHERE ID = '$random' AND Status != '$Status'";
		$result=mysql_query($query);

        $row = mysql_fetch_array($result);
		 $today = strtotime(date("Y-m-d"));
	$datec = strtotime($row['DateExpired']);
		}
	}
			
	
$User = $row['Email'];
$q="SELECT * FROM $Table WHERE Email = '$User'";
$r=mysql_query($q);
$org=mysql_fetch_array($r);
mysql_close();
if($r) {
	
$ID=$row['ID'];

$Request=$row['Request'];
$church=$org['Name of Church'];
$city=$org['City'];
$state=$org['State'];
$Type = $row['Type'];
   $amount=$row['Amount'];
   $DateCreated = $row['DateCreated'];
$newdate = substr($DateCreated,5,2) . "/" . substr($DateCreated,8,2) . "/" . substr($DateCreated,0,4);
$BillingDate = $row['BillingDate'];
$newdateb = substr($BillingDate,5,2) . "/" . substr($BillingDate,8,2) . "/" . substr($BillingDate,0,4);
  $_SESSION['randomID'] = $ID;
  $_SESSION['randomRequest'] =  $Request;
$_SESSION['randomName'] = $church;
$_SESSION['randomCity'] = $city;
$_SESSION['randomState'] = $state;
$_SESSION['randomType'] = $Type;
$_SESSION['randomAmount'] =  $amount;
$_SESSION['daterequested'] = $newdate;
$_SESSION['duedate'] =  $newdateb;
$_SESSION['dateexpired'] =  $row['DateExpired'];
$_SESSION['billingdate'] = $BillingDate;

 if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
if ((strtotime($_SESSION['billingdate'])) > (strtotime($_SESSION['dateexpired']))) {		 
   $date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
	
} else {
$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
}
 } else {
$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
 }

	echo(" <table width='100%' align='right' cellspacing='0' cellpadding='0'>
	<tr>
 <td colspan='2' align='right'><font color='#FF0000' size='4'><strong>Expires: "); if ($days !=0) {echo($days . " d ");} if ($hour !=0) {echo($hour . " h ");} if ($minute !=0) {echo($minute . " m");}
   echo("</strong></font></td><td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr><tr><td bgcolor='#FFFFFF' colspan='3'>&nbsp;</td></tr>
   <tr><td bgcolor='#990000' width='55%'><strong><font color='#FFFFFF'>Date Requested: " . $_SESSION['daterequested'] . "</font></strong></td><td width='45%' bgcolor='#990000' align='right'><strong><font color='#FFFFFF'>Type: " . $_SESSION['randomType'] . "<font></strong></td>
	<td bgcolor='#FFFFFF'width='2%'>&nbsp;</td>
	</tr>
   <tr bgcolor='#CCCCCC'>
   <td width='55%'><strong>" . $church . "</strong></td>
   <td width='45%' align='right'><strong>" . $city . ", " . $state. "</strong></td></tr>
   <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   <tr><td colspan='2'>
   <table>
   <tr>
   <td width='11%' valign='top'><strong>Request:</strong></td>
     <td width='87%' valign='top'>" . $Request . "</td>
	 </tr>
	 </table>
	 <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   </tr>");
   if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
 echo("<tr><td colspan='3' valign='top'><strong>Billing Amount:</strong> $" . $amount . "<strong>&nbsp;&nbsp;&nbsp;&nbsp;Due Date:</strong> " . $newdateb . "</td>
   </tr>");
   }
   echo("<tr><td colspan='3'>&nbsp;</td></tr>
   <tr><td align='center' colspan='3'><a href='ugiftit.php?ID=" . $ID . "'><font color='990000'><u><strong>U GIFT IT</strong></u></font></a></td></tr>
 </table>");
  }
}
}
} else {
	if ((isset($_SESSION['number']))) {
	   echo("<font color='#990000' size='4'><strong>Total Requests: <font color='#000000'>" . $_SESSION['number'] . "</font><br>");
	}
	    if ((isset($_SESSION['totalgifts']))) {
 echo("Total Gifts: <font color='#000000'>" . $_SESSION['totalgifts'] . "</font><br>");
		}
       if ((isset($_SESSION['totaldollars']))) {
	echo("Total Dollars Gifted: <font color='#000000'>$" . $_SESSION['totaldollars'] . "</font></strong></font>  <p>&nbsp;</p>");
	   }
 if(($Type == 'Telephone') or ($Type == 'Mortgage/Rent') or ($Type == 'Electricity/Gas')) {
if ((strtotime($_SESSION['billingdate'])) > (strtotime($_SESSION['dateexpired']))) {		 
$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
} else {
$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
}
 } else {
	$date1 = $_SESSION['dateexpired']; 
    $date2 = date("Y-m-d H:i:s"); 
   $diff = abs(strtotime($date1) - strtotime($date2)); 

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hour = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hour*60*60)/ 60);
 }

echo(" <table width='100%' align='right' cellspacing='0' cellpadding='0'>
<tr>
     <td valign='top' colspan='3'><strong><font color='#990000' size = '4'>Featured Request:</font></strong></td></tr>
	 <tr>
	 <td colspan='2' align='right'><font color='#FF0000' size='4'><strong>Expires: "); if ($days !=0) {echo($days . " d ");} if ($hour !=0) {echo($hour . " h ");} if ($minute !=0) {echo($minute . " m");}
   echo("</strong></font></td><td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr><tr><td bgcolor='#FFFFFF' colspan='3'>&nbsp;</td></tr>
   <tr><td bgcolor='#990000' width='55%'><strong><font color='#FFFFFF'>Date Requested: " . $_SESSION['daterequested'] . "</font></strong></td><td width='45%' bgcolor='#990000' align='right'><strong><font color='#FFFFFF'>Type: " . $_SESSION['randomType'] . "<font></strong></td>
	<td bgcolor='#FFFFFF'width='2%'>&nbsp;</td>
	</tr>
   <tr bgcolor='#CCCCCC'>
   <td width='55%'><strong>" . $_SESSION['randomName'] . "</strong></td>
   <td width='45%' align='right'><strong>" . $_SESSION['randomCity'] . ", " . $_SESSION['randomState'] . "</strong></td></tr>
   <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   <tr><td colspan='2'>
   <table>
   <tr>
   <td width='11%' valign='top'><strong>Request:</strong></td>
     <td width='87%' valign='top'>" . $_SESSION['randomRequest'] . "</td>
	 </tr>
	 </table>
	 <td bgcolor='#FFFFFF'width='2%'>&nbsp;</td></tr>
   </tr>");
   if(($_SESSION['randomType'] == 'Telephone') or ($_SESSION['randomType'] == 'Mortgage/Rent') or ($_SESSION['randomType'] == 'Electricity/Gas')) {
 echo("<tr><td colspan='3' valign='top'><strong>Billing Amount:</strong> $" . $_SESSION['randomAmount'] . "<strong>&nbsp;&nbsp;&nbsp;&nbsp;Due Date:</strong> " . $_SESSION['duedate'] ."</td>
   </tr>");
   }
   echo("<tr><td colspan='3'>&nbsp;</td></tr>
   <tr><td align='center' colspan='3'><a href='ugiftit.php?ID=" .  $_SESSION['randomID'] . "'><img src='ugiftitbut.png'></a></td></tr>
 </table>");
}
?>
</td>
</tr>
</table>
  <p>&nbsp;</p>
  <div class="contentcontainer">
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
