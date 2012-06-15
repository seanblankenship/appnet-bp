# Main Site Template

**Version:**        4.8.0

**Last Updated:**   June 15, 2012

**Changelog:**

	v 4.8.0	added mobile device detection by default
			added function that adds click to call functionality for phone numbers on mobile devices
			added ability to add google map not based on variables in _config using google_map()
			broke style.css up a little; moved some styles into css/forms.css and css/programming.css 
			refactored functions.php and updated most other files to reflect the changes

    v 4.7.1 bug fix with sitemap.php

    v 4.7.0 taking off spam checks code as it is no longer needed on our new email server

    v 4.6.1 updated style.css to include styling for search.php
            also added table of contents to stylesheet for ease of use

    v 4.6.0 deleted all 404 error info from this site template
            made small tweaks for php and stylesheet issues
            changed all links from appnet.com to www.appnet.com in copyright
            rebuilt sitemap page to be seperated by letter and fit into design instead of white page
            sitemap page now uses header.htm, body.htm and footer.htm to build itself (same as programming)

    v 4.5.1 minor code tweaks of things that were bugging me

    v 4.5.0 updated functions.php to include correct copyright links for new appnet.com

    v 4.4.4 updated style.css to delete media queries and restyled the warnings on the contact form
            created css/mq.css to deal with media queries in the future

    v 4.4.3 fixed includes on header.htm and footer.htm

    v 4.4.2 added a class of 'nobord' to kill border-bottom on links

    v 4.4.1 updated array bad_files in sitemap.php

    v 4.4.0 critical fix to sitemap.php

    v 4.3.0 updated inc/contact.inc.php to use 'for' correctly on labels
            small text changes/corrections
    
    v 4.2.0 renamed include files to cause less confusion

    v 4.1.0 fixed an error with inc/scripts.footer.php

    v 4.0.0 restructured the entire site template



## Programming Navigation Links
	
### Article Module

latest article

    article.php?table=article&amp;mode=search

all articles

    article_list.php?table=article&amp;mode=search&amp;archived=false


### Rental Module
    result.php?mode=search&amp;table=rental
	

### Photo Gallery Module

standard link

    photo_list.php?table=photo&amp;mode=search&amp;archived=false

categories link

    photo.php?table=photo&amp;mode=search&amp;feed=list
	

### Real Estate Module

    result.php?table=realman&amp;mode=search&amp;type=XXXXX
	

### Events Module

links to the large calendar

    events.php

links to the current day/week

```php
events.php?view=w&amp;m=<?php echo date("m"); ?>&amp;y=<?php echo date("Y"); ?>&amp;d=<?php echo date("d"); ?>
```



## functions.php 

### phone()

`phone()` takes on argument; `$pn`

To use this function, type something similar to: `<?php echo phone($myPhoneLocal); ?>`. This will check if the user is on a mobile device, and if they are, add the ability to click on the phone number to call. 

### write_imgs()

`write_imgs()` takes three arguments; they are `$f`, `$m`, and `$l`. These arguments translate to three parts of the filename of an image. This function is usually used in the inc/header.php file to write fader images.

To use this function, type something similar to: `<?php echo write_imgs('fader', '1', '.jpg'); ?>`. This will look for fader1.jpg in the directory and then, if it is found, write it and then look for fader2.jpg, etc...


### random_img()

`random_img()` takes three arguments; they are `$f`, `$m`, and `$l`. These arguments translate to three parts of the filename of an image.

To use this function, type something similar to: `<?php echo random_img('image', '1', '.jpg'); ?>`. This example searches the directory for image1.jpg then, in order, loads image1.jpg, image2.jpg, etc. into an array then spits out a random img.


### get_directions()

There are no arguments to pass to this function.

To use this function, just type: `<?php echo get_directions(); ?>`. It will, using the information found in _config.php, write a form in which the user can enter their address information. By pressing submit in this form, they are sent to a google map with directions from the location they entered to the location entered in _config.php


### google_map()

`google_map()` takes up to eight arguments; they are `$width`, `$height`, `$zoom`, `$addone`, `$addtwo`, `$city`, `$state`, and `$zip`. If no arguments are entered, these values are defaulted to '100%', '400', '15', $myAddressOne, $myAddressTwo, $myCity, $myState, and $myZip respectively.

To use this function in its most simple form, just type: `<?php echo google_map(); ?>`. This will create a map based on the information in _config.php with a width of 100%, a height of 400px, and a zoom level of 15. To change any of these values, just pass arguments to the function. Make sure if you are passing pixels values to not include 'px', only the number.

As an example, if you wanted to create a 200px x 200px map with a zoom level of 15, you would type: `<?php writeGoogleMap('200', '200'); ?>`. You wouldn't need to include the zoom level since it already defaults to 15.

Also, if you wanted to get a map based on an address that was not stored in the default variables in _config, use something similar to `<?php google_map(400,400,15,"123 King Street","Apt 1","Boone","NC",28607); ?>`


### email_link()

`email_link()` requires one argument; `$email`.

This function takes the email address entered into it and simply spits out that email address as a fully formed link.


### pr()

`pr()` requires one argument; `$arg`.

This function wraps whatever has been passed to it in `<pre>` tags and runs the `print_r()` function on the argument that has been passed.


### other functions

The other functions listed in inc/functions.php should not need explained. For the most part, they are automatically configured through the build process and should never need to be changed or set anywhere else.



## Instructions  

### /inc/navigation.inc.php

To open a link in a new window, add _new to the end of the link (ie default.php_new or http://google.com_new)

PDFs will always open in a new window by default


### if/else Code

use the code below as a starting point for body.htm or footer.htm files if needed

```php
<?php 
    if ($_REQUEST["table"] == "realman") {
        echo "";
    } elseif (strpos($_SERVER['SCRIPT_FILENAME'],"events.php")>0) {
        echo "";
    } else {
        echo $myCompany;
    }
?>
```


### contact.php and ok.php

paste the following code: `<?php include "inc/contact.php"; ?>`, then change `$pageName` to "contact", "contactRE", or "ok"


### Lightbox

add `$use_lightbox = "yes";` to the top of your document next to the `$pageName="XXXX"` variable (it will look like this `<?php $pageName="default"; $use_lightbox="yes"; ?>`) and `class="gallery"` must wrap the gallery (ie `<table class="gallery">` or `<ul class="gallery">`)

to use titles, add the title attribute to the anchor tag (ie `<a title="this is a title" href="#">IMG</a>`)
	

### Sexy Lightbox

add `$use_s_lightbox = "yes";` to the top of your doucment next to the `$pageName="XXXX"` variable, it will look like this:

```php
<?php $pageName="default"; $use_s_lightbox="yes"; ?>
```

finally, all links must be setup as follows:

    <a href="PAGETOLOAD.htm?TB_iframe=true&amp;height=XXXXXXXX&amp;width=XXXXXXXX" rel="sexylightbox">text</a> 


### Displaying Tweets

use `<div id="twitter"></div>` to display the tweets wherever you would like them to style the tweets, use the ul and ul li elements to target the unordered list that is created quick note: retweets will not show up in this list. if you have `$twitter_tweets` set to 5 and the last five posts that have been made are all retweets, nothing will show up (if 3 of last 5 posts were retweets, only the 2 real posts will display...it will return nothing for the 3 retweets)
