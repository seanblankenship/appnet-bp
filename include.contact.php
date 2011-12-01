<?php

	if ($pageName=="ok") {
		
		// write ok.php
		echo '<p>Your request was <strong>successfully submitted</strong>.</p><p>We will respond shortly. Thank you!</p>'."\n";
	
	} elseif ($pageName=="contact" || $pageName=="contactRE"){
		
		// edit who receives the contact form
		$myEmail=$myEmail;
		$cc="";
		$bcc="";
		
		// if cc or bcc are filled out, save the input in a variable
		$writeCc = ($cc=="") ? "" : '<input type="hidden" name="cc" value="'.$cc.'">';
		$writeBcc = ($bcc=="") ? "" : '<input type="hidden" name="bcc" value="'.$bcc.'">';
		
		// store each input as a function
		function writeName(){
			echo '<div class="clearfix"><label>Your Name: <span class="star">*</span></label><input class="required" type="text" size="30" name="name" value=""></div>'."\n";
		}
		function writeEmail(){
			echo '<div class="clearfix"><label>Email Address: <span class="star">*</span></label><input class="required email" type="text" size="30" name="Sender" value=""></div>'."\n";
		}
		function writeAddress(){
			echo '<div><label>Address:</label><input type="text" size="30" name="Address" value=""></div>'."\n";
		}
		function writeCity(){
			echo '<div><label>City:</label><input type="text" size="30" name="City" value=""></div>'."\n";
		}
		function writeState(){
			echo '<div><label>State:</label><select name="State"><option value="" selected></option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select></div>'."\n";	
		}
		function writeZip(){
			echo '<div><label>Zip:</label><input class="number" type="text" size="30" name="Zip" value=""></div>'."\n";
		}
		function writePhone(){
			echo '<div><label>Phone:</label><input class="digits" type="text" size="30" name="Phone" value=""></div>'."\n";
		}
		function writeContactType(){
			echo '<div><label>Contact Me By:</label><select name="Contact By"><option value="" selected><option value="Phone">Phone</option><option value="Email">Email</option></select></div>'."\n";	
		}
		function writeContactTime(){
			echo '<div><label>Best Time:</label><select name="Contact Time"><option value="" selected><option value="Anytime">Anytime</option><option value="Morning">Morning</option><option value="Afternoon">Afternoon</option><option value="Evening">Evening</option></select></div>'."\n";	
		}
		function writeInterest(){
			echo '<div><label>Interested In:</label><select name="Market"><option value="" selected><option value="Buying">Buying</option><option value="Leasing">Leasing</option><option value="Selling">Selling</option></select></div>'."\n";	
		}
		function writeMls(){
			echo '<div><label>MLS #:</label><input type="text" size="30" name="MLS" value=""></div>'."\n";
		}
		function writeListing(){
			echo '<div><label>Listing Title:</label><input type="text" size="30" name="Listing Title" value=""></div>'."\n";
		}
		function writeComments(){
			echo '<div><label>Comments:</label><textarea name="Comments" cols="40" rows="3"></textarea></div>'."\n";
		}
		function writeTowns(){
			echo '<div><label>Town(s):</label><input type="text" size="30" name="Town(s)" value=""></div>'."\n";
		}
		function writePriceRange(){
			echo '<div><label>Price Range:</label><input type="text" size="30" name="Price Range" value=""></div>'."\n";
		}
		function writeLotSize(){
			echo '<div><label>Lot Size:</label><input type="text" size="30" name="Lot Size" value=""></div>'."\n";
		}
		function writeBedrooms(){
			echo '<div><label>Bedrooms:</label><input type="text" size="30" name="Bedrooms" value=""></div>'."\n";
		}
		function writeBaths(){
			echo '<div><label>Bathrooms:</label><input type="text" size="30" name="Bathrooms" value=""></div>'."\n";
		}
		function writeRooms(){
			echo '<div><label>Total Rooms:</label><input type="text" size="30" name="Total Rooms" value=""></div>'."\n";
		}
		function writeStyle(){
			echo '<div><label>Style:</label><input type="text" size="30" name="Style" value=""></div>'."\n";
		}
		function writeSqFt(){
			echo '<div><label>Square Feet:</label><input type="text" size="30" name="Square Feet" value=""></div>'."\n";
		}
		function writeAge(){
			echo '<div><label>Age:</label><input type="text" size="30" name="Age" value=""></div>'."\n";
		}
		function writeGarage(){
			echo '<div><label>Garage:</label><input type="text" size="30" name="Garage" value=""></div>'."\n";
		}
		function writeBasement(){
			echo '<div><label>Basement:</label><input type="text" size="30" name="Basement" value=""></div>'."\n";
		}
		function writeHiddenFields(){
			echo '<div><script>document.write(\'<input type="'.$GLOBALS['input_type'].'" id="success" name="key" value="">\');</script></div>'."\n";
		}
		function writeButtons(){
			echo '<div><input type="submit" value="Submit" class="submit" name="Submit"><input type="reset" value="Reset" class="submit reset" name="Reset"></div>'."\n";
		}
		
		
		// write the correct form
		if ($pageName=="contact") {
		
			// write the hello message
			echo '<p>If you would like to contact us, please fill in the form below, add in any comments or questions, and then press submit. We will receive your information immediately and respond as soon as possible.</p>'."\n";
			
			// write the form
			echo '<form id="commentForm" action="email.php" method="post"><fieldset><input type="hidden" name="Subject" value="'.$myCompany.' Information Request"><input type="hidden" name="LocOK" value="ok.php"><input type="hidden" name="To" value="'.$myEmail.'">'.$writeCc.$writeBcc."\n";
			
			// write the functions as defined above
				writeName();
				writeEmail();
				writeAddress();
				writeCity();
				writeState();
				writeZip();
				writePhone();
				writeComments();
				
			// write the spam protection
				writeHiddenFields();
					
			// write the buttons
				writeButtons();
				
			echo '</fieldset></form>'."\n";
			
		} elseif ($pageName=="contactRE") {
			
			// write the hello message
			echo '<p>If you would like to contact us, please fill in the form below, add in any comments or questions, and then press submit. We will receive your information immediately and respond as soon as possible.</p>'."\n";
			
			// write the form
			echo '<form id="commentForm" action="email.php" method="post"><fieldset><input type="hidden" name="Subject" value="'.$myCompany.' Information Request"><input type="hidden" name="LocOK" value="ok.php"><input type="hidden" name="To" value="'.$myEmail.'">'.$writeCc.$writeBcc."\n";
			
			// write the functions as defined above
				writeName();
				writeEmail();
				writeAddress();
				writeCity();
				writeState();
				writeZip();
				writePhone();
				
			//echo '<p style="clear:both;">&nbsp;</p>';
				echo '<h3>Describe Your Perfect Home</h3>';
				writeTowns();
				writePriceRange();
				writeLotSize();
				writeBedrooms();
				writeBaths();
				writeRooms();
				writeStyle();
				writeSqFt();
				writeAge();
				writeGarage();
				writeBasement();
					
			//echo '<p style="clear:both;">&nbsp;</p>';
				echo '<h3>Other Criteria</h3>';
				writeComments();
				
			// write the spam protection
				writeHiddenFields();
				
			// write the buttons
				writeButtons();
				
			echo '</fieldset></form>'."\n";
			
		}
	} else { 
		die("you've done it wrong | check your pageName variable"); 
	} 
?>
