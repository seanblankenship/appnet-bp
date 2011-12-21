<?php 

// get myDomain info
include("include.config.php");
$my_root = "C:\\users\\".$server_folder_name;

// read the directory and spit out all files/directories
if ($handle = opendir($my_root)) {

    // loop through the directory
    while (false !== ($entry = readdir($handle))) {

        // create an array of files that are not to be included
        $bad_files = array('.', '..', '.htaccess', '.git', '[your type]_featured.php', '404b', '404b.php', 'article.php', 'article_featured.php', 'article_featured.php.older', 'article_list.php', 'article_output.php', 'article_recent.php', 'ar_output.php', 'ar_o_list.php', 'ar_o_list_xml.php', 'body.htm', 'css', 'details.php', 'details.php.backup', 'email.php', 'emailfriend.php', 'emailfriend.php(1)', 'emailfriend.php.backup', 'email_rm.php', 'email_rm.php(1)', 'email_rm.php.backup', 'featured.include.php', 'featured.include.realestate.fade.php', 'featured.land.include.php', 'featured.rental.include.php', 'footer.htm', 'footer_print.htm', 'functions.php', 'header.htm', 'header_print.htm', 'images', 'include.aside.php', 'include.config.php', 'include.contact.php', 'include.footer.php', 'include.header.php', 'include.moreinfo.php', 'include.navigation.php', 'include.scripts.footer.php', 'include.scripts.header.php', 'include.styles.php', 'js', 'key_f.php', 'lib', 'manager', 'ok.php', 'output.php', 'readme.md', 'result.php', 'rss_list.php', 'search.php', 'sitemap.php', 'sitemap.inc.php', 'templates', 'test.php', 'style.css');

        // create an array of extensions that are not to be included
        $bad_extensions = array('css', 'jpg', 'jpeg', 'png', 'bmp', 'gif', 'ini');

        // get the file extension
        // this will miss files like include.config.php but should catch all images
        $entry_explode = explode('.', $entry);
        $entry_explode = strtolower($entry_explode[1]);
        
        // write to the sitemap if the file is not in $bad_extension or $bad_array
        if ((!in_array($entry, $bad_files)) && (!in_array($entry_explode, $bad_extensions))){
            echo '<a href="'.$myDomain.'/'.$entry.'">'.$myDomain.'/'.$entry.'</a><br>'."\n";
        }

    }
      
    closedir($handle);
}

if (file_exists("sitemaps.inc.php")){
    include('sitemaps.inc.php');
}

?>
