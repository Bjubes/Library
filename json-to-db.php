<?php
    $json_string = file_get_contents('http://isbndb.com/api/v2/json/ANRI2C56/book/' . $isbn);

    $array = json_decode($json_string, true);
    $title = $array['data'][0]['title'];
    $author = $array['data'][0]['author_data'][0]['name'];
    $dewey = $array['data'][0]['dewey_normal'];
    $info = $array['data'][0]['edition_info'];
    $summary = $array['data'][0]['summary'];


    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO `library`.`books` (`isbn`, `author`, `title`, `dewey_decimal`, `edition_info`, `summary`, `amount`) VALUES (?,?,?,?,?,?,?);";            

    $q = $pdo->prepare($sql);
    $q->execute(array($isbn,$author,$title,$dewey,$info,$summary,$amt));
    Database::disconnect();
?>