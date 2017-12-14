<?php

namespace Itb;

require_once __DIR__ . '/../src/Database.php';

$db = new Database();

$db->createTableProducts();

$db->insertProduct('White', 29.99, 'img/tshirt-04.png');
$db->insertProduct('Red', 59.99, 'img/hoodie-03.png');
$db->insertProduct('Black', 29.99, 'img/hat-02.png');

$db->insertUser('John Jones', 'johnnybones@gmail.com', '085 14 47849');
$db->insertUser('Max Holloway', 'blessed@gmail.com', '086 27 84114');
$db->insertUser('Francis Ngannou', 'thenewking@aol.com', '089 44 11479');

echo('Database initialised');