<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php $pageName = "404b"; ?>
<?php include("include.config.php"); ?>

<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php echo($myCompany); ?> :: 404 Error</title>

<style type="text/css">
	@import url('<?php echo($myDomain); ?>/css/reset.css');
	@import url('//fonts.googleapis.com/css?family=Ubuntu&v1');
	@import url('//fonts.googleapis.com/css?family=Ultra&v1');
	body {background:#fff url('<?php echo($myDomain); ?>/404b/bg.jpg') center top repeat-x; color:#000; font:14px/21px Ubuntu, Arial, Helvetica, sans-serif; margin:0; min-width:960px; padding:0; text-shadow:1px 1px 1px #fff;}
	a {display:inline-block; padding:0 2px; text-decoration:none;}
	a:active {position:relative; top:1px;}
	a:link, a:visited, a:active {color:#466d98; border-bottom:1px dotted #466d98;}
	a:hover {background:#7b9dc2; border-bottom:1px solid #466d98; color:#fff; text-shadow:0 1px 0 #000;}
	#container {margin:0 auto; padding-top:50px; width:900px;}
	h1, h2, h3 {font-family:Ultra; font-weight:normal;}
	h1 {color:#466d98; font-size:22px; text-shadow:1px 1px 1px #fff;}
	h2 {color:#fff; font-size:116px; line-height:105px; margin-left:-20px; text-shadow:1px 1px 1px #466d98;}
	h3 {color:#466d98; font-size:22px; padding-top:40px; text-shadow:1px 1px 1px #fff;}
	p {margin-bottom:15px;}
	#text {padding:20px 0; width:370px;}
	#quote {color:#fff; font-family:Ultra; font-size:18px; height:100px; line-height:21px; padding:13px 0; text-shadow:1px 1px 1px #000; width:350px;}
	#nav-block {width:550px;}
	#mainnav {list-style:none; margin:10px 0 15px 0; padding:0;}
	#mainnav li {float:left; margin:0 0 5px 0; padding:0;}
	#mainnav li a {margin:0 15px 0 0;}
</style>
	
</head>

<body>

	<div id="container">
	
		<h2>Oops!</h2>
		<h1>404 Error</h1>
		
		<div id="text">
			<p>The page you requested cannot be located. Check the URL and try again. Perhaps the link was mistyped, or perhaps you've tried to visit a page that has been unplugged.</p>
			<p>Please <a href="<?php echo($myDomain); ?>">click here to return to our home page</a>.</p>
		</div>
		
		<div id="quote">
			<p>Hello, I.T...</p>
			<p>Have you tried turning it off and on again?</p>
		</div>
		
		<h3>Site Navigation:</h3>
		<div id="nav-block"><?php include("include.navigation.php"); ?></div>
		<p class="copyright">Copyright &copy; <?php echo($myDate); ?> <?php echo($myCompany); ?>. <a href="<?php echo($myStateurl[$myState]); ?>"><?php echo($myStatename[$myState]); ?> Web Design</a> by AppNet.com.</p>
	
	</div>

</body>

</html>