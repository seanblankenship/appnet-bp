<?php if($_REQUEST['m']!="product_detail"){ // this corrects an error with digishop and allows for all store functionality ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
<?php } ?>

<?php // spam protection ?>
<script>
    $.post("key_f.php", function(data) {
        $("#success").val(data);
        if ($("#success2").length > 0){
            $("#success2").val(data);
        }
    });
</script>

<?php // contact form validation
if($pageName=="contact" || $pageName=="contactRE" || $quickCommentForm=="1"){ ?>
<script src="js/jquery.validate.js"></script>
<script>
<?php if($pageName=="contact" || $pageName=="contactRE"){ ?>
    $(document).ready(function(){
        $("#commentForm").validate();
    });<?php } if ($quickCommentForm=="1") { ?>
    $(document).ready(function(){
        $("#quickCommentForm").validate();
    });<?php } ?>
</script>

<?php } // image fader
if ($fader=="1" && $pageName=="default") { ?>
<script src="js/jquery.innerfade.js"></script>
<script>
    $(function() {
        $("#fader").innerfade({
            animationtype: 'fade',
            speed: 1500,
            timeout: 4000,
            type: 'sequence',
            containerheight: '<?php echo($faderHeight); ?>'
        });
    });
</script>

<?php } // dropdown navigation
if ($dropdownnav=="1"){ ?>
<script>
    function mainmenu(){
        $("#navlist ul").css({display:"none"}); // Opera Fix
        $("#navlist li").hover(function(){
            $(this).find('ul:first').css({visibility:"visible",display:"none"}).show(400);
        },function(){
            $(this).find('ul:first').css({visibility:"hidden"});
        });
    }	
    $(document).ready(function(){
        mainmenu();
    });
</script>

<?php } // orgranic tabs
if($use_tabs=="yes"){ ?>
<script src="js/organictabs.jquery.js"></script>
<script>
$(function() {
    $("#description-box").organicTabs();
});
</script>

<?php } // twitter
if ($twitter_display=="1" && $pageName==$twitter_pageName) { ?>
<script src="js/jquery.twitter.js"></script>
<script>
    $("#twitter").getTwitter({
        userName: "<?php echo($twitter_name); ?>",
        numTweets: <?php echo($twitter_tweets); ?>,
        loaderText: "Loading tweets...",
        slideIn: false,
        showHeading: false,
        headingText: "Latest Tweets",
        showProfileLink: false
    });
</script>

<?php } // image rollovers
if ($rollovers=="1") { ?>
<script src="js/rollovers.js"></script>

<?php } // regular lightbox
if ($use_lightbox=="yes") { ?>
<script src="js/jquery.lightbox-0.5.min.js"></script>
<script>
    $(function() {
        $('.gallery a').lightBox();
    });
</script>

<?php } // sexy lightbox
if ($use_s_lightbox=="yes") { ?>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/s-lightbox.v2.2.jquery.min.js"></script>
<script>
    $(document).ready(function(){
        SexyLightbox.initialize({
            imagesdir: 'css/images',
            color:'white',
            OverlayStyles:{
                'background-color':'#000',
                'opacity': 0.6
            }
        });
    });
</script>

<?php } // installs chrome frame if ie6 ?>
<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->
