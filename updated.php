<?php session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();   // unset $_SESSION variable for the runtime
} else {
$_SESSION['LAST_ACTIVITY'] = time();
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <?php
		  $Page = $_GET['page'];
		  if ($Page == 'updated') {
			  echo("<title>Account Updated</title>");
			  
		  } if ($Page == 'adminupdate') {
			  echo("<title>Account Updated</title>");
			  
		  } if ($Page == 'administrator') {
			  echo("<title>Admin</title>");
		  } if ($Page == 'verify') {
			  echo("<title>Admin</title>");
		  } if ($Page == 'notverified') {
			  echo("<title>Account Not Verified</title>");
		  } if ($Page == 'verified') {
			  echo("<title>Account Verified</title>");
		  }elseif ($Page == 'password') {
			  echo("<title>Password Updated</title>");
		  } elseif ($Page == 'reactivate') {
			  echo("<title>Account Re-Activate</title>");
		  } elseif ($Page == 'new') {
			  echo("<title>Account Updated</title>");
		  } elseif ($Page == 'editrequest') {
			  echo("<title>Request Updated</title>");  
		  }elseif ($Page == 'deleted') {
			  echo("<title>Account Deleted</title>");
		  } elseif ($Page == 'deleteadmin') {
			  echo("<title>Account Deleted</title>");
		  } elseif ($Page == 'password') {
			  echo("<title>Password Request</title>");
		  } elseif ($Page == 'feedback') {
			  echo("<title>Feedback</title>");
		  } elseif ($Page == 'logout') {
			  echo("<title>Logged Out</title>");
		  } elseif ($Page == 'confirmed') {
			echo("<title>Log In</title>");
		  } elseif ($Page == 'login') {
			echo("<title>Log In</title>");
		  } elseif ($Page == 'not') {
		 	 echo("<title>Log In</title>");
		  } elseif ($Page == 'invalid') {
			  echo("<title>Invalid E-mail/Password</title>");
		  } elseif ($Page == 'assistance') {
			  echo("<title>Please Log In</title>");
		  } elseif ($Page == 'update') {
			  echo("<title>Please Log In</title>");
		  } elseif ($Page == 'request') {
			  echo("<title>Please Log In</title>");
		  } elseif ($Page == 'newrequest') {
			  echo("<title>Request Submitted</title>");
		  } elseif ($Page == 'error') {
			  echo("<title>Please Try Again</title>");
		  } elseif ($Page == 'viewrequest') {
			  echo("<title>Please Log In</title>");
		  } elseif ($Page == 'delete') {
			  echo("<title>Please Log In</title>");
		  } elseif ($Page == 'deleterequest') {
			  echo("<title>Request Deleted</title>");
		  } elseif ($Page == 'deletingrequest') {
			  echo("<title>Please Log In</title>");
		  } 
		  ?> 
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

function Validate()
{
var email=document.forms["log"]["email"].value;
var password=document.forms["log"]["password"].value;

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
    <center>
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
  <h5>&nbsp;</h5>
          <h5>&nbsp;</h5>
          <?php
		  $Page = $_GET['page'];
		  if ($Page == 'updated') {
          echo("<div align='center'>Your account Information has been updated.<p></p><p></p></div>");
		  } elseif ($Page == 'adminupdate') {
          echo("<div align='center'>The account Information has been updated.<p></p><p></p></div>");
		  } elseif ($Page == 'new') {
			  echo("<div align='center'>Your account Information has been updated. Please check the e-mail you provided to confirm your new address.<p></p><p></p></div>");
		  }elseif ($Page == 'password') {
			  echo("<div align='center'>Your password has been updated. <p></p><p></p></div>");
		  } elseif ($Page == 'notverified') {
			  echo("<div align='center'>You must wait until your account is verified before logging into the site. <p></p><p></p></div>");
		  } elseif ($Page == 'deleted') {
			  echo("<div align='center'>Your account Information has been deleted.<p></p><p></p></div>");
		  } elseif ($Page == 'deleteadmin') {
			  echo("<div align='center'>The account Information has been deleted.<p></p><p></p></div>");
		  } elseif ($Page == 'reactivate') {
			  echo("<div align='center'>The account has been re-activated.<p></p><p></p></div>");
		  } elseif ($Page == 'deleterequest') {
			  echo("<div align='center'>Your request has been deleted.<p></p><p></p></div>");
		  } elseif ($Page == 'verified') {
			  echo("<div align='center'>Account verification updated.<p></p><p></p></div>");
		  } elseif ($Page == 'administrator') {
			  echo("<div align='center'>Account administrator updated.<p></p><p></p></div>");
		  } elseif ($Page == 'editrequest') {
			  echo("<div align='center'>Your request has been updated.<p></p><p></p></div>");
		  } elseif ($Page == 'password') {
			  echo("<div align='center'>Please check your email for password information.<p></p><p></p></div>");
		  } elseif ($Page == 'feedback') {
			  echo("<div align='center'>Thank you for contacting UGiftIt.org. We appreaciate your feedback. You will receive a reply within <em>2 Business Days</em>.<p></p><p></p></div>");
		  } elseif ($Page == 'newrequest') {
			  echo("Your request for assistance has been submitted. You will be contacted when someone has submitted a <strong>Gift It</strong> reply to your request. You may also delete or update this request at any time by logging in to the site.<p>");
		  } elseif ($Page == 'error') {
			  echo("<div align='center'><font color='#FF0000'>There has been an error with your request. We apologize for the inconvenience. Please try again. If the problem persists, please <a href='contact.php'><font color='#FF0000'><u>contact</u></font></a> the system administrator.<p><p>");
		  } elseif ($Page == 'logout') {
			  echo("<div align='center'>You have been successfully logged out.</div>");
		  } elseif ($Page == 'confirmed') {
			  echo("Thank you for confirming your e-mail address. You may continue with your log in once your account has been verified. If you have already received your verification confirmation, please continue with your log in.
          <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align='center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
				<center>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
				</center>
              </tr>
            </table>            
			<p>&nbsp;</p>
            <p> <center><input type='submit' name='singup' id='singup' value='Log In' /></center></p>
          </form>");
		  } elseif ($Page == 'login') {
			  echo("
          Thank you for completing your registration. Please check your e-mail to complete the registration process and confirm your e-mail address. Your account must be verified before you can continue with the log in. You should receive an e-mail in 3 to 5 business days confirming your verification. 
          <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align='center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  } elseif ($Page == 'not') {
			  echo("
          You must confirm your e-mail before attempting to log in. Please check your email to continue. If you need the email sent again <a href='send.php'><u><font color='#930000'>click here</font></u></a>.
		  <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align='center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  } elseif ($Page == 'invalid') {
			  echo("
          <font color='#FF0000'>Invalid e-mail address/passsword.</font>
		  <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align='center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  } elseif	 ($Page == 'assistance') {
			  session_start();
			  $_SESSION['page'] = "assistance"; 
		   echo("
          <font color='#FF0000'>You must be logged in before requesting assistance.</font>
		  <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align='center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  }	elseif	 ($Page == 'update') {
			  session_start();
			  $_SESSION['page'] = "update"; 
		   echo("
          <font color='#FF0000'>You must be logged in before updating your account information.</font>
		  <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align='center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  } elseif	 ($Page == 'request') {
			  session_start();
			  $_SESSION['page'] = "request"; 
		   echo("
          <font color='#FF0000'>You must be logged in before requesting assistance.</font>
		  <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align = 'center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  } elseif	 ($Page == 'verify') {
		   echo("
          <font color='#FF0000'>You must be logged in to view admin functions.</font>
		  <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align = 'center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  } elseif	 ($Page == 'viewrequest') {
			  session_start();
			  $_SESSION['page'] = "viewrequest"; 
		   echo("
          <font color='#FF0000'>You must be logged in before viewing your requests.</font>
		  <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align = 'center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  }  elseif	 ($Page == 'deletingrequest') {
			  session_start();
			  $_SESSION['page'] = "deletingrequest"; 
		   echo("
          <font color='#FF0000'>You must be logged in before deleting a request.</font>
		  <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align = 'center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  } elseif	 ($Page == 'delete') {
			  session_start();
			  $_SESSION['page'] = "delete"; 
		   echo("
          <font color='#FF0000'>You must be logged in order to delete your account. Deleting your account is PERMANENT.</font>
		  <p>
          <form name='log' action='login.php' method='post' id='login' onsubmit='return Validate();'>
            <table width='200' border='0' align = 'center'>
              <tr>
                <td>E-Mail:</td>
                <td><input type='text' name='email' id='login2' size='30' placeholder='e-mail'/></td>
              </tr>
              <tr>
                <td>Password: </td>
                <td><input type='password' name='password' id='loginpass2' size='30' placeholder='password'/></td>
              </tr>
            </table>            
			<p>&nbsp;</p>
			<center>
            <p> <input type='submit' name='singup' id='singup' value='Log In' /></p>
			</center>
          </form>");
		  } 
		  ?> 
          <br />
          <p align="center"><a href="index.php"><img src='homebut.png'></a>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p align="center"><img src="Logo2-12.jpg" width="300" height="114" alt="Logo" /></p>
          <p>&nbsp;</p>
        <p>&nbsp;</p></td>
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