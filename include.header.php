<header>
	<nav><?php include "include.navigation.php"; ?></nav>
	<div id="fader"><?php
		if ($pageName == "default") { 
			writeImgs("fader","1",".jpg");
		} else {
			if(file_exists("fader1-sub.jpg")) {		// <-- if fader1-sub.jpg exists, display it
				writeRandomImg("fader","1","-sub.jpg");
			} elseif(file_exists("fader1.jpg")) {	// <-- else display fader1.jpg if it exists
				writeRandomImg("fader","1",".jpg");
			}
		} 
	?></div>
</header>
