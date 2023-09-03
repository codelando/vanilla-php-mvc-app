<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;
$auth = new Authenticator;

if ( $form->validate($email, $password)) {   
    if ($auth->attempt($email, $password)) {
        redirect('/');
    }
    
    $form->error('email', 'No matching account found for that email address and password.');
}

return view('session/create', [
    'errors' => $form->errors()
]);