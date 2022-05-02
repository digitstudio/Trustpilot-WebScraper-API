<?php


include("functions.php");



$floatvalue = "";
$totalreview = "";

if (isset($_GET['url'])) {

	$floatvalue = get_score_from_trustpilot("https://www.trustpilot.com/review/digitstudio.fr"); // GET GLOBAL SCORE FROM TRUSTPILOT OF OUR WEBSITE like for example 2.5/5 
	if (isset($_GET['score'])) {
		echo $floatvalue;
	}

	if (isset($_GET['scoreimg'])) {
		echo "<img src='img/stars-" . $floatvalue . ".svg'</img>";
	}

	if (isset($_GET['totalreview'])) {
		$totalreview = get_total_review("https://www.trustpilot.com/review/digitstudio.fr");
		echo $totalreview;
	}

	if (isset($_GET['widgetmini'])) {
		if ($totalreview == "") {
			$totalreview = get_total_review("https://www.trustpilot.com/review/digitstudio.fr");
			include("widgetmini.php"); 
		}
	}
} else {
	echo "URL is a parameter needed";
	exit;
}
