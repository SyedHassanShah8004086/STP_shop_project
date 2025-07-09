<?php
/* adjust the path so it actually finds db.php */
require("db.php");   // ← change to the real relative path

if (isset($_POST['pro_id'])) {
    $id = intval($_POST['pro_id']);

    /* optional: fetch picture name first so you can unlink() it */
    $row = $db->query("SELECT product_pic FROM product WHERE id=$id")->fetch_assoc();
    $pic = $row['product_pic'];

    $deleted = $db->query("DELETE FROM product WHERE id=$id");

    if ($deleted) {
        // also delete image file if it exists
        $imgPath = "../../product_pic/" . $pic;           // adjust path if different
        if (is_file($imgPath)) unlink($imgPath);

        echo "success";
    } else {
        echo "db_error: " . $db->error;
    }
} else {
    echo "no_id";
}
?>
