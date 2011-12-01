<?php

// ================================================================
// 	Site variables
// ================================================================

$myCompany       = "";
	
$serverFolder    = "something.com";
	
$myDomain        = "http://".$serverFolder;
$myEmail         = "info@".$serverFolder;
		
$publishdate     = "2011";
	
$myAddressOne    = "";
$myAddressTwo    = "";
$myCity          = "";
$myState         = ""; // use two-letter abbreviation
$myZip           = "";
	
$myPhoneLocal    = "";
$myPhoneTollFree = "";
$myFax           = "";
	

// ================================================================
// 	Site Add-Ons // 1=yes 0=no // instructions in README
// ================================================================

// Spam Protection
$hideme="0";	
$server_folder_name=$serverFolder;

// Image Fader
$fader="0"; 
$faderHeight="250px";

// Dropdown Navigation
$dropdownnav="1"; 

// Validate Reach Quickly Form
$quickCommentForm="0";

// Adaptive / Responsive
$mobile="0";

// Display Twitter
$twitter_display="0";
$twitter_pageName="default";	// this is the same as the $pageName variable at the top of the desired page (ie $pageName="default" or $pageName="404b")
$twitter_name="twitter";		// this is their @whatever name
$twitter_tweets="5";			// this is the number of latest tweets you would like to be displayed

// Image Rollovers
$rollovers="0"; 


// ================================================================
// 	include all functions (unless key_f.php)
// ================================================================     

$filename = basename($_SERVER['SCRIPT_NAME']);
if ($filename!="key_f.php"){ include("functions.php"); }
