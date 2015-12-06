<form id="bookForm"class="form-horizontal" <?php if(!$createForm){
                                                echo 'action="update.php?id=' . $id. '"'; 
                                            }elseif($createForm) {
                                                echo'action="create-manual.php"'; 
                                            } ?> method="post">
    
    <?php require'input-form-loop.php'; ?>
    
<?php if(!$createForm) { ?>        
      <div class="form-actions">
          <a class="btn" href="index.php">Back</a>
          <button type="submit" class="btn btn-success">Update</button>
          <a href="reset.php?isbn=<?php echo '-' . $isbn .'&amt=' . $amt ?>" class="pull-right btn btn-warning">Reset using ISBN</a>
          <?php //the dash is in the line above so the isbn is treated as a string and not a number, losing its preceeding zeros ?>
        </div>
<?php } elseif($createForm) { ?>

        <div class="form-actions">
          <a class="btn btn-default" href="index.php">Back</a>
          <button type="submit" class="btn btn-success">Create</button>
          <?php //the dash is in the line above so the isbn is treated as a string and not a number, losing its preceeding zeros ?>
        </div>
        <?php } ?>
</form>