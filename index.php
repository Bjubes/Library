<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sorttable.js"></script>
   
</head>

<body>
    <div class="container">
    		<div class="row">
               
                <h3>Library                     <a href="settings.php"><span class="glyphicon glyphicon-cog pull-right"></span></a>
</h3>
                
                 <?php //error and info messages
                    if (!empty($_SESSION['errorMessage'])) {
                        $errorMsg = $_SESSION['errorMessage'];
                        ?>
                          <div class="alert alert-danger">
                            <?php echo $errorMsg . '</div>'; } 
                    
                    if (!empty($_SESSION['infoMessage'])) { 
                        $infoMsg = $_SESSION['infoMessage'];
                         ?>
                          <div class="alert alert-success">
                            <?php echo $infoMsg . '</div>'; }
                ?>    			
                              
    		</div>
			<div class="row">
				<p class="form-inline">
					<a href="create.php" class="btn btn-success">Add book using ISBN</a>
					<a href="create-manual.php" class="btn btn-default">Add book manually</a>
                    <input class="form-control pull-right" type="text" id="search" placeholder="Type to search" value="<?php echo !empty($_GET['q'])?$_GET['q']:'';?>">
                    <span id="searchclear" class="glyphicon glyphicon-remove-circle"><onclick="clearInputField()"/></span>
				</p>
                
               

				
				<table id="table" class="sortable table table-striped table-bordered">
		              <thead>
		                <tr>
                            <th>Copies</th>
		                  <th>Title</th>
		                  <th>Author</th>
		                  <th>ISBN</th>
                          <th>Dewey Decimal</th>
		                  <th class="sorttable_nosort">Info</th>
		                  <th class="sorttable_nosort">Actions</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM books ORDER BY author';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr> ';
							   	echo '<td> '. $row['amount'] . '</td>';
							   	echo '<td> '. $row['title'] . '</td>';
							   	echo '<td> '. $row['author'] . '</td>';
							   	echo '<td> '. $row['isbn'] . '</td>';
                           		echo '<td> '. $row['dewey_decimal'] . '</td>';
							   	echo '<td> '. $row['edition_info'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn btn-info" href="read.php?id='.$row['id'].'">Details</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Modify</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/search-table.js"></script>
    <script src="js/search-clear.js"></script>
    <?php //click on search bar if a query is given
    if (!empty($_GET['q'])) { echo '<script type="text/javascript" src="js/click-search.js"></script>'; } ?>
  </body>
    <?php
        //null out error and info messages
        $_SESSION['infoMessage'] = NULL;
        $_SESSION['errorMessage'] = NULL;
    ?>
</html>