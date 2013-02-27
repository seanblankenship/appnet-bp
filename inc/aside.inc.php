<aside>
    <section>
        <h3>How to Find Us</h3>
        <?=google_map(260,300)?>
    </section> 
    <section>
        <h3>Contact Information</h3>
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
            <li class="full"><strong>Email:</strong><br><?php 
                echo (!empty($myEmail)) ? email_link($myEmail) : ''; ?></li>
        </ul>
    </section>     
</aside>