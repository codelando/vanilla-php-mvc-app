<?php

$config = require "config.php";
$db = new Database($config['database']);

$currentUserId = 2;

$notes = $db->query("select * from notes where user_id = :id", [':id' => $currentUserId])->findAll();

$heading = "Notes";

require "views/notes/index.view.php";