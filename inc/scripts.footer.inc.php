<?=((isset($_REQUEST['m'])) && ($_REQUEST['m']=="product_detail")) ? '' : '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>'?>
<script src="js/global-ck.js"></script>

<script>
<?php if($pageName=="contact" || $pageName=="contactRE"){ // comment form validation ?>
$(function() {
    $("#commentForm").validate();
});
<?php } if ($quickCommentForm=="1"){ ?>
$(function() {
    $("#quickCommentForm").validate();
});<?php } ?>

<?php if ($dropdownnav=="1"){ // dropdown navigation ?> 
function mainmenu(){
    $("#navlist ul").css({display:"none"});
    $("#navlist li").hover(function(){
        $(this).find('ul:first').css({visibility:"visible",display:"none"}).show(400);
    },function(){
        $(this).find('ul:first').css({visibility:"hidden"});
    });
}	
$(function() {
    mainmenu();
});<?php } ?>

<?php if ($fader=="1" && $pageName=="default"){ // image fader ?>      
$(function() {
    $("#fader").innerfade({
        animationtype: 'fade',
        speed: 1500,
        timeout: 4000,
        type: 'sequence',
        containerheight: '<?php echo($faderHeight); ?>'
    });
});<?php } ?>

<?php if ((isset($use_lightbox)) && ($use_lightbox=="yes")) { // lightbox ?>    
$(function() {
    $('.gallery a').lightBox();
});<?php } ?>

<?php if ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) { // sexy lightbox ?>
$(function(){
    SexyLightbox.initialize({
        imagesdir: 'css/images',
        color:'white',
        OverlayStyles:{
            'background-color':'#000',
            'opacity': 0.6
        }
    });
});<?php } ?>

<?php if ((isset($use_tabs)) && ($use_tabs=="yes")){ // organic tabs ?>
$(function() {
    $("#description-box").organicTabs();
});<?php } ?>

<?php // lose the borders on anchor tags surrounding images ?>
$(function() {
    $('img').parent('a').addClass('nobord');
});
</script>