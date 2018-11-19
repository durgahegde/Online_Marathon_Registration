/*
      Shetty, Durgashree
      Acc No : jadrn061
      Project #3
      CS545 Fall 2017

*/

var msg = ['Please enter your first name',
           'Please enter your last name',
	       'Please enter your address ',
	       'Please enter your city',
	       'Please enter your state',
		   'Please enter your zip',
		   'Please enter your area code',
		   'Please enter your phone number prefix',
		   'Please enter your phone number',
	       'Please enter your email',
		   'Please enter your birth month',
		   'Please enter your birth date',
		   'Please enter your birth year'];
		   
function isValidState(state) {                                
        var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY");
        for(var i=0; i < stateList.length; i++) 
            if(stateList[i] == $.trim(state))
                return true;
        return false;
        } 
		
function isValidEmail(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
        }
		
function isValidDate(month,day,year) {
    var checkDate = new Date(year, month-1, day);    
    var checkDay = checkDate.getDate();
    var checkMonth = checkDate.getMonth()+1;
    var checkYear = checkDate.getFullYear();
    
    if(day == checkDay && month == checkMonth && year == checkYear)
        return true;    
     return false;    
        }  

function isEligible(year){
	var checkYear = year;
	var minYear = 1917 ;
	var maxYear = 2004 ;
	
	if ((checkYear > minYear) && (checkYear < maxYear)) 
        return true;
      return false;	
}
			

