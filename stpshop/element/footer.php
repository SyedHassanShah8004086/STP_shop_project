
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>STP Shop</title>

  <!-- Bootstrap (if not already included) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- ✅ Font Awesome CDN -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>



<footer class="w-100 bg-dark px-5 mt-5">

<div class="row pt-4">
    <div class="col-md-4 p-4">
        <label class="fs-5" style="color:#06B0EF; font-weight:500">Contact Info.</label>
    <ul class="p-0 m-0">

<li class="text-white " style="text-decoration:none;list-style:none;font-weight:100">
    admin@stpshop.com
</li>
<li class="text-white " style="text-decoration:none;list-style:none;font-weight:100">
    contact@stpshop.com
</li>
<li class="text-white " style="text-decoration:none;list-style:none;font-weight:100">
    +92 3488004086
</li>
<li class="text-white " style="text-decoration:none;list-style:none;font-weight:100">
    Skardu New Bazar near shaheen ground
        </li>
    </ul>
    </div>

<div class="col-md-4 p-4">
    <label class="fs-5" style="color:#06B0EF; font-weight:500">Useful Links</label>
<ul class="p-0 m-0">
<?php
$cat_data_sql=$db->query("SELECT * FROM category");
while($cat_data=$cat_data_sql->fetch_assoc()){
    echo'
    <li>
    <a class="text-white" style="text-decoration:none;list-style:none;;font-weight:100" href="product.php?product_category='.$cat_data['category_url'].'">'.$cat_data['category_name'].'</a>
    </li>
    ';
}

?>
</ul>
</div>

<div class="col-md-4 p-4">
<label class="fs-5" style="color:#06B0EF; font-weight: 500;">Follow Us</label>
<br>
<i class="fab fa-facebook text-white fs-5"></i>
<i class="fab fa-twitter text-white fs-5"></i>
<i class="fab fa-youtube text-white fs-5"></i>
<i class="fab fa-instagram text-white fs-5"></i>
<br>
<label class="fs-5" style="color:#06B0EF;font-weight:500">Other Links</label>
<ul class="p-0 m-0">

<li class="text-white" style="text-decoration:none;list-style:none; font-weight: 100;">
    Terms & Conditions
</li>
<li class="text-white" style="text-decoration:none;list-style:none; font-weight: 100;">
    Privacy Policy
</li>
</ul>
</div>


</div>
<hr style="background-color:white;width:100%">
<p class="text-white m-0 pb-4 text-center" style="text-decoration:none; list-style:none;font-weight:100">
   Design & Developed By: Shah Saab 
</p>

</footer>