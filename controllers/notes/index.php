<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

$notes = $db->query("select * from notes where user_id = :id", [':id' => $currentUserId])->findAll();


view('notes/index', [
    'heading' => 'My notes',
    'notes' => $notes
]);