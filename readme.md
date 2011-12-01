# Appnet Site Template
(based off of h5bp.com)

Developed by:   [Appnet][http://appnet.com]
Version:        3.0
Last Updated:   December 1, 2011

Changelog:

v 3.0           restructured entire site template           



##  programming navigation links
	
    ARTICLE MODULE
        article.php?table=article&amp;mode=search                           <-- latest article
        article_list.php?table=article&amp;mode=search&amp;archived=false   <-- all articles

    RENTAL MODULE
        result.php?mode=search&amp;table=rental
	
    PHOTO GALLERY MODULE
        photo_list.php?table=photo&amp;mode=search&amp;archived=false       <-- standard link
        photo.php?table=photo&amp;mode=search&amp;feed=list                 <-- categories link
	
    REAL ESTATE MODULE
        result.php?table=realman&amp;mode=search&amp;type=XXXXX
	
    EVENTS MODULE
        events.php                                                                                                      <-- links to the large calendar
        events.php?view=w&amp;m=<?php echo date("m"); ?>&amp;y=<?php echo date("Y"); ?>&amp;d=<?php echo date("d"); ?>  <-- links to the current day/week



## instructions

TWITTER
use <div id="twitter"></div> to display the tweets wherever you would like them to style the tweets, use the ul and ul li elements to target the unordered list that is created quick note: retweets will not show up in this list. if you have $twitter_tweets set to 5 and the last five posts that have been made are all retweets, nothing will show up (if 3 of last 5 posts were retweets, only the 2 real posts will display...it will return nothing for the 3 retweets)

CONTACT, 404B, OK
paste the following code and change $pageName to "contact", "contactRE", "404b", or "ok" <?php include "include.pages.php"; ?>
	
	IMAGE ROLLOVERS
		For the rollovers to work, the rollover image must be the same names as the original image+o.jpg.
		(i.e. if nav_01.jpg is the original image, the rollover image must be named nav_01o.jpg for this to work)
		If you want to use .gif or .png files instead of .jpg files, all you need to do is open rollovers.js and find .jpg and replace with .gif or .png
	
	IF/ELSE CODE
		use the code below as a starting point for body.htm or footer.htm files if needed
		<?php 
			if ( $_REQUEST["subtype"] == "announcements") {
				echo "";
			} elseif (strpos($_SERVER['SCRIPT_FILENAME'],"events.php")>0) {
				echo "";
			} else {
				echo "";
			}
		?>
	
	LIGHTBOX
		add $use_lightbox = "yes"; to the top of your doucment next to the $pageName="XXXX" variable
		(it will look like this <?php $pageName="default"; $use_lightbox="yes"; ?> )
		and class="gallery" must wrap the gallery (ie <table class="gallery"> or <ul class="gallery">)
		to use titles, add the title attribute to the anchor tag (ie <a title="this is a title" href="#">IMG</a>)
	
	S-LIGHTBOX
		add $use_s_lightbox = "yes"; to the top of your doucment next to the $pageName="XXXX" variable
		(it will look like this <?php $pageName="default"; $use_s_lightbox="yes"; ?> )
		links must be setup as follows:
		<a href="PAGETOLOAD.htm?TB_iframe=true&amp;height=XXXXXXXX&amp;width=XXXXXXXX" rel="sexylightbox">text</a>
