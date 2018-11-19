<?php
/*
      Shetty, Durgashree
      Acc No : jadrn061
      Project #3
      CS545 Fall 2017

*/

$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn061';
$password = 'driven';
$database = 'jadrn061';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
$email =$_GET['email'];
$sql = "select * from runners_information where email='$email';";
mysqli_query($db, $sql);
$how_many = mysqli_affected_rows($db);
mysqli_close($db);
if($how_many > 0)
    echo "dup";
else if($how_many == 0)
    echo "OK";
else
    echo "ERROR, failure ".$how_many;
?>
