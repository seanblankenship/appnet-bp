<?php 

// get myDomain info
include "_config.php";
$my_root = "C:\\users\\".$server_folder_name;

// create an array of files that are not to be included
$bad_files = array('.htaccess', '_config.php', '[your type]_featured.php', '404b.php', 'article.php', 'article_featured.php', 'article_featured.php.older', 'article_list.php', 'article_output.php', 'article_recent.php', 'ar_output.php', 'ar_o_list.php', 'ar_o_list_xml.php', 'body.htm', 'calendar.library.php', 'calendar.php', 'details.php', 'details.php.backup', 'email.php', 'emailfriend.php', 'emailfriend.php(1)', 'emailfriend.php.backup', 'email_rm.php', 'email_rm.php(1)', 'email_rm.php.backup', 'events.inc.php', 'events.vertical.inc.php', 'featured.include.php', 'featured.include.realestate.fade.php', 'featured.land.include.php', 'featured.rental.include.php', 'footer.htm', 'footer_print.htm', 'header.htm', 'header_print.htm', 'key_f.php', 'ok.php', 'output.php', 'pg_output.php', 'pg_o_list.php', 'pg_o_list_xml.php', 'pg_rss_list.php', 'photo.php', 'photo_featured.php', 'photo_list.php', 'result.php', 'rss_list.php', 'search.php', 'sitemap.php', 'sitemap.inc.php', 'test.php');

// create an array of folders that are not to be included
$bad_folders = array('.', '..', '.git', '404b', 'css', 'images', 'inc', 'js', 'lib', 'manager', 'templates');

// create an array of extensions that are to be included
$good_extensions = array('php'); 

// read the directory and spit out all files/directories
if ($handle = opendir($my_root)) {

    // loop through the directory
    while (false !== ($entry = readdir($handle))) {
    
        // get the file extension
        $extension_explode = explode('.', $entry);
        $eei = count($extension_explode)-1;
        $extension_explode = strtolower($extension_explode[$eei]);

        // write to the sitemap if the $entry is not bad 
        if ((!in_array($entry, $bad_files)) && (!in_array($entry, $bad_folders)) && (in_array($extension_explode, $good_extensions))){
            echo '<a href="'.$myDomain.'/'.$entry.'">'.$myDomain.'/'.$entry.'</a><br>'."\n";
        }

    }
      
    closedir($handle);
}

if (file_exists("sitemap.inc.php")){
    include "sitemap.inc.php";
}

?>     
