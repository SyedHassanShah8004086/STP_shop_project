<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<title>Document</title>
</head>
<body>
    

<?php
require("php/db.php"); 
require("element/nav.php");

?>

<div class="container p-5">
    <div class="row p-5" style="box-shadow:0px 0px 30px #ccc">
    <h1 class="mb-4">Register with us</h1>  
           <hr> 
        <div class="col-md-6">
           
        <form class="register_frm " enctype="multipart/form-data">

<label class="mb-2">Enter Name</label>
<input type="text" name="full_name" class="form-control mb-3">

<label class="mb-2">Enter Mobile No.</label>
<input type="number" name="mobile" class="form-control mb-3">

<label class="mb-2">Enter Email Id</label>
<input type="email" name="email" class="form-control mb-3">

    <label class="mb-2">Address</label>
    <textarea rows="4" class="form-control address mb-3" name="address"></textarea>

<label class="mb-2">Enter Password</label>
<input type="password" name="password" class="form-control mb-3">

<button type="submit" class="btn btn-primary r_btn">Register Now</button>
   </form>
<div class="msg"></div>

        </div>
        <div class="col-md-6"></div>
    </div>
</div>

<?php
require("element/footer.php");
?>
<script>

$(document).ready(function(){
$(".register_frm").submit(function(e){
    e.preventDefault();
    $.ajax({
 type:"POST",
 url:"php/new_user.php",
 data:new FormData(this),
processData:false,
contentType:false,
beforeSend:function(){
$(".r_btn").html("Please Wait...");
$(".r-btn").attr("disabled","disabled");
},
success:function(response){
    $(".r_btn").html("Register Now");
$(".r_btn").attr("disabled", true);
if(response.trim()=="success"){

    var div=document.createElement("DIV");
    $(div).addClass("alert alert-success mt-3");
    $(div).html("Registration Successfull ")
$(".msg").html(div);

setTimeout(function(){
    $(".msg").html("");
},2500);
}
else{

 var div=document.createElement("DIV");
    $(div).addClass("alert alert-danger mt-3");
    $(div).html(response);
$(".msg").html(div);

setTimeout(function(){
    $(".msg").html("");
},2500);

}
}

 })

   })
})

</script>

</body>
</html>