<?php 
    session_start();
	require 'database.php';

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM books";
    $q = $pdo->prepare($sql);
    $q->execute();
    Database::disconnect();
    $_SESSION['errorMessage'] = 'Library deleted.';
    header("Location: index.php");

?>