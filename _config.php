<?php
// set some variables
$lastModified=filemtime(__FILE__); // get the last-modified-date of this very file
$etagFile=md5_file(__FILE__); // get a unique hash of this file (etag)
$ifModifiedSince=(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false); // get the HTTP_IF_MODIFIED_SINCE header if set
$etagHeader=(isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false); // get the HTTP_IF_NONE_MATCH header if set (etag: unique file hash)

// set up some headers
header('Last-Modified: '.gmdate("D, d M Y H:i:s", $lastModified).' GMT');
header('Etag: '.$etagFile);
header('Cache-Control: public'); // make sure caching is turned on
header('Expires: '.gmdate("D, d M Y H:i:s", time() + 3600 * 24 * 7).' GMT');    
header('Content-Type: text/html; charset=utf-8');
header('Vary: Accept-Encoding');
// check if page has changed. If not, send 304 and exit
if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'])==$lastModified || $etagHeader == $etagFile) {
    header("HTTP/1.1 304 Not Modified");
    exit;
}



// ================================================================
// 	Site variables
// ================================================================

$myCompany       = "COMPANY NAME";
	
$serverFolder    = "something.com";
	
$myDomain        = "http://".$serverFolder;
$myEmail         = "info@".$serverFolder;
		
$publishdate     = "2012";
	
$myAddressOne    = "ADDRESS ONE";
$myAddressTwo    = "ADDRESS TWO";
$myCity          = "CITY";
$myState         = "STATE"; // use two-letter abbreviation
$myZip           = "ZIP";
	
$myPhoneLocal    = "555-555-5555";
$myPhoneTollFree = "444-444-4444";
$myFax           = "333-333-3333";
	

// ================================================================
// 	Site Add-Ons // 1=yes 0=no // instructions in README
// ================================================================

// Image Fader
$fader="0"; 
$faderHeight="250px";

// Dropdown Navigation
$dropdownnav="0"; 

// Validate Reach Quickly Form
$quickCommentForm="1";

// Adaptive / Responsive
$mobile="0";


// include all functions
include "inc/functions.php";

// include navigation
include "inc/navigation.inc.php";
