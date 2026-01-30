<?php
require_once "Database.php";
$config = require "config.php";

$db = new Database($config["database"]);

$db->query("
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL
)
");

$db->query("
INSERT IGNORE INTO posts (id, content) VALUES
(1, 'Sveiki!'),
(2, 'Šis ir tests.'),
(3, 'Lieldienas tuvojas!'),
(4, 'Yooooo')
");

$db->query("
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(25) NOT NULL
)
");

$db->query("
INSERT IGNORE INTO categories (id, category_name) VALUES
(1, 'Svētki'),
(2, 'Mūzika'),
(3, 'Sports')
");