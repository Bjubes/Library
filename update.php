<?php 
	session_start();
	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	
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
			$sql = "UPDATE books  set isbn = ?, author = ?, title = ?, dewey_decimal = ?, edition_info = ?, summary = ?, amount =? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($isbn,$author,$title,$dewey,$info,$summary,$amt,$id));
			Database::disconnect();
            $_SESSION['infoMessage'] = $title . ' updated.';

			header("Location: index.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM books where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
        //old detials to modify
        $title = $data['title'];
		$author = $data['author'];
		$isbn = $data['isbn'];
        $dewey = $data['dewey_decimal'];
        $info = $data['edition_info'];
		$summary = $data['summary'];
		$amt = $data['amount'];
		
		
		Database::disconnect();
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
                        <h3>Modify Book Details</h3>
		    		</div>
                    <?php  $createForm = false;
                    require'full-book-input-form.php';?>    
				</div>
				
    </div> <!-- /container -->
  </body>
</html>