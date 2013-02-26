<?php

if ($pageName == "default") { 
	echo write_imgs("images/fader","1",".jpg");
} else {
	if (file_exists("images/fader1-sub.jpg")) {       // <-- if fader1-sub.jpg exists, display it
    	echo random_img("images/fader","1","-sub.jpg");
    } elseif(file_exists("images/fader1.jpg")) {       // <-- else display fader1.jpg if it exists
    	echo random_img("images/fader","1",".jpg");
    }
}