	    			<form id="bookForm"class="form-horizontal" <?php if(!$createForm){
    echo 'action="update.php?id=' . $id. '"'; }
elseif($createForm) {
    echo'action="create-manual.php"'; 
} ?> method="post">
                    <div class="form-group <?php echo !empty($amt)?'error':'';?>">
					    <label class="control-label">Copies</label>
					    <div class="controls">
					      	<input class="form-control" name="amt" type="number"  placeholder="Number of Copies" value="<?php echo !empty($amt)?$amt:'';?>">
					    </div>
					  </div>
					  <div class="form-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Title</label>
					    <div class="controls">
					      	<input class="form-control" name="title" type="text"  placeholder="Title" value="<?php echo !empty($title)?$title:'';?>">
					      	<?php if (!empty($titleError)): ?>
					      		<span class="help-inline"><?php echo $titleError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="form-group <?php echo !empty($authorError)?'error':'';?>">
					    <label class="control-label">Author</label>
					    <div class="controls">
					      	<input class="form-control" name="author" type="text" placeholder="Author" value="<?php echo !empty($author)?$author:'';?>">
					      	<?php if (!empty($authorError)): ?>
					      		<span class="help-inline"><?php echo $authorError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-group <?php echo !empty($isbnError)?'error':'';?>">
					    <label class="control-label">ISBN</label>
					    <div class="controls">
					      	<input class="form-control" name="isbn" type="text"  placeholder="ISBN" value="<?php echo !empty($isbn)?$isbn:'';?>">
					      	<?php if (!empty($isbnError)): ?>
					      		<span class="help-inline"><?php echo $isbnError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                      <div class="form-group <?php echo !empty($dewey)?'error':'';?>">
					    <label class="control-label">Dewey Decimal</label>
					    <div class="controls">
					      	<input class="form-control" name="dewey" type="text"  placeholder="Dewey Decimal Value" value="<?php echo !empty($dewey)?$dewey:'';?>">
					    </div>
					  </div>
                         <div class="form-group <?php echo !empty($info)?'error':'';?>">
					    <label class="control-label">Edition Information</label>
					    <div class="controls">
					      	<input class="form-control" name="info" type="text"  placeholder="" value="<?php echo !empty($info)?$info:'';?>">
					    </div>
					  </div>
                        <div class="form-group <?php echo !empty($summary)?'error':'';?>">
					    <label class="control-label">Summary</label>
					    <div class="controls">
                            <textarea class="form-control" name="summary" form="bookForm"  placeholder="A brief summary of the book. No Spoilers!" ><?php if(!empty($summary)) { echo $summary;}?></textarea>
					    </div>
					  </div>
                <?php if(!$createForm) { ?>        
					  <div class="form-actions">
  						  <a class="btn" href="index.php">Back</a>
						  <button type="submit" class="btn btn-success">Update</button>
                          <a href="reset.php?isbn=<?php echo '-' . $isbn .'&amt=' . $amt ?>" class="pull-right btn btn-warning">Reset using ISBN</a>
                          <?php //the dash is in the line above so the isbn is treated as a string and not a number, losing its preceeding zeros ?>
						</div>
                <?php } elseif($createForm) { ?>
                        
                        <div class="form-actions">
  						  <a class="btn" href="index.php">Back</a>
						  <button type="submit" class="btn btn-success">Create</button>
                          <?php //the dash is in the line above so the isbn is treated as a string and not a number, losing its preceeding zeros ?>
						</div>
                        <?php } ?>
					</form>
