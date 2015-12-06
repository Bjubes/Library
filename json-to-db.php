<?php
    require_once 'define-apikey.php';

    $json_string = file_get_contents('http://isbndb.com/api/v2/json/'. APIkey .'/book/' . $isbn);

    $array = json_decode($json_string, true);
    $title = $array['data'][0]['title'];
    $author = $array['data'][0]['author_data'][0]['name'];
    $dewey = $array['data'][0]['dewey_normal'];
    $info = $array['data'][0]['edition_info'];
    $summary = $array['data'][0]['summary'];


   
?>



