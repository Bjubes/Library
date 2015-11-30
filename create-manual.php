<?php 
	session_start();
	require 'database.php';

	
	if ( !empty($_POST)) {
		// keep track validation errors
		$nameError = null;
		$emailError = null;
		$mobileError = null;
		
        // keep track post values
		$title = $_POST['title'];
		$author = $_POST['author'];
		$isbn = $_POST['isbn'];
        $dewey = $_POST['dewey'];
		$summary = $_POST['summary'];
        $info = $_POST['info'];
		$amt = intval($_POST['amt']);
        
        
		// validate input
		$valid = true;
		if (empty($author)) {
			$nameError = 'Please enter an author';
			$valid = false;
		}
		
		if (empty($title)) {
			$titleError = 'Please enter a title';
			$valid = false;
		} 
        $length = strlen($isbn);

        if ($length != 10 && $length != 13 && $length !=0) {
			$isbnError = 'ISBN is invalid';
			$valid = false;
		}
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO books(`isbn`, `author`, `title`, `dewey_decimal`, `edition_info`, `summary`, `amount`) VALUES (?,?,?,?,?,?,?);"; 
			$q = $pdo->prepare($sql);
			$q->execute(array($isbn,$author,$title,$dewey,$info,$summary,$amt));
			Database::disconnect();
            $_SESSION['infoMessage'] = 'added "' . $title . '" to the library.';

			header("Location: index.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
                        <h3>Add a New Book</h3>
		    		</div>
    		
                    <?php  $createForm = true;
                    require'full-book-input-form.php';?>    
				
                    </div>
				
    </div> <!-- /container -->
  </body>
</html>