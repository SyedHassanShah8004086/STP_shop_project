<?php
require("db.php"); // corrected path

if(isset($_POST['cat_id'])){
  $id = $_POST['cat_id'];
  $delete = $db->query("DELETE FROM category WHERE id='$id'");
  
  if($delete){
    echo "success";
  } else {
    echo "Failed to delete: " . $db->error;
  }
}
?>
