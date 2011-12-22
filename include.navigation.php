<?php
	
// main navigation goes here
$mainnav = array(
    'Welcome'           => 'default.php',
    'Nav w/ Dropdown'   => array(
        '#',
        'DropOne'		=> '#',
        'DropTwo'		=> '#',
    ),
    'Contact'           => 'contact.php'
);


// do not edit below this line
function writeNavigation($array, $writeSubNav="", $domain="", $cut_first="") {

    $domain .= ($domain=="" ? "" : "/"); 
    
    if (!empty($cut_first)){
        $array = array_slice($array, 1);
    }
    
    $i = 1;
    $len = count($array);
    $first = ' class="first"';
    $last = ' class="last"';
    
    // loop through the array
    foreach ($array as $key => $value){

        // if dropdowns are turned on 
        if ($writeSubNav=="1"){

            // if the value is an array (if there is a dropdown)
        	if (is_array($value)){
                $link = $value[0];

                // add in a class of first or last if it is the first or last element in the array
                echo '<li'. ($i==1 ? $first : ($i==$len ? $last : '')) .'><a href="'.$domain.$link.'">'.$key.'</a><ul>';
                
                // loop through the dropdown array
                foreach (array_slice($value, 1) as $key2 => $value2){

                    // is there a secondary dropdown array
    				if(is_array($value2)){
    					$link2 = $value2[0];
                        echo '<li><a href="'.$link2.'">'.$key2.'</a><ul>';

                        // loop through the secondary dropdown
    					foreach (array_slice($value2, 1) as $key3 => $value3){
    						echo '<li><a href="'.$value3.'">'.$key3.'</a></li>';
    					}
                        echo '</ul></li>';

                    // write the dropdown as normal
    			    } else {
    		    		echo '<li><a href="'.$value2.'">'.$key2.'</a></li>';
    	    		}
           		}
                echo '</ul></li>';
                $i++;

            // if the value is not an array
    		} else {
        		echo '<li'. ($i==1 ? $first : ($i==$len ? $last : '')) .'><a href="'.$domain.$value.'">'.$key.'</a></li>';  
                $i++; 
            }

        // if dropdowns are turned off
        } else {

            // if dropdowns are turned off but there is still an array, ignore the array
    		if(is_array($value)){
                $link = $value[0];
                echo '<li'. ($i==1 ? $first : ($i==$len ? $last : '')) .'><a href="'.$domain.$link.'">'.$key.'</a></li>';
                $i++;

            // business as usual
            } else {
               	echo '<li'. ($i==1 ? $first : ($i==$len ? $last : '')) .'><a href="'.$domain.$value.'">'.$key.'</a></li>';
                $i++; 
    		}
    	}
    }
} 

$open_nav = '<ul id="navlist" class="clearfix">';
$close_nav = '</ul>';

if ($pageName=="404b") {
	echo $open_nav;
	writeNavigation($mainnav, 0, $myDomain);
	echo $close_nav;
} else {
	echo $open_nav;
	writeNavigation($mainnav, $dropdownnav);
	echo $close_nav;
}

?>
