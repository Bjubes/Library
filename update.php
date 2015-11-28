<?php 
	
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
    		
	    			<form id="updateForm"class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                    <div class="control-group <?php echo !empty($amt)?'error':'';?>">
					    <label class="control-label">Copies</label>
					    <div class="controls">
					      	<input name="amt" type="number"  placeholder="Number of Copies" value="<?php echo !empty($amt)?$amt:'';?>">
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Title</label>
					    <div class="controls">
					      	<input name="title" type="text"  placeholder="Title" value="<?php echo !empty($title)?$title:'';?>">
					      	<?php if (!empty($titleError)): ?>
					      		<span class="help-inline"><?php echo $titleError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($authorError)?'error':'';?>">
					    <label class="control-label">Author</label>
					    <div class="controls">
					      	<input name="author" type="text" placeholder="Author" value="<?php echo !empty($author)?$author:'';?>">
					      	<?php if (!empty($authorError)): ?>
					      		<span class="help-inline"><?php echo $authorError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($isbnError)?'error':'';?>">
					    <label class="control-label">ISBN</label>
					    <div class="controls">
					      	<input name="isbn" type="text"  placeholder="ISBN" value="<?php echo !empty($isbn)?$isbn:'';?>">
					      	<?php if (!empty($isbnError)): ?>
					      		<span class="help-inline"><?php echo $isbnError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                      <div class="control-group <?php echo !empty($dewey)?'error':'';?>">
					    <label class="control-label">Dewey Decimal</label>
					    <div class="controls">
					      	<input name="dewey" type="text"  placeholder="Dewey Decimal Value" value="<?php echo !empty($dewey)?$dewey:'';?>">
					    </div>
					  </div>
                         <div class="control-group <?php echo !empty($info)?'error':'';?>">
					    <label class="control-label">Edition Information</label>
					    <div class="controls">
					      	<input name="info" type="text"  placeholder="" value="<?php echo !empty($info)?$info:'';?>">
					    </div>
					  </div>
                        <div class="control-group <?php echo !empty($summary)?'error':'';?>">
					    <label class="control-label">Summary</label>
					    <div class="controls">
                            <textarea name="summary" form="updateForm"  placeholder="A brief summary of the book. No Spoilers!" ><?php if(!empty($summary)) { echo $summary;}?></textarea>
					    </div>
					  </div>
					  <div class="form-actions">
  						  <a class="btn" href="index.php">Back</a>
						  <button type="submit" class="btn btn-success">Update</button>
                          <a href="reset.php?isbn=<?php echo '-' . $isbn .'&amt=' . $amt ?>" class="pull-right btn btn-warning">Reset using ISBN</a>
                          <?php //the dash is in the line above so the isbn is treated as a string and not a number, losing its preceeding zeros ?>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>