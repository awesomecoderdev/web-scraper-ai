<?php
$url = "https://www.google.com/search?q=cricket &hl=en";
/**
 * &start=20 // per page
 * &hl=de // country
 **/
$url = str_replace(" ", "+", $url);

$content = file_get_contents($url);
// file_put_contents("test.html", $content);
// die;
$output = [];
$htmlDom = new DOMDocument();
@$htmlDom->loadHTML($content);

// $links =  $htmlDom->getElementsByTagName('a');
// foreach ($links as $key => $link) {
//     if ($link->getAttribute("href")) {
//         $link_ = $link->getAttribute("href");
//         $search = substr($link_, 0, 7); // /url?q=
//         if ($search == "/url?q=") {
//             $url = str_replace("/url?q=", "", $link->getAttribute("href"));
//             $domain = parse_url($url, PHP_URL_HOST);
//             if (strpos($domain, ".google") == false) { // remove google links
//                 $slug = explode("&sa=", $url, 2);
//                 $url = is_array($slug) ? current($slug) : $url;
//                 echo "<a href='$url' >" . $link->textContent . "</a>";
//                 echo "<br>";
//             }
//         }
//     }
// }



// $links =  $htmlDom->getElementsByTagName('a');
// foreach ($links as $key => $link) {
//     if ($link->getAttribute("href")) {
//         $link_ = $link->getAttribute("href");
//         $search = substr($link_, 0, 7); // /url?q=
//         if ($search == "/url?q=") {
//             $url = str_replace("/url?q=", "", $link->getAttribute("href"));
//             $domain = parse_url($url, PHP_URL_HOST);
//             if (strpos($domain, ".google") == false) { // remove google links
//                 $slug = explode("&sa=", $url, 2);
//                 $url = is_array($slug) ? current($slug) : $url;
//                 echo "<a href='$url' >" . $link->textContent . "</a>";
//                 echo "<br>";

//                 // echo '<pre>' . $key;
//                 // print_r($link->parentNode);
//                 // echo '</pre>';
//                 // echo "<br>";
//                 // echo "Key SI $key<br>";
//                 // echo '<pre>' . $key;
//                 // print_r($link->parentNode);
//                 // echo '</pre>';
//                 // foreach ($link->parentNode as $key => $parent) {
//                 //     echo '<pre>';
//                 //     print_r($parent);
//                 //     echo '</pre>';
//                 // }
//             }
//         }
//     }
// }

$main = $htmlDom->getElementById("main");
// echo '<pre>';
// print_r($main);
// echo '</pre>';
if (!empty($main->childNodes)) {
    foreach ($main->childNodes as $key => $child) {
        if ($child->nodeName == "div") {
            echo '<pre>';
            print_r($child);
            echo '</pre>';
            // var_dump($child->attributes);
            foreach ($child->attributes as $key => $attributes) {
                echo '<pre>';
                print_r($attributes);
                echo '</pre>';
            }
        }
    }
}


// echo $content;
