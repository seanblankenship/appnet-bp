<?php

//	include mobile detection
include "__detect_mobile.php";
$detect = new Mobile_Detect();
if ($detect->isMobile()){
	$ismobile = true;
}

//	function for writing telephone numbers with ability to click to call
function phone($pn) {
	global $ismobile;
	if ($ismobile==true) {
		$pn_stripped = preg_replace('/[^\d.]/', '', $pn);
		$length = strlen($pn_stripped);
		if($length==10){
			$pn = '<a href="tel:+1'.$pn_stripped.'">'.$pn.'</a>';
		} elseif($length==11) {
			$pn = '<a href="tel:+'.$pn_stripped.'">'.$pn.'</a>';
		}	
	}
	return $pn;	
}
	
//  function for writing images, one after another
function write_imgs($f,$m,$l) {
    if (file_exists($f.$m.$l)){
    	$arr = array();
    	while(file_exists($f.$m.$l)) {
    		$arr[] = '<img src="'.$f.$m.$l.'" alt="">';
            $m++;
        }
        return implode("", $arr);
    } else {
        return "<p>upload a photo</p>";
	}
}
	
//  function for writing random images
function random_img($f,$m,$l) {
    if (file_exists($f.$m.$l)){
    	$arr = array();
    	while(file_exists($f.$m.$l)) {
    		$arr[$m] = '<img src="'.$f.$m.$l.'" alt="">';
    		$m++;
    	}
    	$random = array_rand($arr);
    	return $arr[$random];
    } else {
        return "<p>upload a photo</p>";
	}    
}

//  creates a get directions button for location pages
function get_directions(){

    // set global
    global $myAddressOne, $myAddressTwo, $myCity, $myState, $myZip;

    // set variables 
    $myAddressString='';
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

	if (!empty($myAddressString)){
		$directions = '
		<form action="http://maps.google.com/maps" method="get" id="getDirections" class="clearfix" target="_blank">
			<label for="saddr">Enter Your Address:</label><br>
			<input type="text" name="saddr" id="saddr">
			<input type="hidden" name="daddr" value="'.$myAddressString.'"><br>
			<input type="submit" class="submit" value="Get Directions">
		</form>';	
	} else {
		$directions = '<p>fill out $myAddressOne, $myCity, $myState, or $myZip</p>';
	}
	
	return $directions;	
}

//  creates a google map based on the location info in the config
function google_map($width="100%", $height="400", $zoom="15", $addone="", $addtwo="", $city="", $state="", $zip=""){

    // get global variables
    $myAddressOne   = (empty($addone)) ? $GLOBALS['myAddressOne'] : $addone;
    $myAddressTwo   = (empty($addtwo)) ? $GLOBALS['myAddressTwo'] : $addtwo;
    $myCity         = (empty($city)) ? $GLOBALS['myCity'] : $city;
    $myState        = (empty($state)) ? $GLOBALS['myState'] : $state;
    $myZip          = (empty($zip)) ? $GLOBALS['myZip'] : $zip;

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
        $gm = '<p>fill out $myAddressOne, $myCity, $myState, or $myZip</p>';
    } else {
        $gm = '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q='.$myAddressOne.$myAddressTwo.$myCity.$myState.$myZip.'&amp;aq=0&amp;&amp;ie=UTF8&amp;hq=&amp;hnear='.$myAddressOne.$myAddressTwo.$myCity.$myState.$myZip.'&amp;t=m&amp;z='.$zoom.'&amp;iwloc=near&amp;output=embed"></iframe>'."\n".'<p><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q='.$myAddressOne.$myAddressTwo.$myCity.$myState.$myZip.'&amp;aq=0&amp;&amp;ie=UTF8&amp;hq=&amp;hnear='.$myAddressOne.$myAddressTwo.$myCity.$myState.$myZip.'&amp;t=m&amp;'.$zoom.'&amp;iwloc=A" target="_blank">View Larger Map</a></p>'."\n";
    }
    
    return $gm;
}

//  makes email addresses clickable
function email_link($email) {
    return '<a href="mailto:'.$email.'">'.$email.'</a>';
}

