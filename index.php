<?php 
include("functions.php"); 



// WEB SCRAPPING STUFFg
$useragent = stream_context_create(
	array(
	    "http" => array(
		"header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
	    )
	)
    );
    

$url = "https://www.trustpilot.com/review/digitstudio.fr"; 
$page = file_get_contents($url, false, $useragent);
$split_data = "data-rating-typography=\"true\">"; 
$parsed = get_string_between($page, $split_data,"</p>");
$floatvalue = floatval($parsed);


// FINAL VALUE RETURNED 
$img_stars_trustpilot = "https://cdn.trustpilot.net/brand-assets/4.1.0/stars/stars-".$floatvalue.".svg";
echo $img_stars_trustpilot;
echo "<br>";
echo $floatvalue;
?> 