<?php

require("db.php");
$full_name=$_POST['full_name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$address=$_POST['address'];

$cd=date('Y-m-d');

$check = $db->query("SELECT * FROM register");


if($check){

$check_user=$db->query("SELECT * FROM register WHERE email='$email'");

    if($check_user->num_rows!=0){
    echo"user already exists";
}
else{
$store=$db->query("INSERT INTO register(fullname,mobile,email,address,password,date)VALUES('$full_name','$mobile','$email','$address','$password','$cd')");



if($store){
    echo"success";
}
else{
    echo"failed";
}

}

    
}
else{

$create_table = $db->query("CREATE TABLE register(
    id INT(11) NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(255),
    mobile VARCHAR(100),
    email VARCHAR(200),
    address MEDIUMTEXT,
    password VARCHAR(255),
    date DATE,
    PRIMARY KEY(id)
)");


if($create_table){
    $check_user=$db->query("SELECT * FROM register WHERE email='$email'");

    if($check_user->num_rows!=0){
    echo"user already exists";
}
else{
$store=$db->query("INSERT INTO register(fullname,mobile,email,address,password,date)VALUES('$full_name','$mobile','$email','$address','$password','$cd')");

if($store){
    echo"success";
}
else{
    echo"failed";
}

}

}
else{
    echo"table no created";
}
}

?>