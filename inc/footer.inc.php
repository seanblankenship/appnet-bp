<footer>
    <div class="container clearfix">
        <div class="l">
            <h5>Site Navigation</h5>
            <ul class="sl clearfix"><?php 
                echo nav($mainnav,0);
				echo ($pageName == "default") ? '<li><a href="sitemap.php">Sitemap</a></li>' : '';
		    ?></ul>
            <small>Copyright &copy; <?php echo $myDate; ?><?php echo (!empty($myCompany)) ? ' '.$myCompany : ''; ?>. <a href="<?php echo (!empty($myState)) ? $myStateurl[$myState] : 'http://www.appnet.com'; ?>"><?php echo (!empty($myState)) ? $myStatename[$myState].' ' : ''; ?>Web Design</a> by AppNet.com.</small>
        </div>
        <div class="r">
            <div class="l">
                <h5>Contact Us Quickly</h5>
                <form id="reachQuickly" action="email.php" method="post">
                    <input type="hidden" name="Subject" value="<?php echo $myCompany; ?> - Reach Us Quickly">
                    <input type="hidden" name="LocOK" value="ok.php">
                    <input type="hidden" name="To" value="<?php echo $myEmail; ?>">
                    <div id="reachQuickly">
                        <label for="NameQ">Name:</label><input type="text" name="Name" id="NameQ" class="required" required>
                        <label for="SenderQ">Email:</label><input type="email" name="Sender" id="SenderQ" class="required email" required>
                        <label for="CommentsQ">Message:</label><textarea id="CommentsQ" name="Comments"></textarea>
                        <input type="submit" name="Submit" value="Submit" class="submit">
                    </div>
                </form>
            </div>
            <div class="r">
                <h5>Contact Information</h5>
                <ul class="ci clearfix">
                    <li><strong>Address:</strong><?php
                        echo (!empty($myCompany)) ? '<br>'.$myCompany : '';
                        echo (!empty($myAddressOne)) ? '<br>'.$myAddressOne : '';
                        echo (!empty($myAddressTwo)) ? '<br>'.$myAddressTwo : '';
                        echo (!empty($myCity)) ? '<br>'.$myCity.', '.$myState.' '.$myZip : ''; ?></li>
                    <li><strong>Phone:</strong><?php
                        echo (!empty($myPhoneLocal)) ? '<br>Ph: '.$myPhoneLocal : '';
                        echo (!empty($myPhoneTollFree)) ? '<br>Ph: '.$myPhoneTollFree : '';
                        echo (!empty($myFax)) ? '<br>Fax: '.$myFax : ''; ?></li>
                    <li><strong>Email:</strong><br><?php 
                        echo (!empty($myEmail)) ? email_link($myEmail) : ''; ?></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
