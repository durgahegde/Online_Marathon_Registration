<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<!--
Shetty, Durgashree
      Acc No : jadrn061
      Project #3
      CS545 Fall 2017
-->

<head>
	<title>A Login Page</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />                 
<link rel=stylesheet href="reportcssfile.css">             	
</head>
<body>
<h1>A Login Example</h1>
<?php

$pass = $_POST['pass'];
$valid = false;

$raw = file_get_contents('password.secr');
$data = explode("\n",$raw);
foreach($data as $item) {
    $pair = explode('=',$item);
    if(crypt($pass,$pair[0]) === $pair[0]) 
            $valid = true;         
    }  #end foreach
    
if($valid){
    include 'report.php';
    
    }
else
    echo "Login Unsuccessful.";     
?>
</body>
</html>
