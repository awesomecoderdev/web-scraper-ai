<?php
$url = "https://www.google.com/search?q=google search language query"; //&start=20
$url = str_replace(" ", "+", $url);

$content = file_get_contents($url);
$output = [];
$htmlDom = new DOMDocument();
@$htmlDom->loadHTML($content);

$links =  $htmlDom->getElementsByTagName('a');
foreach ($links as $key => $link) {
    if ($link->getAttribute("href")) {
        $link_ = $link->getAttribute("href");
        $search = substr($link_, 0, 7); // /url?q=
        if ($search == "/url?q=") {
            $url = str_replace("/url?q=", "", $link->getAttribute("href"));
            $domain = parse_url($url, PHP_URL_HOST);
            if (strpos($domain, ".google") == false) { // remove google links
                $slug = explode("&sa=", $url, 2);
                $url = is_array($slug) ? current($slug) : $url;
                echo "<a href='$url' >" . $link->textContent . "</a>";
                echo "<br>";
            }
        }
    }
}

// echo $content;
