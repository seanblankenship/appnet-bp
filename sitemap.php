<?php 

// get myDomain info
include_once "_config.php";
$my_root = "D:\\users\\".$serverFolder;

// create an array of files that are not to be included
$bad_files = array('_config.php', '404.php', 'article.php', 'article_list.php', 'article_output.php', 'article_recent.php', 'ar_output.php', 'ar_o_list.php', 'ar_o_list_xml.php', 'calendar.php', 'details.php', 'email.php', 'emailfriend.php', 'email_rm.php', 'list_events.php', 'member_save.php', 'member_view.php', 'ok.php', 'output.php', 'pg_output.php', 'pg_o_list.php', 'pg_o_list_xml.php', 'pg_rss_list.php', 'photo.php', 'photo_list.php', 'photo_output.php', 'photo_recent.php', 'portfolio_featured.php', 'process-quote.php', 'recaptchalib.php', 'register.php', 'result.php', 'rss_list.php', 'sitemap.php','test.php', 'test2.php', 'ver.php');

// create an array of extensions that are to be included
$good_extensions = array('php'); 

// set the array
$sitemap = array();

// read the directory and spit out all files/directories
if ($handle = opendir($my_root)) {

    // loop through the directory
    while (false !== ($entry = readdir($handle))) {
    
        // get the file extension
        $extension_explode = explode('.', $entry);
        $arr_count = count($extension_explode);
        $k = $arr_count - 1;

        // if there is a file extension, continue
        if (isset($extension_explode[$k])) {

            // set the file extension to lowercase, just in case
            $extension_explode = strtolower($extension_explode[$k]);
       
            // do work if the file is good and the extension is correct
            if ((!in_array($entry, $bad_files)) && (in_array($extension_explode, $good_extensions))){

                // set title
                $title = $entry;
        
                // take off the file extension
                $title = explode('.', $title);
                $title = $title[0];
        
                // take out the dashes
                $title = str_replace("-", " ", $title);
        
                // first letter uppercase
                $title = ucwords(strtolower($title));
        
                // add a space at the beginning and end to deal with the abreviations issues below
                $title = " ".$title." ";
        
                // array of bad abbreviations (IN for Indiana has been taken out as 'in' appears in seo titles often... if you need it for an indiana site, just put it back appropriately in both arrays)
                $bad_abbreviations  = array(' A ', ' By ', ' To ', ' Al ', ' Ak ', ' Az ', ' Ar ', ' Ca ', ' Co ', ' Ct ', ' De ', ' Dc ', ' Fl ', ' Ga ', ' Hi ', ' Id ', ' Il ', ' Ia ', ' Ks ', ' Ky ', ' La ', ' Me ', ' Md ', ' Ma ', ' Mi ', ' Mn ', ' Ms ', ' Mo ', ' Mt ', ' Ne ', ' Nv ', ' Nh ', ' Nj ', ' Nm ', ' Ny ', ' Nc ', ' Nd ', ' Oh ', ' Ok ', ' Or ', ' Pa ', ' Ri ', ' Sc ', ' Sd ', ' Tn ', ' Tx ', ' Ut ', ' Vt ', ' Va ', ' Wa ', ' Wv ', ' Wi ', ' Wy ');
                $good_abbreviations = array(' a ', ' by ', ' to ', ' AL ', ' AK ', ' AZ ', ' AR ', ' CA ', ' CO ', ' CT ', ' DE ', ' DC ', ' FL ', ' GA ', ' HI ', ' ID ', ' IL ', ' IA ', ' KS ', ' KY ', ' LA ', ' ME ', ' MD ', ' MA ', ' MI ', ' MN ', ' MS ', ' MO ', ' MT ', ' NE ', ' NV ', ' NH ', ' NJ ', ' NM ', ' NY ', ' NC ', ' ND ', ' OH ', ' OK ', ' OR ', ' PA ', ' RI ', ' SC ', ' SD ', ' TN ', ' TX ', ' UT ', ' VT ', ' VA ', ' WA ', ' WV ', ' WI ', ' WY ');   
        
                // replace abbreviations
                $title = str_replace($bad_abbreviations, $good_abbreviations, $title);
        
                // get rid of space at beginning and end of the title now that the abreviations have been replaced
                $title = substr($title, 1);
                $title = substr($title, 0, -1);
        
                // set overriding defaults if you have any
                if ($title == "Default") {
                    $title = (!empty($myCompany)) ? $myCompany : 'Homepage';
                } elseif ($title == "Search") {
                    $title = 'Search Our Listings';
                } elseif ($title == "Contact") {
                    $title = 'Contact '.$myCompany;
                } 

                // add the entry to an array
                $sitemap[$title] = $entry;
            }
        }
    }
      
    closedir($handle);
}

function writeSitemap() {
    global $sitemap;
    ksort($sitemap);

    // set first letter
    $fl     = '';
    
    foreach ($sitemap as $title => $entry) {

        // get the first letter of $title
        $current_fl = substr($title, 0, 1);

        // set some variables
        $li     = '<li><a href="'.$entry.'" title="'.$title.'">'.$title.'</a></li>';   
        $open   = '<h2>'.$current_fl.'</h2><ul class="sitemap clearfix">';
        $close  = '</ul>';
        
        // write it all
        if ($fl==$current_fl) {
            echo $li;
        } else {
            echo (empty($fl)) ? $open.$li : $close.$open.$li;
            $fl = $current_fl;
        }
        
    }

    // close the last ul
    echo '</ul>';
}


// build the page
require "header.htm";
require "body.htm";
writeSitemap();
if (file_exists("sitemap.inc.php")) { include "sitemap.inc.php"; }
require "footer.htm";

?>
