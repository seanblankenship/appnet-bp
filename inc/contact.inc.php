<?php

if ($pageName=="ok") {

    // write ok.php
    echo '<p>Your request was <strong>successfully submitted</strong>.</p><p>We will respond shortly. Thank you!</p>'."\n";

} else {

    // edit who receives the contact form
    $myEmail=$myEmail;
    $cc="";
    $bcc="";

    // if cc or bcc are filled out, save the input in a variable
    $writeCc = ($cc=="") ? "" : '<input type="hidden" name="cc" value="'.$cc.'">';
    $writeBcc = ($bcc=="") ? "" : '<input type="hidden" name="bcc" value="'.$bcc.'">';
    
    ?>
    
    <p>If you would like to contact us, please fill in the form below, add in any comments or questions, and then press submit. We will receive your information immediately and respond as soon as possible.</p>
    
    <form id="commentForm" action="email.php" method="post">   
        <fieldset>
            <input type="hidden" name="Subject" value="<?=$myCompany?> Information Request">
            <input type="hidden" name="LocOK" value="ok.php">
            <input type="hidden" name="To" value="<?=$myEmail?>">
            <?=$writeCc?>
            <?=$writeBcc?>
    			
            <div>
                <label for="Name">Your Name: <span class="star">*</span></label>
                <input class="required" type="text" size="30" name="Name" id="Name" value="" placeholder="Your Name (required)" autofocus required>
            </div>
            <div>
                <label for="Sender">Email Address: <span class="star">*</span></label>
                <input class="required email" type="email" size="30" name="Sender" id="Sender" value="" placeholder="Email Address (required)" required>
            </div>
            <div>
                <label for="Address">Address:</label>
                <input type="text" size="30" name="Address" id="Address" value="">
            </div>
            <div>
                <label for="City">City:</label>
                <input type="text" size="30" name="City" id="City" value="">
            </div>
            <div>
                <label for="State">State:</label>
                <select name="State" id="State"><option value="" selected></option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select>
            </div>
            <div>
                <label for="Zip">Zip:</label>
                <input class="number" type="text" size="30" name="Zip" id="Zip" value="">
            </div>
            <div>
                <label for="Phone">Phone:</label>
                <input class="digits" type="text" size="30" name="Phone" id="Phone" value="">
            </div>
            
        <?php if (isset($is_real_estate)) { ?>
            
            <h3>Describe Your Perfect Home</h3>
            <div>
                <label for="Towns">Town(s):</label>
                <input type="text" size="30" name="Towns" id="Towns" value="">
            </div>
            <div>
                <label for="Price_Range">Price Range:</label>
                <input type="text" size="30" name="Price_Range" id="Price_Range" value="">
            </div>
            <div>
                <label for="Lot_Size">Lot Size:</label>
                <input type="text" size="30" name="Lot_Size" id="Lot_Size" value="">
            </div>
            <div>
                <label for="Bedrooms">Bedrooms:</label>
                <input type="text" size="30" name="Bedrooms" id="Bedrooms" value="">
            </div>
            <div>
                <label for="Bathrooms">Bathrooms:</label>
                <input type="text" size="30" name="Bathrooms" id="Bathrooms" value="">
            </div>
            <div>
                <label for="Total_Rooms">Total Rooms:</label>
                <input type="text" size="30" name="Total_Rooms" id="Total_Rooms" value="">
            </div>
            <div>
                <label for="Style">Style:</label>
                <input type="text" size="30" name="Style" id="Style" value="">
            </div>
            <div>
                <label for="Square_Feet">Square Feet:</label>
                <input type="text" size="30" name="Square_Feet" id="Square_Feet" value="">
            </div>
            <div>
                <label for="Age">Age:</label>
                <input type="text" size="30" name="Age" id="Age" value="">
            </div>
            <div>
                <label for="Garage">Garage:</label>
                <input type="text" size="30" name="Garage" id="Garage" value="">
            </div>
            <div>
                <label for="Basement">Basement:</label>
                <input type="text" size="30" name="Basement" id="Basement" value="">
            </div>
    				
            <h3>Other Criteria</h3>
            
        <?php } ?>
            
            <div>
                <label for="Comments">Comments:</label>
                <textarea name="Comments" id="Comments" cols="40" rows="3"></textarea>
            </div>
    			
            <div><input type="submit" value="Submit" name="Submit"></div>
			
        </fieldset>
    </form>

<?php } ?>