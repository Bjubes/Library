<?php 
    session_start();

	require 'database.php';
    $length = 0;
    $isbnError = $amtError = array();
	if ( !empty($_POST)) {
        $valid = true;
        for($i = 0; $i < count($_POST['isbn']); $i++){
            

            // keep track values this iteration
            $isbn = $_POST['isbn'][$i];
            $amt = intval($_POST['amt'][$i]);
            //remove isbn dashes
            $isbn = str_replace("-", "", $isbn);
            $length = strlen($isbn);

            // validate input

             if ($length != 10 && $length != 13) {
                $isbnError[$i] = 'ISBN is invalid';
                $valid = false;
            }
            if (empty($isbn)) {
                $isbnError[$i] = 'Please enter an ISBN';
                $valid = false;
            }
            if($amt < 1 || !is_int($amt)){
                $amtError[$i] = 'Please enter a positive integer';
                $valid = false;
            }
            // insert data
            if ($valid) {
                require 'json-to-db.php';
                require 'add-to-database.php';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
  
</head>

<body>
    <div class="container">
    <?php if(isset($_POST)){var_dump($_POST);}?>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Add a Book</h3>
		    		</div>
    		          <div class="row">
	    			<form class="form-horizontal" action="create-many.php" method="post">
					  <?php for ($i =0; $i < 10; $i++) {
                        $isbn = isbn[$i];
                        
                        
                        ?>
                        <div class="form-group col-sm-5 <?php echo !empty($isbnError[$i])?'error':'';?>">
					    <label class="control-label">ISBN</label>
					    <div class="controls">
					      	<input class="form-control" name="isbn[]" type="text"  placeholder="ISBN" value="<?php echo !empty($isbn)?$isbn:'';?>">
					      	<?php if (array_key_exists($i, $isbnError)): ?>
					      		<span class="help-inline"><?php echo $isbnError[$i];?></span>
					      	<?php endif; ?>
                            </div>

					    </div>
                            <div class="col-sm-1">
					  </div>
                         <div class="form-group col-sm-6 <?php echo !empty($amtError[$i])?'error':'';?>">
					    <label class="control-label">Copies</label>
					    <div class="controls">
					      	<input class="form-control" name="amt[]" type="number"  placeholder="1" value="<?php echo !empty($amt)?$amt:'1';?>">
					      	<?php if (array_key_exists($i, $amtError)): ?>
					      		<span class="help-inline"><?php echo $amtError[$i];?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                        <?php } ?>
                    </div>

                        <div class="row">
					  <div class="form-actions col-sm-12">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn btn-default" href="index.php">Back</a>
						</div>
                  </div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>