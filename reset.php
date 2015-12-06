<?php 
    session_start();

	require 'database.php';
    $length = 0;

	if ( !empty($_GET)) {
		$isbn = null;
        $amt = 1;
    }

    $isbn = $_GET['isbn'];
    $amt = intval($_GET['amt']);
    $isbn = str_replace("-", "", $isbn);

    //delete old entry
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM books WHERE isbn = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($isbn));
    Database::disconnect();

    //refil new one
    require 'json-to-db.php';
    require 'add-to-database.php';

    $_SESSION['infoMessage']= 'Reset ' . $title;
    header("Location: index.php");
?>