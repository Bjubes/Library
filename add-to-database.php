<?php 

    require_once'database.php';
    $isbnValid = true;
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($isbn != "" && $isbn != NULL) { //isbn is unique
    
        //make sure it doesn't exist already
        $sql = "SELECT * FROM books where isbn = ? LIMIT 1";
        $q = $pdo->prepare($sql);
        $q->execute(array($isbn));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        //an empty return is equal to false
        if ($data != false) {
            //the isbn already exists in the library!
            $isbnValid = false;
            $_SESSION['errorMessage'] = 'The book with an ISBN of '.$isbn.' already exists as "' . $data['title'] . '". <a href="?q='. $isbn .'">Show</a>';
			header("Location: index.php");

        }
    }
    
    if ($isbnValid) {
        $sql = "INSERT INTO books(`isbn`, `author`, `title`, `dewey_decimal`, `edition_info`, `summary`, `amount`) VALUES (?,?,?,?,?,?,?);"; 
        $q = $pdo->prepare($sql);
        $q->execute(array($isbn,$author,$title,$dewey,$info,$summary,$amt));
        Database::disconnect();
        $_SESSION['infoMessage'] = 'added "' . $title . '" to the library.';
        header("Location: index.php");
    }
?>