<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script><script>window.jQuery || document.write('<script src="js/jquery-1.9.0.min.js"><\/script>')</script><? echo ($pageName=="contact" || $quickCommentForm=="1") ? '<script src="js/jquery.validate.js"></script>' : '';
echo ($fader=="1" && $pageName=="default") ? '<script src="js/jquery.innerfade.js"></script>' : '';
echo ((isset($use_lightbox)) && ($use_lightbox=="yes")) ? '<script src="js/jquery.lightbox-0.5.js"></script>' : '';
echo ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) ? '<script src="js/jquery.easing.1.3.js"></script><script src="js/s-lightbox.v2.2.jquery.min.js"></script>' : '';
echo ((isset($use_tabs)) && ($use_tabs=="yes")) ? '<script src="js/jquery.organictabs.js"></script>' : '';?>
<script><? 
echo ($pageName=="contact") ? '$(function() { $("#commentForm").validate(); });' : '';
echo ($pageName=="contact") ? '$(function() { $("#quickCommentForm").validate(); });' : '';
echo ($dropdownnav=="1") ? '$(function() { $("#navlist ul").css({display:"none"}); $("#navlist li").hover(function(){ $(this).find("ul:first").css({visibility:"visible",display:"none"}).show(400); },function(){ $(this).find("ul:first").css({visibility:"hidden"}); }); });' : '';
echo ($fader=="1" && $pageName=="default") ? '$(function() { $("#fader").innerfade({ animationtype: "fade", speed: 1500, timeout: 4000, type: "sequence", containerheight: "'.$faderHeight.'" }); });' : '';
echo ((isset($use_lightbox)) && ($use_lightbox=="yes")) ? '$(function() { $(".gallery a").lightBox(); });' : '';
echo ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) ? '$(function(){ SexyLightbox.initialize({ imagesdir: "images", color:"white", OverlayStyles:{ "background-color":"#000", "opacity": 0.6 } }); });' : '';
echo ((isset($use_tabs)) && ($use_tabs=="yes")) ? '$(function() { $("#description-box").organicTabs(); });' : '';
echo "$(function() { $('img').parent('a').addClass('nobord'); });";
?></script>
