<?php

//  this hides/shows the input for spam protection
if ($hideme=="1"){
	$input_type="hidden";	
} else {
	$input_type="text";
}
	
//  function for writing images, one after another
function writeImgs($f,$m,$l) {
    if (file_exists($f.$m.$l)){
    	while(file_exists($f.$m.$l)) {
    		echo '<img src="'.$f.$m.$l.'" alt="" />';
            $m++;
        }
    } else {
        echo "upload a photo";
	}
}
	
//  function for writing random images
function writeRandomImg($f,$m,$l) {
    if (file_exists($f.$m.$l)){
    	$arr = array();
    	while(file_exists($f.$m.$l)) {
    		$arr[$m] = '<img src="'.$f.$m.$l.'" alt="" />';
    		$m++;
    	}
    	$random = array_rand($arr);
    	echo $arr[$random];
    } else {
        echo "upload a photo";
	}    
}

//  creates a get directions button for location pages
function writeGetDirections(){

    // set global
    global $myAddressOne, $myAddressTwo, $myCity, $myState, $myZip;

    // set variables 
    $myAddressString = "";
	if (!empty($myAddressOne)){
		$myAddressString = $myAddressOne;
	} if (!empty($myAddressTwo)){
		$myAddressString .= (empty($myAddressString) ? $myAddressTwo : ', '.$myAddressTwo);
	} if (!empty($myCity)){
		$myAddressString .= (empty($myAddressString) ? $myCity : ', '.$myCity);
	} if (!empty($myState)){
		$myAddressString .= (empty($myAddressString) ? $myState : ', '.$myState);
	} if (!empty($myZip)){
		$myAddressString .= (empty($myAddressString) ? $myZip : ', '.$myZip);
	}

    // write the form
    echo '<h3>Get Directions</h3>';
	echo '<form action="http://maps.google.com/maps" method="get" id="getDirections" class="clearfix" target="_blank">'."\n";
	echo '<label for="saddr">Enter Your Address:</label><br>'."\n";
	echo '<input type="text" name="saddr" id="saddr">'."\n";
	echo '<input type="hidden" name="daddr" value="'.$myAddressString.'"><br>'."\n";
	echo '<input type="submit" class="submit" value="Get Directions">'."\n";
	echo '</form>'."\n";	
}

//  creates a google map based on the location info in the config
function writeGoogleMap(){

    // get potential arguments
    $args = func_get_args();
            
    // declare variables based on arguments found
    $width = ($args[0]) ? $args[0] : "100%";
    $height = ($args[1]) ? $args[1] : "400";
    $zoom = ($args[2]) ? $args[2] : "15";

    // get global variables
    $myAddressOne   = $GLOBALS['myAddressOne'];
    $myAddressTwo   = $GLOBALS['myAddressTwo'];
    $myCity         = $GLOBALS['myCity'];
    $myState        = $GLOBALS['myState'];
    $myZip          = $GLOBALS['myZip'];

    // set everything up
    $myAddressOne = ($myAddressOne!="") ? str_replace(" ", "+", $myAddressOne) : "";
    if ($myAddressTwo!=""){ 
        $myAddressTwo = str_replace(" ", "+", $myAddressTwo);
        $myAddressTwo = ",+".$myAddressTwo;
    }
    if ($myCity!=""){ 
        $myCity = str_replace(" ", "+", $myCity);
        $myCity = ",+".$myCity;
    }
    $myState = ($myState!="") ? ",+".$myState : "";
    $myZip = ($myZip!="") ? ",+".$myZip : "";

    // write the map or give an error
    if ($myAddressOne=="" && $myCity=="" && $myState=="" && $myZip==""){
        echo 'you\'ve done it wrong | fill out $myAddressOne, $myCity, $myState, or $myZip';
    } else {
        echo '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q='.$myAddressOne.$myAddressTwo.$myCity.$myState.$myZip.'&amp;aq=0&amp;&amp;ie=UTF8&amp;hq=&amp;hnear='.$myAddressOne.$myAddressTwo.$myCity.$myState.$myZip.'&amp;t=m&amp;z='.$zoom.'&amp;iwloc=near&amp;output=embed"></iframe>'."\n";
        echo '<p><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q='.$myAddressOne.$myAddressTwo.$myCity.$myState.$myZip.'&amp;aq=0&amp;&amp;ie=UTF8&amp;hq=&amp;hnear='.$myAddressOne.$myAddressTwo.$myCity.$myState.$myZip.'&amp;t=m&amp;'.$zoom.'&amp;iwloc=A" target="_blank">View Larger Map</a></p>'."\n";
    }
}

//  makes email addresses clickable
function emailLink($email) {
    echo '<a href="mailto:'.$email.'">'.$email.'</a>';
}

