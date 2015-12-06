<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <a href="index.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Back</a>
    		<div class="row">
               
                <h3>Settings</h3>
                <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Delete all Entries</button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
                </div>
                <div class="modal-body">
                Are you sure you want to delete every book in your library? You cannot undo this action.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No! Go back!</button>
                <a href="delete-all-books.php" class="btn btn-danger">Yes, delete all my books</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>