<?php 
    session_start();

	require 'database.php';
    $length = 0;

	if ( !empty($_POST)) {
		$isbn = null;
        $amt = 1;
		
		// keep track post values
		$isbn = $_POST['isbn'];
		$amt = intval($_POST['amt']);
        $isbn = str_replace("-", "", $isbn);
        $length = strlen($isbn);

		// validate input
		$valid = true;
            
         if ($length != 10 && $length != 13) {
			$isbnError = 'ISBN is invalid';
			$valid = false;
		}
		if (empty($isbn)) {
			$isbnError = 'Please enter an ISBN';
			$valid = false;
		}
        
		// insert data
		if ($valid) {
           require 'json-to-db.php';
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
		    			<h3>Add a Book</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group <?php echo !empty($isbnError)?'error':'';?>">
					    <label class="control-label">ISBN</label>
					    <div class="controls">
					      	<input name="isbn" type="text"  placeholder="ISBN" value="<?php echo !empty($isbn)?$isbn:'';?>">
					      	<?php if (!empty($isbnError)): ?>
					      		<span class="help-inline"><?php echo $isbnError;?></span>
					      	<?php endif; ?>
                            

					    </div>
					  </div>
                        
                         <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <label class="control-label">Copies</label>
					    <div class="controls">
					      	<input name="amt" type="number"  placeholder="1" value="<?php echo !empty($amt)?$amt:'1';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                        
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>