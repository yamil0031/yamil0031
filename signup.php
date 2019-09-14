<?php
require 'database.php';

$message= '';

if (!empty($_POST['email']) && !empty($_POST['password'])){
$sql = "INSERT INTRO users (email, password) VALUES (:email, :password)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email',$_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$stmt->bindParam(':password', $password);

if ($stmt->execute()) {
     $message = 'Successfully created new user' ;
    }else {
     $message = 'sorry the must have been an issue creating your accout';
        }
    }
?>
<!DOCTYPE html>
<html
    <head>
    <meta charset="UTF-8">
    <title>SigUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>

<h1>SigUp</h1>
<span>or <a href="login.php">login</a></span>

<form action="signup.php" method="post">
        <input type="text" name="email" placeholder="Enter your mail">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="password" name="confirm_password" placeholder="Confirm your password">
        <input type="submit" value="Send">
</form>


</html>