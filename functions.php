<?php

function get_score_from_trustpilot($url)
{

    $useragent = stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
            )
        )
    );

    $page = file_get_contents($url, false, $useragent);
    $split_data = "data-rating-typography=\"true\">";
    $parsed = get_string_between($page, $split_data, "</p>");
    $floatvalue = floatval($parsed);

    return $floatvalue;
}


function get_total_review($url)
{

    $useragent = stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
            )
        )
    );

    $page = file_get_contents($url, false, $useragent);
    $split_data = "typography_fontstyle-normal__kHyN3 styles_text__W4hWi";
    $parsed = get_string_between($page, $split_data, "<!-- -->");
    $floatvalue = floatval($parsed);

    return $floatvalue;
}



function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
?>