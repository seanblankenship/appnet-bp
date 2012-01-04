<?
$verbage = "<p>If you are repeatedly getting this message but you are sending a legitimate email please send your message to ".$_POST["To"]."</p>";

if ( $_COOKIE["appnetforms"]["one"] != "488574303dkid;IWORKWITH_appnet_they_are_greatlqpoiu348uoipj!)".mktime(0,0,0,date("m"),date("d"),date("Y"))."(U#POIJ#FL#W9;oqdvv9((*_)*U()UJ!!!@@!" ){
	die("<p>Spam checks failed sorry [cookie]</p> $verbage");
}

if ( $_SERVER["INSTANCE_ID"] != $_POST["key"] ){
	die("<p>Spam checks failed sorry [key].</p> $verbage");
}

// Check to make sure it is coming from the place it is hosted on
if ( strpos($_SERVER['HTTP_REFERER'],$_SERVER['SERVER_NAME']) === false){
	die("<b>Error</b>, Cannot Run Script Line 5");
}

//Prevent XSS attack on the email form
$xssErrorMsg = "
	<font color='#C60000'><b>Error:</b> A illegal character was detected in your url or submission.</font>
	<br><br>
	If you feel this is a error please contact us and we will look into the issue. 
	In the contact please be sure to tell us exactly what page you were on when this 
	occured and what page you came from so can fix this issue.
	<br><br>Sorry for any inconvience.
";

foreach ($_GET as $key => $v) {
	if (!preg_match("/^[\(\)\/\'\"\.\-\&\s@\?#_a-zA-Z\d]+$/",$v)            ){
	//echo "error 1: A match was found in   $key:   $v<br><br>";
	   die($xssErrorMsg);
	}
}

foreach ($_POST as $key => $value) {
	$_POST[$key] = strip_tags($_POST[$key]);
	$_POST[$key] = htmlentities($_POST[$key]);
	$v = $_POST[$key];
	
	if (!empty($v) AND $key!="LocOK"){
		if (!preg_match("/^[\(\)\/\'\,\"\.\\\+\!\:\;\$\%\=\-\&\s@\?#_a-zA-Z\d]+$/",$v)         ){
			//echo "error 2: A match was found in   $key:   $v<br><br>";
			die($xssErrorMsg);
		}
		
		/* prevent &#x0040 and &#00064 Type stuff  */
		if (  preg_match('/&#x([a-f0-9]+)/', $v) || preg_match('/&#0([0-9]+)/', $v) ){
			//echo "error 3: A match was found in   $key:   $v<br><br>";
			die($xssErrorMsg);
		}
	}
	if ($value!="Submit" AND $key != "LocOK" AND $key !="Subject" AND $key !="To" AND $key != "key"){
		if (is_array($value)){
			$mw .= "<b>$key</b>: ".implode(", ", $value)."<br />\n";
		}else{
			$mw .= "<b>$key</b>: $value<br />\n";
		}
	}
}

if ($_POST["To"]=="" || $_POST["LocOK"]=="" || $_POST["Subject"]==""){
	print "
	<H3>Error Operation Failed: Possible Reasons.</h3>
	<pre>
		-no submit to address.
		-no ok location submitted.
		-no ko location submitted.
		-no subject submitted.
	</pre>
	";
	
}else{

	//require("C:/users/__ programming/form_dns_lookup.php");
	//require("C:/users/__ programming/standard_email_form_dns_check.php");
	// Email \\
	$subject = $_POST["Subject"];
	$from = $_POST["Sender"];
	$to  = $_POST["To"];
	//$to = "jim@appnet.com";
	
	if (isset($_POST["cc"])){ $cc  = $_POST["cc"]; }
	if (isset($_POST["bcc"])){ $bcc  = $_POST["bcc"]; }

	$message = '
	<body bgcolor="#FFFFFF">
	<style type="text/css">	
	<!--
		body {
			font-size: 9pt;
			font-family: Arial, Helvetica, sans-serif;
		}
		-->
	</style>
	<body>
	<div align="center"><A href="mailto:'.$from.'">'.$from.'</a> submitted this request from '.$_SERVER['SERVER_NAME'].'<br><br></div>
	'.$mw.'
	</body>
	';
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	//$headers .= 'To: '.$Sender.'' . "\r\n";
	if (isset($from)){ $headers .= 'cc: '.$from . "\r\n"; }
	if (isset($_POST["bcc"])){ $headers .= 'Bcc: '.$bcc. "\r\n"; }
	$headers .= 'From: '.$from.'' . "\r\n";
	if (isset($_POST["cc"])){ $headers .= 'cc: '.$cc. "\r\n"; }
	if (isset($_POST["bcc"])){ $headers .= 'Bcc: '.$bcc. "\r\n"; }

	// Mail it
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	mail($to, $subject, $message, $headers) or die("<h3>Cannot send mail.</h3><br>mail(to, subject, message, headers)<br>mail($to, $subject, $message, $headers)");
	header("Location:".$_POST["LocOK"]);
	exit;
}

?>
