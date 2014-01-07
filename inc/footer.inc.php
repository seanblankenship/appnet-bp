<footer class="row">
    <div class="span6">
        <h5>Site Navigation</h5>
        <ul class="sl"><?=nav($mainnav,0)?></ul>
    </div>
    <div class="span6">
        <h5>Contact Information</h5>
        <ul class="ci">
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
</footer>

<small>Copyright &copy; <?=$myDate?><?=(!empty($myCompany)) ? ' '.$myCompany : ''?>. <a href="<?=(!empty($myState)) ? $myStateurl[$myState] : 'http://www.appnet.com'?>"><?=(!empty($myState)) ? $myStatename[$myState].' ' : ''?>Web Design</a> by AppNet.com. <?=($pageName == "default") ? '<br><a href="sitemap.php">sitemap</a>' : ''?></small>
