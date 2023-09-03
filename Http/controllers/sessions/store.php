<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (! $form->validate($email, $password)) {
    return view('session/create', [
        'errors' => $form->errors()
    ]);
}

$auth = new Authenticator;

if ($auth->attempt($email, $password)) {
    redirect('/');
} 

return view('sessions/create', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);