<?php

//  set the pageName variable
if (!isset($pageName)) {
    $pn_array = array();
    $pn_array = explode('.', basename($_SERVER['PHP_SELF']));
    $pageName = $pn_array[0];
}

// function to grab redirect_script_url from server and use as title
function writeScriptUrlAsTitle() {
    $returnThis = basename($_SERVER['REDIRECT_SCRIPT_URL']);
    $returnThis = str_replace("-", " ", $returnThis);
    $returnThis = ucwords(strtolower($returnThis));

    // add a space at the beginning and end to deal with the abreviations issues below
    $returnThis = " ".$returnThis." ";

    // array of bad abbreviations (IN for Indiana has been taken out)
    $bad_abbreviations  = array(' A ', ' By ', ' To ', ' Al ', ' Ak ', ' Az ', ' Ar ', ' Ca ', ' Co ', ' Ct ', ' De ', ' Dc ', ' Fl ', ' Ga ', ' Hi ', ' Id ', ' Il ', ' Ia ', ' Ks ', ' Ky ', ' La ', ' Me ', ' Md ', ' Ma ', ' Mi ', ' Mn ', ' Ms ', ' Mo ', ' Mt ', ' Ne ', ' Nv ', ' Nh ', ' Nj ', ' Nm ', ' Ny ', ' Nc ', ' Nd ', ' Oh ', ' Ok ', ' Or ', ' Pa ', ' Ri ', ' Sc ', ' Sd ', ' Tn ', ' Tx ', ' Ut ', ' Vt ', ' Va ', ' Wa ', ' Wv ', ' Wi ', ' Wy ');
    $good_abbreviations = array(' a ', ' by ', ' to ', ' AL ', ' AK ', ' AZ ', ' AR ', ' CA ', ' CO ', ' CT ', ' DE ', ' DC ', ' FL ', ' GA ', ' HI ', ' ID ', ' IL ', ' IA ', ' KS ', ' KY ', ' LA ', ' ME ', ' MD ', ' MA ', ' MI ', ' MN ', ' MS ', ' MO ', ' MT ', ' NE ', ' NV ', ' NH ', ' NJ ', ' NM ', ' NY ', ' NC ', ' ND ', ' OH ', ' OK ', ' OR ', ' PA ', ' RI ', ' SC ', ' SD ', ' TN ', ' TX ', ' UT ', ' VT ', ' VA ', ' WA ', ' WV ', ' WI ', ' WY ');   

    // replace abbreviations
    $returnThis = str_replace($bad_abbreviations, $good_abbreviations, $returnThis);

    // get rid of space at beginning and end of the title now that the abreviations have been replaced
    $returnThis = substr($returnThis, 1);
    $returnThis = substr($returnThis, 0, -1);
    
    return $returnThis;
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

//  writes site navigation
function nav($array, $writeSubNav="", $cut_first="", $domain="") {

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

                    // is there a second dropdown array
                    if(is_array($value2)){
                        $link2 = $value2[0];
                        $values = checkTarget($link2);
                        $nav_arr[] = '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key2.'</a><ul>';

                        // loop through the second dropdown
                        foreach (array_slice($value2, 1) as $key3 => $value3){
                        
                            // is there a third dropdown array
                            if(is_array($value3)){
                            
                                $link3 = $value3[0];
                                $values = checkTarget($link3);
                                $nav_arr[] = '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key3.'</a><ul>';
                                
                                // loop through the third dropdown
                                foreach (array_slice($value3, 1) as $key4 => $value4){
                                    
                                    // is there a fourth dropdown array
                                    if(is_array($value4)){
                                    
                                        $link4 = $value4[0];
                                        $values = checkTarget($link4);
                                        $nav_arr[] = '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key4.'</a><ul>';
                                        
                                        // loop through the fourth dropdown
                                        foreach (array_slice($value4, 1) as $key5 => $value5){ 
                                            $values = checkTarget($value5);  
                                            $nav_arr[] = '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key5.'</a></li>';
                                        }
                                        $nav_arr[] = '</ul></li>';
                                
                                    } else {
                                        $values = checkTarget($value4);  
                                        $nav_arr[] = '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key4.'</a></li>';
                                    }
                                    
                                }
                                $nav_arr[] = '</ul></li>';
                        
                            } else {
                                $values = checkTarget($value3);  
                                $nav_arr[] = '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key3.'</a></li>';
                            }
                            
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

//  check if the link should open in a new window
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



/*
 *  set up some variables
 */

//  sets myPhoneMoreInfo for include.moreinfo.php
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
    'MI' => 'Michigan', 
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

// create an array of files that are not to be included in the sitemap
$bad_files = array('_config.php', '404.php', 'article.php', 'article_list.php', 'article_output.php', 'article_recent.php', 'ar_output.php', 'ar_o_list.php', 'ar_o_list_xml.php', 'calendar.php', 'details.php', 'email.php', 'emailfriend.php', 'email_rm.php', 'list_events.php', 'member_save.php', 'member_view.php', 'ok.php', 'output.php', 'pg_output.php', 'pg_o_list.php', 'pg_o_list_xml.php', 'pg_rss_list.php', 'photo.php', 'photo_list.php', 'photo_output.php', 'photo_recent.php', 'portfolio_featured.php', 'process-quote.php', 'recaptchalib.php', 'register.php', 'result.php', 'rss_list.php', 'sitemap.php','test.php', 'test2.php', 'ver.php', 'sitemap_rss.php', 'rets.php');

// create an array of extensions that are to be included in the sitemap
$good_extensions = array('php'); 