<?php 
require("php/db.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Search Results</title>

  <!-- Bootstrap / Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php require("element/nav.php"); ?>

<div class="container mt-5">

<?php
if (isset($_GET['query']) && !empty(trim($_GET['query']))) {
    $search = $db->real_escape_string($_GET['query']);

    echo "<h3>Search results for '<b>" . htmlspecialchars($search) . "</b>':</h3><hr>";

    $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%'";
    $result = $db->query($sql);

    if ($result && $result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="col-md-4 mb-4">
              <a href="product-details/' . $row['id'] . '" class="text-decoration-none text-dark">
              <div class="card h-100 shadow-sm">
                <img src="product_pic/' . htmlspecialchars($row['product_pic']) . '" 
                     class="card-img-top" 
                     alt="Product Image" 
                     style="height: 250px; object-fit: cover;"
                     onerror="this.onerror=null;this.src=\'images/default.png\';">
                <div class="card-body">
                  <h5 class="card-title">'. htmlspecialchars($row['product_name']) .'</h5>
                  <p class="card-text">'. htmlspecialchars($row['product_description']) .'</p>
                  <p class="fw-bold text-success">Rs. '. htmlspecialchars($row['product_amount']) .'</p>
                </div>
              </div>
              </a>
            </div>';
        }
        echo '</div>';
    } else {
        echo "<p class='text-muted'>No products found matching your search.</p>";
    }
} else {
    echo "<p class='text-danger'>Please enter a valid search term.</p>";
}
?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
