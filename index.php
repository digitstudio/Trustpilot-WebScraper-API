<?php


include("functions.php");



$scorevalue = "";
$totalreview = "";

// for example url = https://www.trustpilot.com/review/digitstudio.fr 
if (isset($_GET['url']))  {
	$url = $_GET['url'];
	$scorevalue = get_score_from_trustpilot($url); // GET GLOBAL SCORE FROM TRUSTPILOT OF OUR WEBSITE like for example 2.5/5 
	if (isset($_GET['score'])) {
		echo $scorevalue;
	}

	if (isset($_GET['scoreimg'])) {
		echo "<img src='img/stars-" . $scorevalue . ".svg'</img>";
	}

	if (isset($_GET['totalreview'])) {
		$totalreview = get_total_review($url);
		echo $totalreview;
	}

	if (isset($_GET['widgetmini'])) {
		if ($totalreview == "") {
			$totalreview = get_total_review($url);
			include("widgetmini.php"); 
		}
		
	}
} else {
	echo "URL is a parameter needed";
	exit;
}


?>