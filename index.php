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
		$picture = $scorevalue; 
		if ($scorevalue >= 1.5 && $scorevalue < 2){  $picture = 1.5; }
		if ($scorevalue >= 2.5 && $scorevalue < 3){  $picture = 2.5; }
		if ($scorevalue >= 3.5 && $scorevalue < 4){  $picture = 3.5; }
		if ($scorevalue >= 4.5 && $scorevalue < 5){  $picture = 4.5; }
		echo "<img src='img/stars-" . $picture . ".svg'</img>";
	}

	if (isset($_GET['totalreview'])) {
		$totalreview = get_total_review($url);
		echo $totalreview;
	}

	if (isset($_GET['widgetmini'])) {
		$picture = $scorevalue; 
		if ($scorevalue >= 1.5 && $scorevalue < 2){  $picture = 1.5; }
		if ($scorevalue >= 2.5 && $scorevalue < 3){  $picture = 2.5; }
		if ($scorevalue >= 3.5 && $scorevalue < 4){  $picture = 3.5; }
		if ($scorevalue >= 4.5 && $scorevalue < 5){  $picture = 4.5; }
		
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