//  wrap print_r with <pre> tags
function pr($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

//  sets myPhoneMoreInfo for include.moreinfo.php
$myPhone = $myPhoneTollFree." or ".$myPhoneLocal;	
if($myPhoneLocal=="" || $myPhoneTollFree=="") {
	if($myPhoneLocal=="") {
		if ($myPhoneTollFree==""){
			$myPhoneMoreInfo = "<strong>PLEASE ENTER A PHONE NUMBER IN EITHER myPhoneLocal OR myPhoneTollFree</strong>";	
		} else {
			$myPhoneMoreInfo = $myPhoneTollFree;
		}
	} elseif($myPhoneTollFree=="") {
		$myPhoneMoreInfo = $myPhoneLocal;
	}
} else {
	$myPhoneMoreInfo = $myPhone;	
}

//  copyright dates
$currentyear=date("o");
if ($publishdate!=$currentyear){
	$myDate = $publishdate . '-' . $currentyear;
} else {
	$myDate = $publishdate;
}

//  controls state specific url linking information
$myStateurl = array('AL'=>'http://appnet.com', 'AK'=>'http://appnet.com', 'AZ'=>'http://appnet.com/arizonawebsitedesign.htm', 'AR'=>'http://appnet.com', 'CA'=>'http://appnet.com/californiawebdesign.htm', 'CO'=>'http://appnet.com/coloradowebdesign.htm', 'CT'=>'http://appnet.com/connecticutwebdesign.htm', 'DE'=>'http://appnet.com', 'DC'=>'http://appnet.com', 'FL'=>'http://appnet.com/floridawebdesign.htm', 'GA'=>'http://appnet.com/georgiawebdesign.htm', 'HI'=>'http://appnet.com', 'ID'=>'http://appnet.com', 'IL'=>'http://appnet.com/illinoiswebdesign.htm', 'IN'=>'http://appnet.com', 'IA'=>'http://appnet.com', 'KS'=>'http://appnet.com', 'KY'=>'http://appnet.com/kentuckywebsitedesign.htm', 'LA'=>'http://appnet.com', 'ME'=>'http://appnet.com', 'MD'=>'http://appnet.com', 'MA'=>'http://appnet.com', 'MI'=>'http://appnet.com', 'MN'=>'http://appnet.com', 'MS'=>'http://appnet.com', 'MO'=>'http://appnet.com/missouriwebdesign.htm', 'MT'=>'http://appnet.com/montanawebdesign.htm', 'NE'=>'http://appnet.com', 'NV'=>'http://appnet.com/lasvegaswebdesign.htm', 'NH'=>'http://appnet.com', 'NJ'=>'http://appnet.com/newjerseywebdesign.htm', 'NM'=>'http://appnet.com', 'NY'=>'http://appnet.com/newyorkwebdesign.htm', 'NC'=>'http://northcarolinawebdesign.com', 'ND'=>'http://appnet.com', 'OH'=>'http://appnet.com', 'OK'=>'http://appnet.com', 'OR'=>'http://appnet.com', 'PA'=>'http://appnet.com/pennsylvaniawebdesign.htm', 'RI'=>'http://appnet.com', 'SC'=>'http://appnet.com/southcarolinawebdesign.htm', 'SD'=>'http://appnet.com', 'TN'=>'http://appnet.com/tennesseewebdesign.htm', 'TX'=>'http://appnet.com/houstontexaswebdesign.htm', 'UT'=>'http://appnet.com', 'VT'=>'http://appnet.com', 'VA'=>'http://appnet.com/virginiawebdesign.htm', 'WA'=>'http://appnet.com/washingtonwebdesign.htm', 'WV'=>'http://appnet.com/westvirginiawebdesign.htm', 'WI'=>'http://appnet.com', 'WY'=>'http://appnet.com');

//  controls state specific name information
$myStatename = array('AL'=>'Alabama', 'AK'=>'Alaska', 'AZ'=>'Arizona', 'AR'=>'Arkansas', 'CA'=>'California', 'CO'=>'Colorado', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'DC'=>'Washington DC', 'FL'=>'Florida', 'GA'=>'Georgia', 'HI'=>'Hawaii', 'ID'=>'Idaho', 'IL'=>'Illinois', 'IN'=>'Indiana', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigans', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NV'=>'Nevada', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NM'=>'New Mexico', 'NY'=>'New York', 'NC'=>'North Carolina', 'ND'=>'North Dakota', 'OH'=>'Ohio', 'OK'=>'Oklahoma', 'OR'=>'Oregon', 'PA'=>'Pennsylvania', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'SD'=>'South Dakota', 'TN'=>'Tennessee', 'TX'=>'Texas', 'UT'=>'Utah', 'VT'=>'Vermont', 'VA'=>'Virginia', 'WA'=>'Washington', 'WV'=>'West Virginia', 'WI'=>'Wisconsin', 'WY'=>'Wyoming');

?>       
