<!DOCTYPE html>
<html>
<head>
<title>Form Submit</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: #ccc;">
<div class="container pt-4">
<div class="card">
<div class="card-header">Submit Form Details</div>
<form action="forms" method="post">
<div class="card-body">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleFormControlInput1">Registration Date</label>
<input type="date" required class="form-control" name="date" id="exampleFormControlInput1">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleFormControlSelect1">Company</label>
<select class="form-control" required id="exampleFormControlSelect1" name="company">
<option value="" >--Select Company--</option>
<option value="Company One">Company One</option>
<option value="Company Two">Company Two</option>
<option value="Company Three">Company Three</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleFormControlInput2">Username</label>
<input type="text" name="username[]" required class="form-control" id="exampleFormControlInput2" placeholder="Username">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleFormControlInput222">Password</label>
<input type="password" name="password[]" required class="form-control" id="exampleFormControlInput222" placeholder="******">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleFormControlInput2">Username</label>
<input type="text" name="username[]" required class="form-control" id="exampleFormControlInput2" placeholder="Username">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleFormControlInput222">Password</label>
<input type="password" name="password[]" required class="form-control" id="exampleFormControlInput222" placeholder="******">
</div>
</div>
</div>
</div>
<div class="card-footer">
<div class="text-right">
<button class="btn btn-success" type="submit">Submit Details</button>
</div>
</div>
</form>
</div>
</div>
</body>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</html>
<!-- -->