$(document).ready(function() {

	var h = new Array(17);
	h[0] = $('input[name="fname"]');	   
	h[1] = $('input[name="lname"]');
	h[2] = $('input[name="address1"]');
	h[3] = $('input[name="city"]');			   
	h[4] = $('input[name="state"]');
	h[5] = $('input[name="zip"]');
	h[6] = $('input[name="area_phone"]');
	h[7] = $('input[name="prefix_phone"]');
	h[8] = $('input[name="phone"]');
	h[9] = $('input[name="email"]');
	h[10] = $('input[name="month"]');
	h[11] = $('input[name="dated"]');
	h[12] = $('input[name="year"]');
	h[13] = $('input[name="gender"]');
	h[14] = $('input[name="exlevel"]');
	h[15] = $('input[name="cat"]');
	h[16] = $('input[name="user_pic"]');
	
	h[0].focus();	
	
	/* Ajax to check for dulicate */
	
	$(':submit').on('click', function(e) {
        e.preventDefault();
	$('#loadingmessage').show();
        var params = "email="+$('#email').val();
        var url = "duplicate_check.php?"+params;
        $.get(url, dup_handler);
	$('#loadingmessage').hide();
        });
    
    
function dup_handler(response) {
    if(response == "dup")
        $('#message_line').text("ERROR, Duplicate : The Email ID you have Entered is already registerd");
    else if(response == "OK") {
        $('form').serialize();
       $('#message_line').text("");
       return validateForm();
        }
    else
        alert(response);
    }
	
	/*$(':submit').on('click',function() {
		$('#message_line').text("");
	    return validateForm();
	    });*/
	    
	$(':reset').on('click',function() {
		h[0].focus();
		$('#message_line').text("");
		});
	    
	/*$('input').on('blur',function(e) {
		if($.trim(e.target.value)) $('#message_line').text('');
		});*/
		
    function isGenderSelected(){	
	var choice = h[13];
	var selected;
	$.each(choice, function(k,v) {
		if(this.checked) selected = v.value;
	});
    	if(selected)
		return true;
	else
		return false;
	}
	
	function isExLevelSelected(){	
	var choice = h[14];
	var selected;
	$.each(choice, function(k,v) {
		if(this.checked) selected = v.value;
	});
    	if(selected)
		return true;
	else
		return false;
	}
	
	function isCategorySelected(){	
	var choice = h[15];
	var selected;
	$.each(choice, function(k,v) {
		if(this.checked) selected = v.value;
	});
    	if(selected)
		return true;
	else
		return false;
	}
	    
	 function validateForm() {
	 	for(var i=0; i<13; i++) {
			if(!$.trim(h[i].val())) {
			    $('#message_line').text(msg[i]);
			    h[i].focus();
			    return false;
			    }
			   }
			   
		if(!isValidState(h[4].val())) {
            $('#message_line').text("The state appears to be invalid, "+
            "please use the two letter state abbreviation");
            h[4].focus();            
            return false;
            }
			
		if(!$.isNumeric(h[5].val())) {
            $('#message_line').text("The zip code appears to be invalid, "+
            "numbers only please. ");
            h[5].focus();            
            return false;
		   }
		
		if(h[5].val().length != 5) {
            $('#message_line').text("The zip code must have exactly five digits")
            h[5].focus();            
            return false;
            }
			
		if(!$.isNumeric(h[6].val())) {
            $('#message_line').text("The area code appears to be invalid, "+
            "numbers only please. ");
            h[6].focus();            
            return false;
            }
			
        if(h[6].val().length != 3) {
            $('#message_line').text("The area code must have exactly three digits")
            h[6].focus();            
            return false;
            }
			
		if(!$.isNumeric(h[7].val())) {
             $('#message_line').text("The phone number prefix appears to be invalid, "+
            "numbers only please. ");
            h[7].focus();            
            return false;
            }
			
        if(h[7].val().length != 3) {
            $('#message_line').text("The phone number prefix must have exactly three digits")
            h[7].focus();            
            return false;
            }
			
		if(!$.isNumeric(h[8].val())) {
            $('#message_line').text("The phone number appears to be invalid, "+
            "numbers only please. ");
            h[8].focus();            
            return false;
            }
			
        if(h[8].val().length != 4) {
            $('#message_line').text("The phone number must have exactly four digits")
            h[8].focus();            
            return false;
            } 
			
		if(!isValidEmail(h[9].val())) {
            $('#message_line').text("The email address appears to be invalid,");
            h[9].focus();            
            return false;
            }
		
		if(!isGenderSelected()) {
            $('#message_line').text("You did not indicate your Gender");        
            return false;
            }
		
        if(h[12].val().length != 4) {
            $('#message_line').text("The birth year must have exactly four digits")
            h[12].focus();            
            return false;
            } 
        
        if(!isValidDate(h[10].val(),h[11].val(),h[12].val())) {
            $('#message_line').text("The Date entered is invalid : expected pattern is MM/DD/YYYY");            
            return false;
            }
			
		if(!isEligible(h[12].val())) {
            $('#message_line').text("Marathon runner eligibility : 14 to 99 year");            
            return false;
            }
			
		if(!isExLevelSelected()) {
            $('#message_line').text("You did not indicate your Experience level");
           // h[14].focus();            
            return false;
            }
			
		if(!isCategorySelected()) {
            $('#message_line').text("You did not indicate your Category");
           // h[14].focus();            
            return false;
            }
			
		if(h[16].val() == ""){
			$('#message_line').text("Please upload your image");
			h[16].focus();
			return false; 
			}
				
		if((h[16][0].files[0].size)/1000 > 1000) {
			$('#message_line').text("Selected file is too big, 1 MB max");
            h[16].focus();
			return false;
		    }
			
		$('form').submit();	
		return true;
	};
	
	h[4].on('keyup', function() {
        h[4].val(h[4].val().toUpperCase());
        });
        
    h[6].on('keyup', function() {
        if(h[6].val().length == 3)
            h[7].focus();
            });
            
    h[7].on('keyup', function() {
        if(h[7].val().length == 3)
            h[8].focus();
            }); 

    h[10].on('keyup', function() {
        if(h[10].val().length == 2)
            h[11].focus();
            });
			
	h[11].on('keyup', function() {
        if(h[11].val().length == 2)
            h[12].focus();
            });
            		
	});
