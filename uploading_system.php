<?php 

if (isset($_POST['submit']) && isset($_FILES['my_img'])) {
	include "Functions/connect.php";
	
    $img_name = $_FILES['my_img']['name'];
    $tmp_name = $_FILES['my_img']['tmp_name'];
    $error = $_FILES['my_img']['error'];
	$product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    if ($error === 0) {
    	$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

    	$img_ex_lc = strtolower($img_ex);

    	$allowed_exs = array('jpg', 'jpeg', 'png', 'jfif');

    	if (in_array($img_ex_lc, $allowed_exs)) {
    		
    		$new_img_name = uniqid("img-", true). '.'.$img_ex_lc;
    		$img_upload_path = 'uploads/'.$new_img_name;
    		move_uploaded_file($tmp_name, $img_upload_path);

    		// Now let's Insert the images path into database
            
			$sql = "INSERT INTO product_data(image, product_name, price) 
                   VALUES('$new_img_name', '$product_name', '$product_price')";
            mysqli_query($conn, $sql);
            header("Location: admin_index.php");
    	}else {
    		$em = "You can't upload files of this type";
    		header("Location: upload_product_data.php?error=$em");
    	}
    }


}else{
	header("Location: video_index.php");
}