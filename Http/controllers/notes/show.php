<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$note = $db->query("select * from notes where id = :id", [':id' => $_GET['id']])->findOrFail();

$currentUserId = 6;

authorize($note['user_id'] === $currentUserId);

view('notes/show', [
    'heading' => 'Note detail',
    'note' => $note
]);
