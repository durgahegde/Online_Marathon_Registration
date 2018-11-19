<?php

/*
Shetty, Durgashree
      Acc No : jadrn061
      Project #3
      CS545 Fall 2017
*/

$bad_chars = array('$','%','?','<','>','php');

function check_post_only() {
if(!$_POST) {
    write_error_page("This scripts can only be called from a form.");
    exit;
    }
}

function write_error_page($msg) {
    write_header();
    echo "<h4>Sorry, an error occurred<br />",
    $msg,"</h4>";
    write_footer();
    }
    
function write_header() {
print <<<ENDBLOCK
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title>SDSU Marathon</title>
<link rel="stylesheet" type="text/css" href="formcssfile.css" />
    
</head>
<body>    
ENDBLOCK;
}

function write_footer() {
    echo "</body></html>";
    } 
    
    
function get_db_handle() {
    
    ########################################################            
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn061';
    $password = 'driven';
    $database = 'jadrn061';   
    ########################################################
        
    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page('SQL ERROR: Connection failed: '.mysqli_error($db));
        }
    return $db;
    }        
       
function close_connector($db) {
    mysqli_close($db);
    }    
      
  
    
?>
