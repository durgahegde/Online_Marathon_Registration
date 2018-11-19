<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<!--
      Shetty, Durgashree
      Acc No : jadrn061
      Project #3
      CS545 Fall 2017

-->

<head>
	<title>Confirmation Page</title>

	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="file_upload.css" />
</head>

<body>

<?php
    $UPLOAD_DIR = 'im_ges/';
    $COMPUTER_DIR = '/home/jadrn061/public_html/proj3/im_ges/';
    $fname = $_FILES['user_pic']['name'];
    $file_ext = substr($fname, strripos($fname, '.'));
    $newName = $params[6].$params[7].$params[8].$file_ext;
    
## file is valid, copy from /tmp to your directory.        
     
move_uploaded_file($_FILES['user_pic']['tmp_name'], "$UPLOAD_DIR".$newName);
echo "<p><img src=\"$UPLOAD_DIR$newName\""." width='200px' /></p>\n";

    ?>

</body>
</html>     
    
