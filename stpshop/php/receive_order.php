<?php 

require("db.php");

$p_id=$_GET['p_id'];
$pro_sql=$db->query("SELECT * FROM product WHERE id='$p_id'");

$aa=$pro_sql->fetch_assoc();

$product_name=$aa['product_name'];
$product_amount=$aa['product_amount'];
$product_qty=$_GET['p_qty'];
$tp_amount=$product_qty*$product_amount;


$user_email=base64_decode($_COOKIE['_aut_ui_']);
$user_response=$db->query("SELECT * FROM register WHERE email='$user_email'");
$user_aa=$user_response->fetch_assoc();

$c_name=$user_aa['fullname'];
$c_mobile=$user_aa['mobile'];
$c_address=$user_aa['address'];

$p_mode=$_GET['p_mode'];


$check=$db->query("SELECT * FROM receive_order");

if($check){

 $store=$db->query("INSERT INTO receive_order(
    p_name,p_amount,tp_amount,p_qty,c_name,c_mobile,c_email,c_address,payment_mode
    )VALUES(
 '$product_name','$product_amount','$product_qty','$tp_amount','$c_name',' $c_mobile','$user_email','$c_address','$p_mode'
    )");


if($store){
    echo"success";
}
else{
     echo "failed: " . $db->error;
}


}
else{

$create_table=$db->query("CREATE TABLE receive_order(
 id INT(11) NOT NULL AUTO_INCREMENT,
 p_name VARCHAR(255),
 p_amount VARCHAR(255),
 tp_amount VARCHAR(255),
 p_qty VARCHAR(255),
 c_name VARCHAR(255),
 c_mobile VARCHAR(255),
 c_email VARCHAR(255),
 c_address VARCHAR(255),
 payment_mode VARCHAR(255),
 payment_status VARCHAR(255) DEFAULT 'pending',
 order_status VARCHAR(255) DEFAULT 'pending',
 PRIMARY KEY(id)

)");

if($create_table){

    $store=$db->query("INSERT INTO receive_order(
    p_name,p_amount,tp_amount,p_qty,c_name,c_mobile,c_email,c_address,payment_mode
    )VALUES(
    '$product_name','$product_amount','$product_qty','$tp_amount','$c_name',' $c_mobile','$user_email','$c_address','$p_mode'
    )");

if($store){
    echo"success";
}
else{
    echo"failed";
}

}
else{

    echo"table not creatd";

}

}


?>