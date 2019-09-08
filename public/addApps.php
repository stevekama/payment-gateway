<?php require_once('../models/initialization.php');
require_once('layouts/systems/header.php'); ?>
<br>
    <form style="margin-left: 30px" id="appReg" method="post">
        <div class="form-group">
            <label >Application Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter App Name">
            <small id="emailHelp" class="form-text text-muted">Make sure name is unique</small>
        </div>
        <div class="form-group">
            <label>Payment Method</label>
            <input type="text" class="form-control" id="method" placeholder="Mpesa/Papal">
        </div>
        <div class="form-group">
            <label>Key</label>
            <input type="text" class="form-control" id="key" placeholder="key">
        </div>
        <div class="form-group">
            <label>Secret</label>
            <input type="text" class="form-control" id="secret" placeholder="secret">
        </div>

        <button type="submit" class="btn btn-primary" id="regApp">Submit</button>
    </form>
<?php require_once('layouts/systems/footer.php'); ?>