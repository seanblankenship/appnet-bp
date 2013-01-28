# Main Site Template

**Version:**        5.3.2


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
    } elseif (basename($_SERVER[PHP_SELF])=="events.php") {
        echo "";
    } elseif (basename($_SERVER[PHP_SELF])=="sitemap.php") {
        echo "Sitemap";
    } else {
        echo $myCompany;
    }
?>
```


### contact.php and ok.php

paste the following code: `<?php include "inc/contact.inc.php"; ?>`. if it is a real estate site, and you would like to use the expanded contact form, add the following code instead:

```php
<?php
    $is_real_estate = 1;
    include "inc/contact.inc.php";
?>
```


### Lightbox

add `$use_lightbox = "yes";` to the top of your document and `class="gallery"` must wrap the gallery (ie `<table class="gallery">` or `<ul class="gallery">`)

to use titles, add the title attribute to the anchor tag (ie `<a title="this is a title" href="#">IMG</a>`)
	

### Sexy Lightbox

add `$use_s_lightbox = "yes";` to the top of your document.

all links must be setup as follows (where XXXXXXXX is replaced with your numbers):

    <a href="PAGETOLOAD.htm?TB_iframe=true&amp;height=XXXXXXXX&amp;width=XXXXXXXX" rel="sexylightbox">text</a> 


### Displaying Twitter Feeds

paste the following code: `<?php include "inc/twitter.inc.php"; ?>`. then, edit that file to adjust your twitter id and post count. this file will create a `<ul>` with an id of 'twitter'. each tweet will be inside of a `<li>` that contains a `<div>` with a class of 'text' (contains the tweet) and one with a class of 'time' (contains the time the tweet was posted). 



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

As an example, if you wanted to create a 200px x 200px map with a zoom level of 15, you would type: `<?php echo google_map(200,200); ?>`. You wouldn't need to include the zoom level since it already defaults to 15.

Also, if you wanted to get a map based on an address that was not stored in the default variables in _config, use something similar to `<?php echo google_map(400,400,15,"123 King Street","Apt 1","Boone","NC",28607); ?>`


### email_link()

`email_link()` requires one argument; `$email`.

This function takes the email address entered into it and simply spits out that email address as a fully formed link.


### pr()

`pr()` requires one argument; `$arg`.

This function wraps whatever has been passed to it in `<pre>` tags and runs the `print_r()` function on the argument that has been passed.


### other functions

The other functions listed in inc/functions.php should not need explained. For the most part, they are automatically configured through the build process and should never need to be changed or set anywhere else.
