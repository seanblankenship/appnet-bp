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
    
    // store each input as a variable
    $writeName          = '<div><label for="Name">Your Name: <span class="star">*</span></label><input class="required" type="text" size="30" name="Name" id="Name" value="" placeholder="Your Name (required)"></div>'."\n";
    $writeEmail         = '<div><label for="Sender">Email Address: <span class="star">*</span></label><input class="required email" type="text" size="30" name="Sender" id="Sender" value="" placeholder="Email Address (required)"></div>'."\n";
    $writeAddress       = '<div><label for="Address">Address:</label><input type="text" size="30" name="Address" id="Address" value=""></div>'."\n";
    $writeCity          = '<div><label for="City">City:</label><input type="text" size="30" name="City" id="City" value=""></div>'."\n";
    $writeState         = '<div><label for="State">State:</label><select name="State" id="State"><option value="" selected></option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select></div>'."\n";	
    $writeZip           = '<div><label for="Zip">Zip:</label><input class="number" type="text" size="30" name="Zip" id="Zip" value=""></div>'."\n";
    $writePhone         = '<div><label for="Phone">Phone:</label><input class="digits" type="text" size="30" name="Phone" id="Phone" value=""></div>'."\n";
    $writeContactType   = '<div><label for="Contact_By">Contact Me By:</label><select name="Contact_By" id="Contact_By"><option value="" selected><option value="Phone">Phone</option><option value="Email">Email</option></select></div>'."\n";	
    $writeContactTime   = '<div><label for="Contact_Time">Best Time:</label><select name="Contact_Time" id="Contact_Time"><option value="" selected><option value="Anytime">Anytime</option><option value="Morning">Morning</option><option value="Afternoon">Afternoon</option><option value="Evening">Evening</option></select></div>'."\n";	
    $writeInterest      = '<div><label for="Market">Interested In:</label><select name="Market" id="Market"><option value="" selected><option value="Buying">Buying</option><option value="Leasing">Leasing</option><option value="Selling">Selling</option></select></div>'."\n";	
    $writeMls           = '<div><label for="MLS">MLS #:</label><input type="text" size="30" name="MLS" id="MLS" value=""></div>'."\n";
    $writeListing       = '<div><label for="Listing_Title">Listing Title:</label><input type="text" size="30" name="Listing_Title" id="Listing_Title" value=""></div>'."\n";
    $writeComments      = '<div><label for="Comments">Comments:</label><textarea name="Comments" id="Comments" cols="40" rows="3"></textarea></div>'."\n";
    $writeTowns         = '<div><label for="Towns">Town(s):</label><input type="text" size="30" name="Towns" id="Towns" value=""></div>'."\n";
    $writePriceRange    = '<div><label for="Price_Range">Price Range:</label><input type="text" size="30" name="Price_Range" id="Price_Range" value=""></div>'."\n";
    $writeLotSize       = '<div><label for="Lot_Size">Lot Size:</label><input type="text" size="30" name="Lot_Size" id="Lot_Size" value=""></div>'."\n";
    $writeBedrooms      = '<div><label for="Bedrooms">Bedrooms:</label><input type="text" size="30" name="Bedrooms" id="Bedrooms" value=""></div>'."\n";
    $writeBaths         = '<div><label for="Bathrooms">Bathrooms:</label><input type="text" size="30" name="Bathrooms" id="Bathrooms" value=""></div>'."\n";
    $writeRooms         = '<div><label for="Total_Rooms">Total Rooms:</label><input type="text" size="30" name="Total_Rooms" id="Total_Rooms" value=""></div>'."\n";
    $writeStyle         = '<div><label for="Style">Style:</label><input type="text" size="30" name="Style" id="Style" value=""></div>'."\n";
    $writeSqFt          = '<div><label for="Square_Feet">Square Feet:</label><input type="text" size="30" name="Square_Feet" id="Square_Feet" value=""></div>'."\n";
    $writeAge           = '<div><label for="Age">Age:</label><input type="text" size="30" name="Age" id="Age" value=""></div>'."\n";
    $writeGarage        = '<div><label for="Garage">Garage:</label><input type="text" size="30" name="Garage" id="Garage" value=""></div>'."\n";
    $writeBasement      = '<div><label for="Basement">Basement:</label><input type="text" size="30" name="Basement" id="Basement" value=""></div>'."\n";
    $writeHiddenFields  = '<div><script>document.write(\'<input type="'.$GLOBALS['input_type'].'" id="success" name="key" value="">\');</script></div>'."\n";
    $writeButtons       = '<div><input type="submit" value="Submit" class="submit" name="Submit"><input type="reset" value="Reset" class="submit reset" name="Reset"></div>'."\n";

    // write the correct form
    if ($pageName=="contact") {
        // write the hello message
        echo '<p>If you would like to contact us, please fill in the form below, add in any comments or questions, and then press submit. We will receive your information immediately and respond as soon as possible.</p>'."\n";
        
        // write the form
        echo '<form id="commentForm" action="email.php" method="post"><fieldset><input type="hidden" name="Subject" value="'.$myCompany.' Information Request"><input type="hidden" name="LocOK" value="ok.php"><input type="hidden" name="To" value="'.$myEmail.'">'.$writeCc.$writeBcc."\n";
			
        // write the inputs as defined above
        echo $writeName;
        echo $writeEmail;
        echo $writeAddress;
        echo $writeCity;
        echo $writeState;
        echo $writeZip;
        echo $writePhone;
        echo $writeComments;
			
        // write the spam protection
        echo $writeHiddenFields;
					
        // write the buttons
        echo $writeButtons;
			
        echo '</fieldset></form>'."\n";
			
    } elseif ($pageName=="contactRE") {
        // write the hello message
        echo '<p>If you would like to contact us, please fill in the form below, add in any comments or questions, and then press submit. We will receive your information immediately and respond as soon as possible.</p>'."\n";
			
        // write the form
        echo '<form id="commentForm" action="email.php" method="post"><fieldset><input type="hidden" name="Subject" value="'.$myCompany.' Information Request"><input type="hidden" name="LocOK" value="ok.php"><input type="hidden" name="To" value="'.$myEmail.'">'.$writeCc.$writeBcc."\n";
			
        // write the inputs as defined above
        echo $writeName;
        echo $writeEmail;
        echo $writeAddress;
        echo $writeCity;
        echo $writeState;
        echo $writeZip;
        echo $writePhone;
				
        echo '<h3>Describe Your Perfect Home</h3>';
        echo $writeTowns;
        echo $writePriceRange;
        echo $writeLotSize;
        echo $writeBedrooms;
        echo $writeBaths;
        echo $writeRooms;
        echo $writeStyle;
        echo $writeSqFt;
        echo $writeAge;
        echo $writeGarage;
        echo $writeBasement;
				
        echo '<h3>Other Criteria</h3>';
        echo $writeComments;

        // write the spam protection
        echo $writeHiddenFields;
				
        // write the buttons
        echo $writeButtons;
				
        echo '</fieldset></form>'."\n";
			
    }
} else { 
    die("you've done it wrong | check your pageName variable"); 
} 

?>
