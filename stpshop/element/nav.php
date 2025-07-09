<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar with Search</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .nav-link {
      font-weight: bold !important;
    }
    .hover-green:hover {
      color: #198754 !important;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand ms-3" href="#">
      <img src="http://localhost/stpshop/images/logo.png" width="100" alt="stp_shop">
      
      <?php
      require("php/db.php");
      if (!empty($_COOKIE['_aut_ui_'])) {
        $user_email = base64_decode($_COOKIE['_aut_ui_']);  
        $get_data = $db->query("SELECT fullname FROM register WHERE email='$user_email'");
        $aa = $get_data->fetch_assoc();
        echo " | " . $aa['fullname'];
      }
      ?>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item me-4">
          <a class="nav-link active hover-green" href="http://localhost/stpshop">Home</a>
        </li>

        <?php
        $cat_data_sql = $db->query("SELECT * FROM category");
        while ($cat_data = $cat_data_sql->fetch_assoc()) {
          echo '
          <li class="nav-item me-4">
            <a class="nav-link hover-green" href="http://localhost/stpshop/category/' . $cat_data['category_url'] . '">' . $cat_data['category_name'] . '</a>
          </li>
          ';
        }
        ?>

        <li class="nav-item dropdown me-4">
          <a class="nav-link dropdown-toggle hover-green" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
            if (empty($_COOKIE['_aut_ui_'])) {
              echo '
                <li><a class="dropdown-item" href="login.php">Log in</a></li>
                <li><a class="dropdown-item" href="register.php">Register</a></li>
              ';
            } else {
              echo '
                <li><a class="dropdown-item" href="#">My Orders</a></li>
                <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
              ';
            }
            ?>
          </ul>
        </li>

        <li class="nav-item me-4">
          <a class="nav-link hover-green" href="http://localhost/stpshop/about.php">About Us</a>
        </li>

        <li class="nav-item me-4">
          <a class="nav-link hover-green" href="http://localhost/stpshop/contact.php">Contact Us</a>
        </li>
      </ul>

      <!-- Search Bar -->
      <form class="d-flex" method="GET" action="search.php">
        <input class="form-control me-2" type="search" name="query" placeholder="Search products..." aria-label="Search" required>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Bootstrap 5 JS (Popper + Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
