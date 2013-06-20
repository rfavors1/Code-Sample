<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Add Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/css/style.css"); ?>">
</head>

<body>

<div class="container">
<div class="sidebar1">
    <ul class="nav">
      <li><a href="<?php echo site_url("dashboard/add_page"); ?>">Add Content</a></li>
      <li><a href="<?php echo site_url("dashboard/add_user"); ?>">Add Users</a></li>
      <li><a href="<?php echo site_url("dashboard/get_all_pages"); ?>">All Pages</a></li>
      <li><a href="<?php echo site_url("dashboard/get_all_users"); ?>">All Users</a></li>
      <li><a href="<?php echo site_url("search"); ?>">YouTube Search</a></li>
      <li><a href="<?php echo site_url("authenticate/logout"); ?>">Log Out</a></li>
    </ul>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <!-- end .sidebar1 --></div>
  <div class="content">
  <h2>Add Content</h2>
  <br />
  <?php if ( isset($error) ) {
	echo '<p class="error">' . $error . '</p>';  
  }
  ?>
  <form action="<?php echo site_url("dashboard/save_page_content"); ?>" method="post">
 <p><label for="PageName">Page Name: </label><input type="text" name="PageName" id="PageName" size="50" value="<?php if (isset($title)) { echo $title; }?>"></p>
 <p><label for="PageContent">Page Content: <textarea rows="6" cols="50" id="PageContent" name="PageContent"><?php if (isset($content)) { echo $content; }?></textarea></p>
<p align="center"><input type="submit" value="Submit"/></p>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>