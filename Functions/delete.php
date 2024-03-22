<?php
include "connect.php";
if (isset($_GET['id'])) {
  $sql = "DELETE FROM product_data 
  WHERE id='" . $_GET["id"] . "'";
  if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
      header("Location: admin_index.php");
  } else {
      echo "Error deleting record: " . mysqli_error($conn);
  }
} else {
  echo "No id parameter provided";
}
mysqli_close($conn);
?>