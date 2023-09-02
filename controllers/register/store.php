<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (! Validator::string($password, 8, 255)) {
    $errors['password'] = 'Password has to have a minimun of 8 characters';
}

if (! empty($errors)) {
    return view('register/create', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
$user = $db->query("select * from users where email = :email", [
    ':email' => $email
])->find();

if ($user) {
    header('location: /');
    die();
} else {
    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        ':email' => $email,
        ':password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    die();
}