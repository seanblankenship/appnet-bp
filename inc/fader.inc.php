<?php

if ($pageName == "default") { 
	echo write_imgs("fader","1",".jpg");
} else {
	if (file_exists("fader1-sub.jpg")) {		// <-- if fader1-sub.jpg exists, display it
    	echo random_img("fader","1","-sub.jpg");
    } elseif(file_exists("fader1.jpg")) {	// <-- else display fader1.jpg if it exists
    	echo random_img("fader","1",".jpg");
    }
}