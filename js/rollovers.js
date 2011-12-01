
// to set this up for .gif or .png files, press ctrl+h and find ".jpg" (minus the "") and replace with either ".gif" or ".png"

$(document).ready(function() {
	
	// Preload all rollovers
	$("#mainnav img").each(function() {
		// Set the original src
		rollsrc = $(this).attr("src");
		rollON = rollsrc.replace(/.jpg$/ig,"o.jpg");
		$("<img>").attr("src", rollON);
	});
	
	// Navigation rollovers
	$("#mainnav a").mouseover(function(){
		imgsrc = $(this).children("img").attr("src");
		matches = imgsrc.match(/_over/);
		
		// don't do the rollover if state is already ON
		if (!matches) {
		imgsrcON = imgsrc.replace(/.jpg$/ig,"o.jpg"); // strip off extension
		$(this).children("img").attr("src", imgsrcON);
		}
		
	});
	$("#mainnav a").mouseout(function(){
		$(this).children("img").attr("src", imgsrc);
	});
	

});