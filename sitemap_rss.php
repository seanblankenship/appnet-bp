<? header ("content-type: text/xml");
include_once "_config.php";
$my_root = "/var/www/vhosts/$serverFolder";
$mySite = "http://www.$serverFolder";

print '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="css/sitemap.xsl"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';

echo '
    <url>  
        <loc>'.$mySite.'/</loc>
        <lastmod>'.date("c", filemtime('default.php')).'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
    </url>
';  

echo '
    <url>  
        <loc>'.$mySite.'/default.php</loc>
        <lastmod>'.date("c", filemtime('default.php')).'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
    </url>
';  

// set the array
$sitemap = array();

// read the directory and spit out all files/directories
if ($handle = opendir($my_root)) {

    // loop through the directory
    while (false !== ($entry = readdir($handle))) {
    
        // get the file extension
        $extension_explode = explode('.', $entry);

        // only grab files like something.php not something.inc.php
        if ( (isset($extension_explode[1])) && (!isset($extension_explode[2])) ) {

            // set the file extension to lowercase, just in case
            $extension_explode = strtolower($extension_explode[1]);
       
            // do work if the file is good and the extension is correct
            if ((!in_array($entry, $bad_files)) && (in_array($extension_explode, $good_extensions))){
           
echo '    <url>  
        <loc>'.$mySite.'/'.$entry.'</loc>
        <lastmod>'.date("c", filemtime($entry)).'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
';  

            }
        }
    }
      
    closedir($handle);
}