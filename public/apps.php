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
?>
<div class="container" style="margin-top: 30px">
    <div id="tableManager" class="modal fade">

    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2> Application Table manager</h2>

            <a href="<?php echo base_url(); ?>public/addApps.php" class="btn btn-primary" role="button" aria-disabled="true">Add New</a>


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


    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    $(document).ready(function(){
        //App form submission
        $('#addApp').submit(function(event){
            event.preventDefault();
            let form_data = $(this).serialize();
            $.ajax({
                url        : base_url+'api/app/register_app.php',
                type       : 'POST',
                data       : form_data,
                dataType   : 'json',
                beforeSend : function(){
                    $('#addNew').html('Loading...');
                },
                success    : function(data){
                    $('#addNew').html('save');
                    if(data.message == 'success'){
                        window.location.href = base_url+'public/index.php';
                    }
                    if(data.message == 'failed'){
                        $('#messageAlert').html('');
                    }
                }
            });
        });});

</script>
	</section><?php require_once('layouts/systems/footer.php'); ?>
</body>
</html>