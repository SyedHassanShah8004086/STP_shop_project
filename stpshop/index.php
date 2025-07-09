

<?php
require("php/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
<title>Document</title>
  

</head>

<body>
    
<?php

require("element/nav.php");

?>

 <!-- new carousel stat -->
 <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 1100px; height: 500px; margin:auto; padding:10px">
  <div class="carousel-inner" style="height: 400px;">
    <div class="carousel-item active" style="height: 400px;">
      <img src="images/aa.jpg" class="d-block w-100" style="height: 100%; object-fit: cover;" alt="aa.jpg">
    </div>
    <div class="carousel-item" style="height: 400px;">
      <img src="images/bb.jpg" class="d-block w-100" style="height: 100%; object-fit: cover;" alt="bb.jpg">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


  <!-- new carousel End -->
 
 


<div class="container">

  
  <?php
$cat_data_sql=$db->query("SELECT * FROM category");

  while($cat_data=$cat_data_sql->fetch_assoc()){

$cat=$cat_data['category_url'];
$cat_name=$cat_data['category_name'];
   
  $product_sql=$db->query("SELECT * FROM product WHERE category='$cat' ORDER BY id DESC LIMIT 4");
   
    echo'<div class="row">
    <h1 class="my-5 text-center mt-0">'.$cat_name.'</h1>
    ';
    while($pro_data=$product_sql->fetch_assoc()){
      
      echo '
      
      <div class="col-md-3">
   <a href="http://localhost/stpshop/product-details/'.$pro_data['id'].'">
      <div class="card rounded-0">
      <img src="http://localhost/stpshop/product_pic/'.$pro_data['product_pic'].'" class="w-100">
      <div class="card-body rounded-0" style="background-color:#e5e5e5;">
      <label class="fs-6 text-dark">'.$pro_data['product_name'].'</label><br>
     
      <label class="fs-5 text-dark">&#8360; '.$pro_data['product_amount'].'</label>


      </div>
      </div>
      </a>
      </div>
      
      ';
    }
echo'</div>';
}
  
  ?>
</div>
<?php
require("element/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
