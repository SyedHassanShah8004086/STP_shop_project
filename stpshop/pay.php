<?php

// in this pay.php we used add card payment method use lecture 60 


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


require('src/Instamojo.php');
$api = new Instamojo\Instamojo('f934b4f17f0717ead438281185a9d9af', '76b2fba8e0d3a69b3297f2bc0e7ae15a', 'https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "FIFA 16",
        "amount" => "3499",
        "send_email" => true,
        "email" => "foo@example.com",
        "redirect_url" => "http://localhost/stpshop/php/receive_order.php?p_id="
        ));
    print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}






?>