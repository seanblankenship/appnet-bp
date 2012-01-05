# Appnet Site Template

**Version:**        3.07

**Last Updated:**   January 4, 2012

    Changelog:

    v 3.07  updated sitemap.php to improve functionality
            updated date in include.config.php for 2012
            various syntax fixes and slight tweaks
            added email.php to the repo

    v 3.06  all pdfs linked from include.navigation.php now open in a new window by default
            can now open a link in a new window by adding _new to the end of the link (ie http://google.com_new)

    v 3.05  automated the sitemap.php file

    v 3.04  added pr() to functions.php; pr() wraps print_r() with <pre> tags and accepts a varible to be printed 

    v 3.03  removed unitpngfix as it is no longer needed
            removed rollover.js file and calls from various places (outdated and not used)
            added emailLink() function to write email links easier

    v 3.02  added pageName and included the config in header.htm (no longer have to add it in body.htm)
            formatting issue with header.htm

    v 3.01  fixed formatting issues on 404b.php
            updated jquery 1.6.4 to 1.7.1

    v 3.00  restructured entire site template           



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

### include.navigation.php

To open a link in a new window, add _new to the end of the link (ie default.php_new or http://google.com_new)

PDFs will always open in a new window by default


### if/else Code

use the code below as a starting point for body.htm or footer.htm files if needed

```php
<?php 
    if ($_REQUEST["subtype"] == "announcements") {
        echo "";
    } elseif (strpos($_SERVER['SCRIPT_FILENAME'],"events.php")>0) {
        echo "";
    } else {
        echo "";
    }
?>
```


### contact.php and ok.php

paste the following code and change `$pageName` to "contact", "contactRE", or "ok" `<?php include "include.pages.php"; ?>`


### Lightbox

add `$use_lightbox = "yes";` to the top of your document next to the `$pageName="XXXX"` variable (it will look like this `<?php $pageName="default"; $use_lightbox="yes"; ?>` )and `class="gallery"` must wrap the gallery (ie `<table class="gallery">` or `<ul class="gallery">`)

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


### Image Rollovers

For the rollovers to work, the rollover image must be the same names as the original image+o.jpg.
(i.e. if nav\_01.jpg is the original image, the rollover image must be named nav\_01o.jpg for this to work)
If you want to use .gif or .png files instead of .jpg files, all you need to do is open rollovers.js and find .jpg and replace with .gif or .png
