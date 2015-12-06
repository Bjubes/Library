<?php
    
$labels = array("Copies", "Title", "Author", "ISBN", "Dewey Decimal", "Edition Information", "Summary");
$dbname = array("amt", "title", "author", "isbn", "dewey", "info", "summary");
$errors = array();
$defaults = array("Number of Copies", "Title", "Author", "ISBN", "Dewey Decimal", "ex. Hardcover", "A brief summary of the book. No Spoilers!");

$i = 0;
foreach ($labels as $l) {
    define($l,$i,true);
    $i++;
}

 $i = 0;
foreach ($dbname as $n) {
?>
<div class="form-group<?php echo !empty($errors[$i])?' error':'';?>">
    <label class="control-label"><?php echo $labels[$i]; ?></label>
    <div class="controls">
        <input class="form-control" name="<?php echo $dbname[$i]; ?>" type="text"  placeholder="<?php echo $defaults[$i]; ?>" value="<?php echo !empty($data[$n])?$data[$n]:'';?>">
        <?php if (!empty($errors[$i])): ?>
            <span class="help-inline"><?php echo $errors[$i];?></span>
        <?php endif; ?>
    </div>
</div>
<?php  
$i++; 
if ($i ==6){break;}
}
?>
<div class="form-group">
    <label class="control-label">Summary</label>
    <div class="controls">
        <textarea class="form-control" name="summary" form="bookForm"  placeholder="A brief summary of the book. No Spoilers!" ><?php if(!empty($data['summary'])) { echo $data['summary'];}?></textarea>
    </div>
</div>
