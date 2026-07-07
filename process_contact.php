<?php

session_start();
include('config/db.php');

/* =========================
   CSRF CHECK
========================= */

if (
    !isset($_POST['csrf_token']) ||
    $_POST['csrf_token'] !== $_SESSION['csrf_token']
) {
    die("Invalid CSRF Token");
}

/* =========================
   GET FORM DATA
========================= */

$name    = trim($_POST['name']);
$email   = trim($_POST['email']);
$phone   = trim($_POST['phone']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);

/* =========================
   VALIDATION
========================= */

if (
    empty($name) ||
    empty($email) ||
    empty($subject) ||
    empty($message)
) {
    die("Please fill all required fields.");
}

/* EMAIL VALIDATION */

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid Email Address");
}

/* =========================
   INSERT QUERY
========================= */

$stmt = mysqli_prepare($conn,
"
INSERT INTO contact_messages
(
    full_name,
    email,
    phone,
    subject,
    message
)
VALUES
(
    ?, ?, ?, ?, ?
)
");

/* BIND */

mysqli_stmt_bind_param(
    $stmt,
    "sssss",
    $name,
    $email,
    $phone,
    $subject,
    $message
);

/* EXECUTE */

if(mysqli_stmt_execute($stmt)){

    $_SESSION['success'] =
    "Message Sent Successfully!";

    header("Location: contact.php");
    exit;

}else{

    echo "Database Error.";

}
?>