<?php

namespace Itb;

require_once __DIR__ . '/../src/Database.php';

$db = new Database();

$username = $db->getUsername();

echo($username);