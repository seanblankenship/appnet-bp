<?php

$mainnav = array(
    'Welcome'       => 'default.php',
    'Dropdown'      => array(
        'DropOne'       => '#',
        'DropTwo'       => '#'
    ),
    'Contact'       => 'contact.php'
);


function writeNavigation($array, $writeSubNav="", $domain="", $cut_first="") {

    $domain .= ($domain=="" ? "" : "/"); 
    
    // takes off the first key->value in the array
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

                // check if the link is supposed to open in a new window
                $values = checkTarget($link);

                // add in a class of first or last if it is the first or last element in the array
                echo '<li'.($i==1 ? $first : ($i==$len ? $last : '')).'><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key.'</a><ul>';  
                
                // loop through the dropdown array
                foreach (array_slice($value, 1) as $key2 => $value2){

                    // is there a secondary dropdown array
                    if(is_array($value2)){
                        $link2 = $value2[0];
                        $values = checkTarget($link2);
                        echo '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key2.'</a><ul>';

                        // loop through the secondary dropdown
                        foreach (array_slice($value2, 1) as $key3 => $value3){
                            $values = checkTarget($value3);  
    						echo '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key3.'</a></li>';
    					}
                        echo '</ul></li>';

                    // write the dropdown as normal
                    } else {
                        $values = checkTarget($value2); 
    		    		echo '<li><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key2.'</a></li>';
    	    		}
           		}
                echo '</ul></li>';

            // if the value is not an array
            } else {
                $values = checkTarget($value);
                echo '<li'.($i==1 ? $first : ($i==$len ? $last : '')).'><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key.'</a></li>'; 
            }
            $i++;

        // if dropdowns are turned off
        } else {

            // if dropdowns are turned off but there is still an array, ignore the array
    		if(is_array($value)){
                $link = $value[0];
                $values = checkTarget($link);
                echo '<li'.($i==1 ? $first : ($i==$len ? $last : '')).'><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key.'</a></li>';

            // business as usual
            } else {
                $values = checkTarget($value);
                echo '<li'.($i==1 ? $first : ($i==$len ? $last : '')).'><a href="'.$domain.$values[0].'"'.$values[1].'>'.$key.'</a></li>';
            }
            $i++;
    	}
    }
} 

// check if the link should open in a new window
function checkTarget($link) {
    $target = substr($link,-4);
    if ($target=="_new"){
        $link = substr($link,0,-4);
        $target = ' target="_blank"';
    } elseif ($target==".pdf"){
        $target = ' target="_blank"';
    } else {
        $target = '';
    }
    $list = array($link,$target);
    return $list;    
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
