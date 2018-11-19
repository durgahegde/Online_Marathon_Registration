<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Person Report</title>
    <link rel=stylesheet href="reportcssfile.css">

</head>

<!--
      Shetty, Durgashree
      Acc No : jadrn061
      Project #3
      CS545 Fall 2017

-->

<body>

<div id="welcome_banner">
	<p>
	   <img src="images/sdsulogo.png" alt="sdsu logo"/> <span class = "textSize">SDSU Marathon Report</span> <img src="images/sdsulogo.png" alt="sdsu logo" />
	</p>	
 </div>
    
<?php
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn061';
$password = 'driven';
$database = 'jadrn061';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
else {
    $sql = "select name,DOB,experience_level,image from runners_information where "."category = 'Teen' order by name;"; 
   ## echo "sql sta",$sql ;
     
    $result = mysqli_query($db, $sql);
    if(!result)
        echo "ERROR in query".mysqli_error($db);
    
echo "<h2>Person Report: Category Teen</h2>";
echo "<table>\n";     
 while ($row = mysqli_fetch_array($result)){ 
$images_field= $row['image'];
$COMPUTER_DIR = 'im_ges/';;
$image_path = $COMPUTER_DIR.$images_field.'.jpg';
##$image_show= "/im_ges/$image_path";
$Name= $row['name'];
$dob = $row['DOB'];
     ##echo "dob is :",$dob ;
$DateofBirth = ageCalculator($dob);
$Experince_level= $row['experience_level'];

echo "<tr>\n"; 
echo "<td>\n"; 
echo "<p><img src=\"$image_path\""." width='100px'></p>";
echo "</td>\n";
echo nl2br ("<td> Name : $Name \n Age :$DateofBirth \n Experince_level :$Experince_level</td>"); 
echo "</tr>\n"; 
} 
echo "<table>\n";

$sql1 = "select name,DOB,experience_level,image from runners_information where "."category = 'Adult' order by name;"; 
   ## echo "sql1 sta",$sql1 ;
     
    $result = mysqli_query($db, $sql1);
    if(!result)
        echo "ERROR in query".mysqli_error($db);
    
echo "<h2>Person Report: Category Adult</h2>";
    echo "<table>\n";
         
 while ($row = mysqli_fetch_array($result)){ 
$images_field= $row['image'];
$COMPUTER_DIR = 'im_ges/';;
$image_path = $COMPUTER_DIR.$images_field.'.jpg';
##$image_show= "/im_ges/$image_path";
$Name= $row['name'];
$dob = $row['DOB'];
     ##echo "dob is :",$dob ;
$DateofBirth = ageCalculator($dob);
$Experince_level= $row['experience_level'];

echo "<tr>\n"; 
echo "<td>\n"; 
echo "<p><img src=\"$image_path\""." width='100px'></p>";
echo "</td>\n";
echo nl2br ("<td>Name : $Name \n Age :$DateofBirth \n Experince_level :$Experince_level</td>"); 
echo "</tr>\n"; 
    }
echo "</table>\n";


$sql2 = "select name,DOB,experience_level,image from runners_information where "."category = 'Senior' order by name;"; 
   ## echo "sql2 sta",$sql2 ;
     
    $result = mysqli_query($db, $sql2);
    if(!result)
        echo "ERROR in query".mysqli_error($db);
    
echo "<h2>Person Report: Category Senior</h2>";
    echo "<table>\n";
         
 while ($row = mysqli_fetch_array($result)){ 
$images_field= $row['image'];
$COMPUTER_DIR = 'im_ges/';;
$image_path = $COMPUTER_DIR.$images_field.'.jpg';
##$image_show= "/im_ges/$image_path";
$Name= $row['name'];
$dob = $row['DOB'];
     ##echo "dob is :",$dob ;
$DateofBirth = ageCalculator($dob);
$Experince_level= $row['experience_level'];

echo "<tr>\n"; 
echo "<td>\n"; 
echo "<p><img src=\"$image_path\""." width='100px'></p>";
echo "</td>\n";
echo nl2br ("<td>Name : $Name \n Age :$DateofBirth \n Experince_level :$Experince_level</td>"); 
echo "</tr>\n"; 
    }
echo "</table>\n";


		
    mysqli_close($db);
    }
    
function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }else{
        return 0;
    }
}    
?>

</body>
</html>
