<?php
/*** Used at LGBT NYC for NSD ***/
/*** Adds a shortcode that wraps each list item in a a href= going to search the text inside the li's ***/
/*** Renders the list into a string of comma separated items ***/

/* add key orgs searchable tags */
function keyOrgs( $atts, $content = null ) {
	$content = str_replace("</li>","|",$content);
	$content = strip_tags($content);
	$keyList = explode("|", $content);
	
	foreach ($keyList as $muhKey) {
		if(substr($muhKey, -1, 1) == ',') {

  			$muhKeyNc = substr($muhKey, 0, -1);
			$muhKeyNc = '"' . $muhKeyNc .'"';

		} else {
			$muhKeyNc = $muhKey;
			
			$muhKeyNc = '"' . $muhKeyNc .'"';
		}
		$keyedContent .= "<a href='/?s=$muhKeyNc'>". $muhKey . "</a> ";
	}
    return '<div class="keyOrgs">'.$keyedContent.'</div>';
}
add_shortcode("key_orgs", "keyOrgs");

/***/