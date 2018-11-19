<?php

/*
Shetty, Durgashree
      Acc No : jadrn061
      Project #3
      CS545 Fall 2017
*/

function validate_data($params) {
    $msg = "";
    if((strlen($params[0]) == 0) && (strlen($params[0]) == 0))
        $msg .= "Please enter the name<br />"; 
    elseif(strlen($params[0]) == 0)
        $msg .= "Please enter the first name<br />"; 
    elseif(strlen($params[1]) == 0)
        $msg .= "Please enter the last name<br />";	
    if(strlen($params[2]) == 0)
        $msg .= "Please enter the address<br />"; 
    if(strlen($params[3]) == 0)
        $msg .= "Please enter the city<br />"; 
    if(strlen($params[4]) == 0)
        $msg .= "Please enter the state<br />";                        
    if(strlen($params[5]) == 0)
        $msg .= "Please enter the zip code<br />";
    elseif(!is_numeric($params[5])) 
        $msg .= "Zip code may contain only numeric digits<br />";
    elseif(strlen($params[5]) !== 5)
        $msg .= "The zip code must have exactly five digits<br />";
    if((strlen($params[6]) == 0) && (strlen($params[7]) == 0) && 
          (strlen($params[8]) == 0))
        $msg .= "Please enter the Primary Phone Number<br />";
    elseif(!is_numeric($params[6]))
        $msg .= "The area code may contain only numeric digits <br />";
    elseif(strlen($params[6]) !== 3)
        $msg .= "The area code must have exactly three digits<br />";
    elseif(!is_numeric($params[7]))
        $msg .= "The phone number prefix may contain only numeric digits <br />";
    elseif(strlen($params[7]) !== 3)
        $msg .= "The phone number prefix must have exactly three digits<br />";
    elseif(!is_numeric($params[8]))
        $msg .= "The phone number may contain only numeric digits <br />";
    elseif(strlen($params[8]) !== 4)
        $msg .= "The phone number must have exactly four digits<br />";			
    if(strlen($params[9]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[9], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>"; 
    if(!isset($params[10]))
        $msg .= "Please select the Gender<br />";  
    if((strlen($params[11]) == 0) && 
        (strlen($params[12]) == 0) && (strlen($params[13]) == 0))
        $msg .= "Please enter the Date of birth<br />";
    if(!isset($params[14]))
        $msg .= "Please select the Experience level<br />";  
    if(!isset($params[15]))
        $msg .= "Please select the Category<br />"; 
    if (empty($_FILES['user_pic']['name']))
      $msg .= "Please upload your image<br />"; 
    elseif($_FILES['user_pic']['error'] > 0) {
    	$err = $_FILES['user_pic']['error'];	
	if($err == 1)
	$msg .= "The file was too big to upload, the limit is 2MB<br />";	
        } 
    elseif(exif_imagetype($_FILES['user_pic']['tmp_name']) != IMAGETYPE_JPEG)
       $msg .= "Uploaded file is not a jpg file.Please upload jpg file<br />";	               
     if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }
          
  
function write_form_error_page($msg) {
    write_header();
    echo "<h4>Sorry, an error occurred<br />",
    $msg,"</h4>";
    write_form();
    write_footer();
    }  
    
function write_form() {
    print <<<ENDBLOCK
	<fieldset>
	<legend>Personal Information</legend>
        <form  
        name="signupForm" enctype="multipart/form-data"  method="post"  action="process_request.php">
	
		  
		  <div class="imgbox">
		  <p>
		  <img src="images/imgicon.png" alt="img icon"/> <br>
			 <input type="file" id ="user_pic" name="user_pic" accept="image/*" />
		  <p>
		  </div>
		
		        
		<table>		
				
                <tr>		
                    <td><label for="fname"><sup>*</sup>First Name:</label></td>
                    <td><input type="text" name="fname" id="fname"  value="$_POST[fname]" size="20"  /></td>
					<td><label for="mname">Middle Name:</label></td>
                    <td><input type="text" name="mname" id="mname" size="20"  /></td>
                    <td><label for="lname"><sup>*</sup>Last Name:</label></td>
                    <td><input type="text" name="lname" id="lname" value="$_POST[lname]" size="20"  /></td>                    
                </tr>
				
                <tr>		
                    <td><label for="address1"><sup>*</sup>Address Line 1:</label></td>
                    <td colspan="5"><input type="text" name="address1" id="address1"  value="$_POST[address1]"size="50" /></td>
                </tr> 
				
                <tr>		
                    <td><label for="address2">Address Line 2:</label></td>
                    <td colspan="5"><input type="text" name="address2" id="address2" size="50" /></td>
                </tr>  
                
                <tr>		
                    <td><label for="city"><sup>*</sup>City:</label></td>
                    <td><input type="text" name="city" id="city" value="$_POST[city]" size="15" /></td>
                    <td><label for="state"><sup>*</sup>State:</label></td>
                    <td><input type="text" name="state" id="state"  value="$_POST[state]" size="4" maxlength="2"/></td>
                    <td><label for="zip"><sup>*</sup>Zipcode:</label></td>
                    <td><input type="text" name="zip" id="zip"  value="$_POST[zip]" size="10" maxlength="5"/></td>                                        
                </tr>     

                <tr> 
				<td><label for="phone"><sup>*</sup>Primary Phone:</label></td>
                <td colspan="5">(<input type="text" name="area_phone" id="phone" value="$_POST[area_phone]" size="3" maxlength="3" />)  &nbsp;&nbsp;
                 <input type="text" name="prefix_phone" value="$_POST[prefix_phone]" size="3" maxlength="3" /> &nbsp;-&nbsp;
                <input type="text" name="phone" value="$_POST[phone]" size="4" maxlength="4" /> </td>
				</tr>
				
				<tr>
                <td><label for="email"><sup>*</sup>EMail:</label>
                <td colspan="5"><input type="text" name="email" id="email" value="$_POST[email]" size="15" /></td>
                </tr>
				
				<tr>
                <td><label for="gender"><sup>*</sup>Gender:</label>
                <td><input type="radio" name="gender" value="male" />Male</td>
				<td colspan="2"><input type="radio" name="gender" value="female" />Female</td>
				<td colspan="2"><input type="radio" name="gender" value="other" />Other</td>
                </tr>

                <tr>
				<td><label for="dob"><sup>*</sup>Date of Birth:</label></td>
				<td colspan="5"><input type="text" id="monthd" value="$_POST[month]" size="2" maxlength="2" name="month" placeholder="MM"/>
                <input type="text" id="dated" size="2" maxlength="2" name="dated" value="$_POST[dated]" placeholder="DD"/>
                <input type="text" id="yeard" size="4"  maxlength="4" name="year" value="$_POST[year]" placeholder="YYYY" /> </td>
                </tr>

                <tr>
				<td><label for="medical">Medical Condition:</label></td>
				<td colspan="5"><textarea cols="40" rows="2" id="text_area"> </textarea> </td>
                </tr>

                <tr>
                <td><label for="exlevel"><sup>*</sup>Experience level:</label>
                <td><input type="radio" name="exlevel" value="expert" />Expert</td>
				<td colspan="2"><input type="radio" name="exlevel" value="experienced"/>Experienced</td>
				<td colspan="2"><input type="radio" name="exlevel" value="novice" />Novice</td>
                </tr>

                <tr>
                <td><label for="cat"><sup>*</sup>Category:</label>
                <td><input type="radio" name="cat" value="teen" />Teen</td>
				<td colspan="2"><input type="radio" name="cat" value="adult"/>Adult</td>
				<td colspan="2"><input type="radio" name="cat" value="senior" />Senior</td>
                </tr>				
				
            </table>
	    
            <div id="message_line">&nbsp;</div>
            
            <div class="buttons">
                <input type="reset" />
                <input type="submit" value="Submit" />
            </div>        
        </form>   
	</fieldset>
ENDBLOCK;
}                        

function process_parameters($params) {
    global $bad_chars;
    $params = array();
$params[] = trim(str_replace($bad_chars, "",$_POST['fname']));
$params[] = trim(str_replace($bad_chars, "",$_POST['lname']));
$params[] = trim(str_replace($bad_chars, "",$_POST['address1']));
$params[] = trim(str_replace($bad_chars, "",$_POST['city']));
$params[] = trim(str_replace($bad_chars, "",$_POST['state']));
$params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
$params[] = trim(str_replace($bad_chars, "",$_POST['area_phone']));
$params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone']));
$params[] = trim(str_replace($bad_chars, "",$_POST['phone']));
$params[] = trim(str_replace($bad_chars, "",$_POST['email']));
$params[] = ($_POST['gender']);
$params[] = trim(str_replace($bad_chars, "",$_POST['month']));
$params[] = trim(str_replace($bad_chars, "",$_POST['dated']));
$params[] = trim(str_replace($bad_chars, "",$_POST['year']));
$params[] = ($_POST['exlevel']);
$params[] = ($_POST['cat']);
$params[] = ($_POST['user_pic']);
    return $params;
    }
 
function store_data_in_db($params) {
    # get a database connection
    $db = get_db_handle();  ## method in helpers.php
    ##############################################################
    
    
    
    $fullName = $params[1]. "," . $params[0];
    $primaryPhone = $params[6].$params[7].$params[8];
    $dateofBirth = $params[13]."-". $params[11]."-".$params[12];
    
    $sql = "SELECT * FROM runners_information WHERE ".
    "name='$fullName' AND ".
    "address = '$params[2]' AND ".
    "city = '$params[3]' AND ".
    "state = '$params[4]' AND ".
    "zip = '$params[5]' AND ".
    "phoneNumber = '$primaryPhone'  AND ".
    "email = '$params[9]' AND ".
    "gender = '$params[10]' AND ".
    "DOB = '$dateofBirth' AND ".
    "experience_level  = '$params[14]' AND ".
    "category= '$params[15]' AND ".
    "image = '$primaryPhone' ;";   
    
##echo "The SQL statement is ",$sql;

$result = mysqli_query($db, $sql);
     if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate');
        exit;
        }
##OK, duplicate check passed, now insert
    $sql = "INSERT INTO runners_information(name,address,city,state,zip,phoneNumber,email,gender,DOB,experience_level,category,image) ".
    "VALUES('$fullName','$params[2]','$params[3]','$params[4]','$params[5]','$primaryPhone' ,'$params[9]','$params[10]','$dateofBirth','$params[14]','$params[15]','$primaryPhone');";
##echo "The SQL statement is ",$sql;    
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db); 
    
    ## echo("There were $how_many rows affected");
    close_connector($db);
    }   

        
?>   
