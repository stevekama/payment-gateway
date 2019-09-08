<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="ie=edge" http-equiv="X-UA-Compatible">
	<title>Applications Manager</title>
	<link href="jquery-ui-css" rel="stylesheet">
	<link href="bootstrap.min.css" rel="stylesheet">
	<script src="jquery.min.js">
	</script>
	<script src="jquery-ui.js">
	</script>
</head><?php 
    require_once('../models/initialization.php'); 
    require_once('layouts/systems/header.php');
    require_once('../models/apps.php')
?>
<div class="container" style="margin-top: 30px">
    <div id="tableManager" class="modal fade">
        <div class="model-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Application Details</h2>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="App Name" id="AppName"><br>
                    <textarea class="form-control" id="PaymentMethod" placeholder="Mpesa/Paypal"></textarea><br>
                    <textarea class="form-control" id="AccessToken" placeholder="Access Token"></textarea><br>
                    <textarea class="form-control" id="AccessToken" placeholder="App Key"></textarea><br>
                </div>
                <div class="modal-footer">
                    <input type="button" value="save" onclick="manageData('addNew')" class="btn btn-success">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2> Application Table manager</h2>
            <input style="float: right" type="button" class="btn btn-success" id="addNew" value="Add New">
            <br><br>
            <table class="table table-hover table-bordered">
                <thead>
                <td>ID</td>
                <td>App Name</td>
                <td>Payment Method</td>
                <td>App Key</td>
                <td>Access Token</td>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#addNew").on('click', function(){
            $("#tableManager").modal('show');
        });
    });
    function manageData(key){
        var AppName = $("#AppName");
        var PaymentMethod = $("#PaymentMethod");
        var AccessToken = $("#AccessToken");



    }
</script>
	</section><?php require_once('layouts/systems/footer.php'); ?>
</body>
</html>