<?php 
    
// set twitter id and tweet count
$t_id   = "twitter"; 
$count  = "5";

echo '<ul id="twitter">';

$twitterFeed = json_decode(file_get_contents("https://api.twitter.com/1/statuses/user_timeline/$t_id.json?count=$count&include_rts=1"));
if ($twitterFeed) {
    foreach($twitterFeed as $t) {
        $tweetText = preg_replace('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#','<a href="$1">$1</a>', $t->text);
        $tweetText = preg_replace('/(^|\s)@([a-z0-9_]+)/i','$1<a href="http://www.twitter.com/$2">@$2</a>', $tweetText);
        echo '
            <li>
                <div class="text">'.$tweetText.'</div>
                <div class="time"><a href="http://twitter.com/'.$t_id.'/status/'.$t->id_str.'" target="_blank">'.date('F jS @ g:ia',strtotime($t->created_at)).'</a></div>
            </li>
        ';
    }
} else {
    echo '
        <li>
            <div class="text">Sorry, but the twitter feed is unavailable at this time.</div>
            <div class="time"><a href="#">check back</a></div>
        </li>
    ';
}

echo '</ul>';