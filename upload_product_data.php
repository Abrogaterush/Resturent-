<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>video upload php and mysql</title>
</head>
<body>

<?php include ("Partials/header.php"); ?>

<div class="upload">

	  <a href="admin_index.php">Product List</a>

	      <?php if (isset($_GET['error'])) {  ?>
		<p><?=$_GET['error']?></p>
	      <?php } ?>

	    <form action="uploading_system.php"
	       method="post"
	       enctype="multipart/form-data">

	 	<input type="file" name="my_img" required>
			   <br>
		<input type="text" class="upload_input" name="product_name" placeholder="Enter Product Name" required>
               <br>
        <input type="text" class="upload_input" name="product_price" placeholder="Enter Product Price" required>
               <br>
	 	<input type="submit" class="upload_input" name="submit" value="Upload">
	 </form>

</div>

</body>
</html>