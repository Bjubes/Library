<?php 
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM books where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
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
		    			<h3>Details</h3>
		    		</div>
                    <?php if($data['amount'] == 1) { ?>
                    <p>There is one copy on file.</p>
                    <?php } else {?>
                    <p>There are <?php echo $data['amount'];?> copies on file.</p>
                    <?php } ?>
	    			<div class="form-horizontal" >
					  <div class="form-group">
					    <label class="control-label">Title</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['title'];?>
						    </label>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label">Author</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['author'];?>
						    </label>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label">ISBN</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['isbn'];?>
						    </label>
					    </div>
					  </div>
                        <div class="form-group">
					    <label class="control-label">Dewey Decimal</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['dewey_decimal'];?>
						    </label>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label">Edition Information</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['edition_info'];?>
						    </label>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label">Summary</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['summary'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <a class="btn" href="index.php">Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>