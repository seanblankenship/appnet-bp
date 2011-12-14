<?php

// 	this hides/shows the input for spam protection
if ($hideme=="1"){
	$input_type="hidden";	
} else {
	$input_type="text";
}
	
// 	function for writing images, one after another
function writeImgs($f,$m,$l) {
	while(file_exists($f.$m.$l)) {
		echo '<img src="'.$f.$m.$l.'" alt="" />';
		$m++;
	}
}
	
// 	function for writing random images
function writeRandomImg($f,$m,$l) {
	$arr = array();
	while(file_exists($f.$m.$l)) {
		$arr[$m] = '<img src="'.$f.$m.$l.'" alt="" />';
		$m++;
	}
	$random = array_rand($arr);
	echo $arr[$random];
}

// 	creates a get directions button for location pages
function writeGetDirections(){
	$myAddressString = "";
	if (!empty($GLOBALS['myAddressOne'])){
		$myAddressOne = $GLOBALS['myAddressOne'];
		$myAddressString = $myAddressOne;
	} if (!empty($GLOBALS['myAddressTwo'])){
		$myAddressTwo = $GLOBALS['myAddressTwo'];
		$myAddressString .= (empty($myAddressString) ? $myAddressTwo : ', '.$myAddressTwo);
	} if (!empty($GLOBALS['myCity'])){
		$myCity = $GLOBALS['myCity'];
		$myAddressString .= (empty($myAddressString) ? $myCity : ', '.$myCity);
	} if (!empty($GLOBALS['myState'])){
		$myState = $GLOBALS['myState'];
		$myAddressString .= (empty($myAddressString) ? $myState : ', '.$myState);
	} if (!empty($GLOBALS['myZip'])){
		$myZip = $GLOBALS['myZip'];
		$myAddressString .= (empty($myAddressString) ? $myZip : ', '.$myZip);
	}
	
	echo '<form action="http://maps.google.com/maps" method="get" id="getDirections" target="_blank">'."\n";
	echo '<label for="saddr">Enter Your Address:</label><br />'."\n";
	echo '<input type="text" name="saddr" />'."\n";
	echo '<input type="hidden" name="daddr" value="'.$myAddressString.'" />'."\n";
	echo '<input type="submit" class="submit" value="Get Directions" />'."\n";
	echo '</form>'."\n";	
}

// 	makes email addresses clickable
function emailLink($email) {
    echo '<a href="mailto:'.$email.'">'.$email.'</a>';
}

// 	sets myPhoneMoreInfo for include.moreinfo.php
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

// 	copyright dates
$currentyear=date("o");
if ($publishdate!=$currentyear){
	$myDate = $publishdate . '-' . $currentyear;
} else {
	$myDate = $publishdate;
}

// 	controls state specific url linking information
$myStateurl = array('AL'=>'http://appnet.com', 'AK'=>'http://appnet.com', 'AZ'=>'http://appnet.com/arizonawebsitedesign.htm', 'AR'=>'http://appnet.com', 'CA'=>'http://appnet.com/californiawebdesign.htm', 'CO'=>'http://appnet.com/coloradowebdesign.htm', 'CT'=>'http://appnet.com/connecticutwebdesign.htm', 'DE'=>'http://appnet.com', 'DC'=>'http://appnet.com', 'FL'=>'http://appnet.com/floridawebdesign.htm', 'GA'=>'http://appnet.com/georgiawebdesign.htm', 'HI'=>'http://appnet.com', 'ID'=>'http://appnet.com', 'IL'=>'http://appnet.com/illinoiswebdesign.htm', 'IN'=>'http://appnet.com', 'IA'=>'http://appnet.com', 'KS'=>'http://appnet.com', 'KY'=>'http://appnet.com/kentuckywebsitedesign.htm', 'LA'=>'http://appnet.com', 'ME'=>'http://appnet.com', 'MD'=>'http://appnet.com', 'MA'=>'http://appnet.com', 'MI'=>'http://appnet.com', 'MN'=>'http://appnet.com', 'MS'=>'http://appnet.com', 'MO'=>'http://appnet.com/missouriwebdesign.htm', 'MT'=>'http://appnet.com/montanawebdesign.htm', 'NE'=>'http://appnet.com', 'NV'=>'http://appnet.com/lasvegaswebdesign.htm', 'NH'=>'http://appnet.com', 'NJ'=>'http://appnet.com/newjerseywebdesign.htm', 'NM'=>'http://appnet.com', 'NY'=>'http://appnet.com/newyorkwebdesign.htm', 'NC'=>'http://northcarolinawebdesign.com', 'ND'=>'http://appnet.com', 'OH'=>'http://appnet.com', 'OK'=>'http://appnet.com', 'OR'=>'http://appnet.com', 'PA'=>'http://appnet.com/pennsylvaniawebdesign.htm', 'RI'=>'http://appnet.com', 'SC'=>'http://appnet.com/southcarolinawebdesign.htm', 'SD'=>'http://appnet.com', 'TN'=>'http://appnet.com/tennesseewebdesign.htm', 'TX'=>'http://appnet.com/houstontexaswebdesign.htm', 'UT'=>'http://appnet.com', 'VT'=>'http://appnet.com', 'VA'=>'http://appnet.com/virginiawebdesign.htm', 'WA'=>'http://appnet.com/washingtonwebdesign.htm', 'WV'=>'http://appnet.com/westvirginiawebdesign.htm', 'WI'=>'http://appnet.com', 'WY'=>'http://appnet.com');

// 	controls state specific name information
$myStatename = array('AL'=>'Alabama', 'AK'=>'Alaska', 'AZ'=>'Arizona', 'AR'=>'Arkansas', 'CA'=>'California', 'CO'=>'Colorado', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'DC'=>'Washington DC', 'FL'=>'Florida', 'GA'=>'Georgia', 'HI'=>'Hawaii', 'ID'=>'Idaho', 'IL'=>'Illinois', 'IN'=>'Indiana', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigans', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NV'=>'Nevada', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NM'=>'New Mexico', 'NY'=>'New York', 'NC'=>'North Carolina', 'ND'=>'North Dakota', 'OH'=>'Ohio', 'OK'=>'Oklahoma', 'OR'=>'Oregon', 'PA'=>'Pennsylvania', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'SD'=>'South Dakota', 'TN'=>'Tennessee', 'TX'=>'Texas', 'UT'=>'Utah', 'VT'=>'Vermont', 'VA'=>'Virginia', 'WA'=>'Washington', 'WV'=>'West Virginia', 'WI'=>'Wisconsin', 'WY'=>'Wyoming');

?>       
