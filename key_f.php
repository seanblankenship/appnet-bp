<?
include_once "_config.php";
$my_doc_root = "C:\\users\\".$server_folder_name;

//////////////////////////////////////////////////////////////////
// this was a resource for this email spam stopping venture
// http://stackoverflow.com/questions/2486327/jquery-post-and-php-prevent-the-ability-to-use-script-outside-of-main-website
//////////////////////////////////////////////////////////////////

if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest'){exit();}
if ($my_doc_root != dirname(__FILE__) ){exit();}
if ($_SERVER["HTTP_CONTENT_LENGTH"] != 0){exit();}

if(!ISSET($_COOKIE["appnetforms"]["one"]) ){
	setcookie("appnetforms[one]", "488574303dkid;IWORKWITH_appnet_they_are_greatlqpoiu348uoipj!)".mktime(0,0,0,date("m"),date("d"),date("Y"))."(U#POIJ#FL#W9;oqdvv9((*_)*U()UJ!!!@@!");
}

echo $_SERVER["INSTANCE_ID"];
?>
