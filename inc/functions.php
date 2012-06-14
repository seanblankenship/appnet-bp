<?php
	
//  function for writing images, one after another
function writeImgs($f,$m,$l) {
    if (file_exists($f.$m.$l)){
    	while(file_exists($f.$m.$l)) {
    		echo '<img src="'.$f.$m.$l.'" alt="">';
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
    		$arr[$m] = '<img src="'.$f.$m.$l.'" alt="">';
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
	echo '<form action="http://maps.google.com/maps" method="get" id="getDirections" class="clearfix" target="_blank">'."\n";
	echo '<label for="saddr">Enter Your Address:</label><br>'."\n";
	echo '<input type="text" name="saddr" id="saddr">'."\n";
	echo '<input type="hidden" name="daddr" value="'.$myAddressString.'"><br>'."\n";
	echo '<input type="submit" class="submit" value="Get Directions">'."\n";
	echo '</form>'."\n";	
}

//  creates a google map based on the location info in the config
function writeGoogleMap($width="100%", $height="400", $zoom="15"){

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
if (empty($publishdate)){
    $myDate = $currentyear;
} elseif ($publishdate!=$currentyear){
	$myDate = $publishdate . '-' . $currentyear;
} else {
	$myDate = $publishdate;
}

//  controls state specific url linking information
$myStateurl = array('AL'=>'http://www.appnet.com', 'AK'=>'http://www.appnet.com', 'AZ'=>'http://www.appnet.com/arizona-web-design.php', 'AR'=>'http://www.appnet.com', 'CA'=>'http://www.appnet.com/california-web-design.php', 'CO'=>'http://www.appnet.com/colorado-web-design.php', 'CT'=>'http://www.appnet.com/connecticut-web-design.php', 'DE'=>'http://www.appnet.com', 'DC'=>'http://www.appnet.com', 'FL'=>'http://www.appnet.com/florida-web-design.php', 'GA'=>'http://www.appnet.com/georgia-web-design.php', 'HI'=>'http://www.appnet.com', 'ID'=>'http://www.appnet.com', 'IL'=>'http://www.appnet.com/illinois-web-design.php', 'IN'=>'http://www.appnet.com', 'IA'=>'http://www.appnet.com', 'KS'=>'http://www.appnet.com', 'KY'=>'http://www.appnet.com/kentucky-web-design.php', 'LA'=>'http://www.appnet.com', 'ME'=>'http://www.appnet.com', 'MD'=>'http://www.appnet.com', 'MA'=>'http://www.appnet.com', 'MI'=>'http://www.appnet.com', 'MN'=>'http://www.appnet.com', 'MS'=>'http://www.appnet.com', 'MO'=>'http://www.appnet.com/missouri-web-design.php', 'MT'=>'http://www.appnet.com/montana-web-design.php', 'NE'=>'http://www.appnet.com', 'NV'=>'http://www.appnet.com/las-vegas-web-design.php', 'NH'=>'http://www.appnet.com', 'NJ'=>'http://www.appnet.com/new-jersey-web-design.php', 'NM'=>'http://www.appnet.com', 'NY'=>'http://www.appnet.com/new-york-web-design.php', 'NC'=>'http://www.appnet.com/north-carolina-web-design.php', 'ND'=>'http://www.appnet.com', 'OH'=>'http://www.appnet.com', 'OK'=>'http://www.appnet.com', 'OR'=>'http://www.appnet.com', 'PA'=>'http://www.appnet.com/pennsylvania-web-design.php', 'RI'=>'http://www.appnet.com', 'SC'=>'http://www.appnet.com/south-carolina-web-design.php', 'SD'=>'http://www.appnet.com', 'TN'=>'http://www.appnet.com/tennessee-web-design.php', 'TX'=>'http://www.appnet.com/houston-texas-web-design.php', 'UT'=>'http://www.appnet.com', 'VT'=>'http://www.appnet.com', 'VA'=>'http://www.appnet.com/virginia-web-design.php', 'WA'=>'http://www.appnet.com/washington-web-design.php', 'WV'=>'http://www.appnet.com/west-virginia-web-design.php', 'WI'=>'http://www.appnet.com', 'WY'=>'http://www.appnet.com');

//  controls state specific name information
$myStatename = array('AL'=>'Alabama', 'AK'=>'Alaska', 'AZ'=>'Arizona', 'AR'=>'Arkansas', 'CA'=>'California', 'CO'=>'Colorado', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'DC'=>'Washington DC', 'FL'=>'Florida', 'GA'=>'Georgia', 'HI'=>'Hawaii', 'ID'=>'Idaho', 'IL'=>'Illinois', 'IN'=>'Indiana', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigans', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NV'=>'Nevada', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NM'=>'New Mexico', 'NY'=>'New York', 'NC'=>'North Carolina', 'ND'=>'North Dakota', 'OH'=>'Ohio', 'OK'=>'Oklahoma', 'OR'=>'Oregon', 'PA'=>'Pennsylvania', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'SD'=>'South Dakota', 'TN'=>'Tennessee', 'TX'=>'Texas', 'UT'=>'Utah', 'VT'=>'Vermont', 'VA'=>'Virginia', 'WA'=>'Washington', 'WV'=>'West Virginia', 'WI'=>'Wisconsin', 'WY'=>'Wyoming');

?>       
