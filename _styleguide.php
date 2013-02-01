<?php require 'header.htm'; require 'body.htm'; ?>
<style>
hr {clear:both; margin:20px 0;}
h6 {margin-bottom:15px;}
.row {margin-bottom:5px;}
.span1, .span2, .span3, .span4, .span6, .span12 {background:#bbb; text-align:center;}
</style>

<h1><?=$myCompany?> Styleguide</h1>
<hr>

<h1>This is an h1 tag</h1>
<h2>This is an h2 tag</h2>
<h3>This is an h3 tag</h3>
<h4>This is an h4 tag</h4>
<h5>This is an h5 tag</h5>
<h6>This is an h6 tag</h6>

<hr>
<h2>Typography &amp; Images</h2>
<p><img src="http://placehold.it/100x50" class="border align-r" alt=""><strong>The image to the right has classes of 'border' and 'align-r'</strong>. <em>Lorem ipsum dolor sit amet</em>, <a href="#">consectetur adipisicing elit</a>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <a href="#">ullamco laboris nisi ut aliquip ex ea commodo</a> consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<blockquote><strong>This is a blockquote</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</blockquote>

<pre><code>This is a code block... just in case it is needed for some reason</code></pre>

<p><img src="http://placehold.it/100x50" class="border align-l" alt=""><strong>The image to the left has classes of 'border' and 'align-l'</strong>. <em>Lorem ipsum dolor sit amet</em>, <a href="#">consectetur adipisicing elit</a>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <a href="#">ullamco laboris nisi ut aliquip ex ea commodo</a> consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<hr>
<h2>Lists</h2>
<ul class="bot-margin">
    <li>List Item One</li>
    <li>List Item Two</li>
    <li>List Item Three</li>
    <li>List Item Four</li>
</ul>

<ul class="bullets">
    <li>List Item w/ Bullets One</li>
    <li>List Item w/ Bullets Two</li>
    <li>List Item w/ Bullets Three</li>
    <li>List Item w/ Bullets Four</li>
</ul>

<ol>
    <li>Ordered List Item One</li>
    <li>Ordered List Item Two</li>
    <li>Ordered List Item Three</li>
    <li>Ordered List Item Four</li>
</ol>

<hr>
<h2>Buttons</h2>
<p><a href="#" class="btn">This is a Button</a></p>
<p><a href="#" class="btn btn-center">This is a Centered Button</a></p>

<hr>
<h2>Forms</h2>
<form id="commentForm" action="#" method="post">   
    <fieldset>            
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
        <div>
            <label for="Comments">Comments:</label>
            <textarea name="Comments" id="Comments" cols="40" rows="3"></textarea>
        </div>
            
        <div><input type="submit" value="Submit" name="Submit"></div>
        
    </fieldset>
</form>


<?php require 'footer.htm';