//  wrap print_r with <pre> tags
function pr($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

//	writes site navigation
function nav($array, $writeSubNav="", $domain="", $cut_first="") {

    $domain .= ($domain=="" ? "" : "/"); 
    
    $nav_arr = array();
    
    // takes off the first key->value in the array
    if (!empty($cut_first)){
        $array = array_slice($array, 1);
    }
    
    $i = 1;
    $len = count($array);
    $first = ' class="first"';
    $last = ' class="last"';
    
    // loop through the array
    foreach ($array as $key => $value){

        // if dropdowns are turned on 
        if ($writeSubNav=="1"){

            // if the value is an array (if there is a dropdown)
        	if (is_array($value)){
                $link = $value[0];                

                // check if the link is supposed to open in a new window
                $values = checkTarget($link);

                // add in a class of first or last if it is the first or last element in the array
                $nav_arr[] = '<li'.($i==1 ? $first : ($i==$len ? $last : '')).'><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key.'</a><ul>';  
                
                // loop through the dropdown array
                foreach (array_slice($value, 1) as $key2 => $value2){

                    // is there a secondary dropdown array
                    if(is_array($value2)){
                        $link2 = $value2[0];
                        $values = checkTarget($link2);
                        $nav_arr[] = '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key2.'</a><ul>';

                        // loop through the secondary dropdown
                        foreach (array_slice($value2, 1) as $key3 => $value3){
                            $values = checkTarget($value3);  
                            $nav_arr[] = '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key3.'</a></li>';
                        }
                        $nav_arr[] = '</ul></li>';

                    // write the dropdown as normal
                    } else {
                        $values = checkTarget($value2); 
                        $nav_arr[] = '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key2.'</a></li>';
                    }
                }
                $nav_arr[] = '</ul></li>';

            // if the value is not an array
            } else {
                $values = checkTarget($value);
                $nav_arr[] = '<li'.($i==1 ? $first : ($i==$len ? $last : '')).'><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key.'</a></li>'; 
            }
            $i++;

        // if dropdowns are turned off
        } else {

            // if dropdowns are turned off but there is still an array, ignore the array
            if(is_array($value)){
                $link = $value[0];
                $values = checkTarget($link);
                $nav_arr[] = '<li'.($i==1 ? $first : ($i==$len ? $last : '')).'><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key.'</a></li>';

            // business as usual
            } else {
                $values = checkTarget($value);
                $nav_arr[] = '<li'.($i==1 ? $first : ($i==$len ? $last : '')).'><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key.'</a></li>';
            }
            $i++;
    	}
    }
    
    return implode("", $nav_arr);
} 

//	check if the link should open in a new window
function checkTarget($link) {
    $target = substr($link,-4);
    if ($target=="_new"){
        $link = substr($link,0,-4);
        $target = ' target="_blank"';
    } elseif ($target==".pdf"){
        $target = ' target="_blank"';
    } else {
        $target = '';
    }
    $list = array($link,$target);
    return $list;    
}



//  sets myPhoneMoreInfo for include.moreinfo.php
$myPhoneTollFree = phone($myPhoneTollFree);
$myPhoneLocal = phone($myPhoneLocal);
$myPhone = $myPhoneTollFree." or ".$myPhoneLocal;	
if($myPhoneLocal=="" || $myPhoneTollFree=="") {
	if($myPhoneLocal=="") {
		if ($myPhoneTollFree==""){
			$myPhoneMoreInfo = '<strong>fill out $myPhoneLocal or $myPhoneTollFree</strong>';	
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
$appneturl = 'http://www.appnet.com';
$myStateurl = array(
	'AL' => $appneturl, 
	'AK' => $appneturl, 
	'AZ' => $appneturl.'/arizona-web-design.php', 
	'AR' => $appneturl, 
	'CA' => $appneturl.'/california-web-design.php', 
	'CO' => $appneturl.'/colorado-web-design.php', 
	'CT' => $appneturl.'/connecticut-web-design.php', 
	'DE' => $appneturl, 
	'DC' => $appneturl, 
	'FL' => $appneturl.'/florida-web-design.php', 
	'GA' => $appneturl.'/georgia-web-design.php', 
	'HI' => $appneturl, 
	'ID' => $appneturl, 
	'IL' => $appneturl.'/illinois-web-design.php', 
	'IN' => $appneturl, 
	'IA' => $appneturl, 
	'KS' => $appneturl, 
	'KY' => $appneturl.'/kentucky-web-design.php', 
	'LA' => $appneturl, 
	'ME' => $appneturl, 
	'MD' => $appneturl, 
	'MA' => $appneturl, 
	'MI' => $appneturl, 
	'MN' => $appneturl, 
	'MS' => $appneturl, 
	'MO' => $appneturl.'/missouri-web-design.php', 
	'MT' => $appneturl.'/montana-web-design.php', 
	'NE' => $appneturl, 
	'NV' => $appneturl.'/las-vegas-web-design.php', 
	'NH' => $appneturl, 
	'NJ' => $appneturl.'/new-jersey-web-design.php', 
	'NM' => $appneturl, 
	'NY' => $appneturl.'/new-york-web-design.php', 
	'NC' => $appneturl.'/north-carolina-web-design.php', 
	'ND' => $appneturl, 
	'OH' => $appneturl, 
	'OK' => $appneturl, 
	'OR' => $appneturl, 
	'PA' => $appneturl.'/pennsylvania-web-design.php', 
	'RI' => $appneturl, 
	'SC' => $appneturl.'/south-carolina-web-design.php', 
	'SD' => $appneturl, 
	'TN' => $appneturl.'/tennessee-web-design.php', 
	'TX' => $appneturl.'/houston-texas-web-design.php', 
	'UT' => $appneturl, 
	'VT' => $appneturl, 
	'VA' => $appneturl.'/virginia-web-design.php', 
	'WA' => $appneturl.'/washington-web-design.php', 
	'WV' => $appneturl.'/west-virginia-web-design.php', 
	'WI' => $appneturl, 
	'WY' => $appneturl
);

//  controls state specific name information
$myStatename = array(
	'AL' => 'Alabama', 
	'AK' => 'Alaska', 
	'AZ' => 'Arizona', 
	'AR' => 'Arkansas', 
	'CA' => 'California', 
	'CO' => 'Colorado', 
	'CT' => 'Connecticut', 
	'DE' => 'Delaware', 
	'DC' => 'Washington DC', 
	'FL' => 'Florida', 
	'GA' => 'Georgia', 
	'HI' => 'Hawaii', 
	'ID' => 'Idaho', 
	'IL' => 'Illinois', 
	'IN' => 'Indiana', 
	'IA' => 'Iowa', 
	'KS' => 'Kansas', 
	'KY' => 'Kentucky', 
	'LA' => 'Louisiana', 
	'ME' => 'Maine', 
	'MD' => 'Maryland', 
	'MA' => 'Massachusetts', 
	'MI' => 'Michigans', 
	'MN' => 'Minnesota', 
	'MS' => 'Mississippi', 
	'MO' => 'Missouri', 
	'MT' => 'Montana', 
	'NE' => 'Nebraska', 
	'NV' => 'Nevada', 
	'NH' => 'New Hampshire', 
	'NJ' => 'New Jersey', 
	'NM' => 'New Mexico', 
	'NY' => 'New York', 
	'NC' => 'North Carolina', 
	'ND' => 'North Dakota', 
	'OH' => 'Ohio', 
	'OK' => 'Oklahoma', 
	'OR' => 'Oregon', 
	'PA' => 'Pennsylvania', 
	'RI' => 'Rhode Island', 
	'SC' => 'South Carolina', 
	'SD' => 'South Dakota', 
	'TN' => 'Tennessee', 
	'TX' => 'Texas', 
	'UT' => 'Utah', 
	'VT' => 'Vermont', 
	'VA' => 'Virginia', 
	'WA' => 'Washington', 
	'WV' => 'West Virginia', 
	'WI' => 'Wisconsin', 
	'WY' => 'Wyoming'
);