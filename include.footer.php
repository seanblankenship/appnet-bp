<footer>
    <div class="container clearfix">
        <div class="l">
            <h5>Site Navigation</h5>
            <ul class="sl clearfix"><?php 
                writeNavigation($mainnav,0,'');
				echo ($pageName == "default") ? '<li><a href="sitemap.php">Sitemap</a></li>' : '';
		    ?></ul>
            <small>Copyright &copy; <?php echo($myDate); ?><?php echo (!empty($myCompany)) ? ' '.$myCompany : ''; ?>.<br /><a href="<?php echo($myStateurl[$myState]); ?>"><?php echo($myStatename[$myState]); ?> Web Design</a> by AppNet.com.</small>
        </div>
        <div class="r">
            <div class="l">
                <h5>Contact Us Quickly</h5>
                <form id="quickCommentForm" action="email.php" method="post">
                    <input type="hidden" name="Subject" value="<?php echo($myCompany); ?> - Reach Us Quickly">
                    <input type="hidden" name="LocOK" value="ok.php">
                    <input type="hidden" name="To" value="<?php echo($myEmail); ?>">
                    <script>document.write('<input type="<?php echo($input_type); ?>" id="success2" name="key" value="">');</script>
                    <div id="reachQuickly">
                        <label for="Name">Name:</label><input type="text" name="Name" id="Name" class="required">
                        <label for="Sender">Email:</label><input type="text" name="Sender" id="Sender" class="required email">
                        <label for="Comments">Message:</label><textarea id="Comments" name="Comments"></textarea>
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
                        echo (!empty($myEmail)) ? emailLink($myEmail) : ''; ?></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
