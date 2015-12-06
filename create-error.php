<?php
    $id = null;
	if ( !empty($_GET['isbn'])) {
		$isbn = $_REQUEST['isbn'];
	}
	
	if ( null==$isbn ) {
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <title>ISBN Not Found</title>
</head>

<body>
    <div class="container">
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Error: ISBN Not Found</h3>
		    		</div>
    		          <p>No book with an isbn of "<?php echo $isbn?>" was found in the database. Instead you can add this book manually.<br>
						  <a class="btn btn-success" href="create-manual.php">Add Manually</a>
						  <a class="btn btn-default" href="create.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>