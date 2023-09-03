<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$note = $db->query("select * from notes where id = :id", [':id' => $_GET['id']])->findOrFail();

$currentUserId = 2;

authorize($note['user_id'] === $currentUserId);

view('notes/edit', [
    'heading' => 'Update note',
    'note' => $note,
    'errors' => []
]);