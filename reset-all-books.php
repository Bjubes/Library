<?php 
    session_start();

	require 'database.php';

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id, isbn FROM `books` WHERE `isbn` != 0";
    $q = $pdo->prepare($sql);
    $q->execute();
    $data = $q->fetchAll(PDO::FETCH_ASSOC);

    $sql = "UPDATE books  set title = ?, author = ?, dewey_decimal = ?, edition_info = ?, summary = ? WHERE id = ?";    
    
    $q = $pdo->prepare($sql);

    foreach($data as $d) {
    $isbn = $d['isbn'];
    require 'json-to-db.php';

    $q->execute(array($title, $author, $dewey, $info, $summary, $d['id']));
    }

    Database::disconnect();

    $_SESSION['infoMessage']= count($data) . ' Books reset by ISBN';
    header("Location: index.php");
?>