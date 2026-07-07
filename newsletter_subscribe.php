<?php

$conn = mysqli_connect("localhost","root","","royal_cafe_db");

if(!$conn){
    die("Database Failed");
}

$email = $_POST['email'];

$email = filter_var(
    $email,
    FILTER_SANITIZE_EMAIL
);

if(!filter_var(
    $email,
    FILTER_VALIDATE_EMAIL
)){
    echo "❌ Invalid Email";
    exit;
}

$check = mysqli_query(
$conn,
"SELECT * FROM newsletter_subscribers
WHERE email='$email'"
);

if(mysqli_num_rows($check) > 0){

    echo "⚠ Already Subscribed";
    exit;
}

$query = mysqli_query(
$conn,
"INSERT INTO newsletter_subscribers(email)
VALUES('$email')"
);

if($query){

    echo "🎉 Subscription Successful";

}else{

    echo "❌ Database Error";

}

?>