<?php

/*
      Shetty, Durgashree
      Acc No : jadrn061
      Project #3
      CS545 Fall 2017

*/

include('helpers.php');
include('p3.php');

check_post_only();
$params = process_parameters();
validate_data($params);
store_data_in_db($params);

include('file_upload.php');

include('confirmation.php');
?> 
