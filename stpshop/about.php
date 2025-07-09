<?php 
require("php/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>

    <!-- Bootstrap / Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php require("element/nav.php"); ?>

<div class="container py-5">
    <h2 class="text-center mb-4">About Us</h2>

    <p class="lead">
        STPShop is a modern e-commerce website designed to help students and developers learn how online stores work.
        It allows users to explore essential features of an online shop, including product listings, a shopping cart, 
        checkout process, and contact form — all built using PHP, MySQL, and Bootstrap.
        The platform is ideal for educational use, project development, or practice with full-stack web technologies.
    </p>

    <h3 class="mt-5">What makes us different?</h3>
    <ul>
        <li>🔥 <strong>Performance‑first</strong> PHP & MySQL implementation</li>
        <li>🎯 Clean, component‑driven Bootstrap 5 UI</li>
        <li>🔐 Secure practices: prepared statements, CSRF tokens, hashed passwords</li>
        <li>📚 Open source—fork it, break it, improve it!</li>
    </ul>
</div>

<?php require("element/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
