<?php

include('config/db.php');

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "POST"){

    // GET DATA
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $rating = trim($_POST['rating']);
    $message = trim($_POST['message']);

    // VALIDATION
    if(empty($name) || empty($email) || empty($rating) || empty($message)){

        echo json_encode([
            "status" => "error",
            "message" => "All fields are required"
        ]);

        exit;
    }

    // EMAIL VALIDATION
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        echo json_encode([
            "status" => "error",
            "message" => "Invalid email address"
        ]);

        exit;
    }

    // PREPARED QUERY
    $stmt = mysqli_prepare($conn,

        "INSERT INTO feedbacks(name,email,rating,message)
         VALUES(?,?,?,?)"

    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssis",
        $name,
        $email,
        $rating,
        $message
    );

    if(mysqli_stmt_execute($stmt)){

        echo json_encode([
            "status" => "success"
        ]);

    }else{

        echo json_encode([
            "status" => "error",
            "message" => "Database error"
        ]);

    }

}
?>