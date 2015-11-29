<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sorttable.js"></script>
   
</head>

<body>
    <div class="container">
    		<div class="row">
               
                <h3>Library</h3>
                
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
				<p>
					<a href="create.php" class="btn btn-success">Add book using ISBN</a>
					<a href="create-manual.php" class="btn btn-info">Add book manually</a>
                    <input class="pull-right" type="text" id="search" placeholder="Type to search">
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
							   	echo '<a class="btn" href="read.php?id='.$row['id'].'">Details</a>';
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
  </body>
    <?php
        //null out error and info messages
        $_SESSION['infoMessage'] = NULL;
        $_SESSION['errorMessage'] = NULL;
    ?>
</html>