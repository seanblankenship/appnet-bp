<?php
	
// main navigation goes here
$mainnav = array(
    'Welcome'           => 'default.php',
    'Nav w/ Dropdown'   => array(
        '#',
        'DropOne'		=> '#',
        'DropTwo'		=> '#'
    ),
    'Contact'           => 'contact.php'
);


// do not edit below this line
function writeNavigation($array, $writeSubNav="", $domain="", $cut_first="") { 

    $domain .= ($domain=="" ? "" : "/"); 
    
    if (!empty($cut_first)){
        $array = array_slice($array, 1);
    }
    
    $i=0;
    $len=count($array);
    $first=' class="first"';
    $last=' class="last"';
    
    foreach ($array as $key => $value){
    	if ($writeSubNav=="1"){
        	if (is_array($value)){
        		$link = $value[0];
                echo '<li';
                if ($i==0){echo $first;} elseif ($i==$len-1){echo $last;}
                echo '><a href="'.$domain.$link.'">'.$key.'</a><ul>';
    			foreach (array_slice($value, 1) as $key2 => $value2){
    				if(is_array($value2)){
    					$link2 = $value2[0];
    					echo '<li><a href="'.$link2.'">'.$key2.'</a><ul>';
    					foreach (array_slice($value2, 1) as $key3 => $value3){
    						echo '<li><a href="'.$value3.'">'.$key3.'</a></li>';
    					}
    					echo '</ul></li>';
    			    } else {
    		    		echo '<li><a href="'.$value2.'">'.$key2.'</a></li>';
    	    		}
           		}
                echo '</ul></li>';
                $i++;
    		} else {
        		echo '<li';
                if ($i==0){echo $first;} elseif ($i==$len-1){echo $last;}
                echo '><a href="'.$domain.$value.'">'.$key.'</a></li>';
                $i++; 
    		}
    	} else {
    		if(is_array($value)){
    			$link = $value[0];
    			echo '<li><a href="'.$domain.$link.'">'.$key.'</a></li>';
       		} else {
               	echo '<li';
                if ($i==0){echo $first;} elseif ($i==$len-2){echo $last;}
                echo '><a href="'.$domain.$value.'">'.$key.'</a></li>';
                $i++; 
    		}
    	}
    }
} 

$open_nav = '<ul id="navlist" class="clearfix">';
$close_nav = '</ul>';

if($pageName=="404b"){
	echo $open_nav;
	writeNavigation($mainnav, "0", $myDomain);
	echo $close_nav;
} elseif($dropdownnav=="0"){
	echo $open_nav;
	writeNavigation($mainnav, "0", "");
	echo $close_nav;
} elseif($dropdownnav=="1"){
	echo $open_nav;
	writeNavigation($mainnav, "1", "");
	echo $close_nav;
}

?>
