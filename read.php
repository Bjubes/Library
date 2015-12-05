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
				    <?php
                    $labels = array("Title", "Author", "ISBN", "Dewey Decimal", "Edition Information", "Summary");
                    $i = 0;
                    foreach ($data as $v) { ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php echo $labels[$i]; ?></label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?php echo $v ?></p>
                            </div>
                        </div>
                    <?php 
                        $i += 1;
                        if ($i == 6){
                        break;}
                    }
                    ?> 

					    <div class="form-actions">
						  <a class="btn" href="index.php">Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>