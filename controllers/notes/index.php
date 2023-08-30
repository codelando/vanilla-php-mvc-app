<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 2;

$notes = $db->query("select * from notes where user_id = :id", [':id' => $currentUserId])->findAll();


view('notes/index', [
    'heading' => 'My notes',
    'notes' => $notes
]);