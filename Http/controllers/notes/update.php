<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$note = $db->query("select * from notes where id = :id", [':id' => $_GET['id']])->findOrFail();

$errors = [];

if (! Validator::string($_POST['body'], 1, 500)) {
    $errors['body'] = 'A body of no more than 500 characters is required.';
}

if (! empty($errors)) {
    return view('notes/edit', [
        'heading' => 'Update note',
        'errors' => $errors,
        'note' => $note
    ]);
}

if (empty($errors)) {
    $db->query('UPDATE notes SET body = :body WHERE id = :id;', [
        'body' => $_POST['body'],
        'id' => $_GET['id']
    ]);

    redirect("location: /note?id={$_GET['id']}");
}

