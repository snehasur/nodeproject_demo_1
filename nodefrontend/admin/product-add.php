<!DOCTYPE html>
<html>
<head>
  <title>Product Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
  <section class="panel panel-default">
<div class="panel-heading"> 
<h3 class="panel-title">Product Add</h3> 
</div> 
<div class="panel-body">
  
<form action="designer-finish.html" class="form-horizontal" role="form">


   <div class="form-group">
    <label for="name" class="col-sm-3 control-label">Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name" id="name" placeholder="">
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="price" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-9">
      <input type="tel" class="form-control" name="price" id="price" placeholder="">
    </div>
  </div> <!-- form-group // -->
  
  <div class="form-group">
    <label for="about" class="col-sm-3 control-label">Description</label>
    <div class="col-sm-9">
      <textarea class="form-control"></textarea>
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="name" class="col-sm-3 control-label">Image</label>
    <div class="col-sm-3">
      <label class="control-label small" for="file_img"></label> <input type="file" name="file_img">
    </div>
	</div> <!-- form-group // -->
  <hr>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div> <!-- form-group // -->
</form>
  
</div><!-- panel-body // -->
</section><!-- panel// -->

  
</div> <!-- container// -->
</body>
</html>
