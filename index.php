<?php
require_once "Database.php";
$config = require "config.php";

$db = new Database($config["database"]);

$sql_query = "SELECT * FROM posts";
$params = []; // <--- jādefinē pirms if

if (isset($_GET["search_query"]) && trim($_GET["search_query"]) != "") {
    $sql_query .= " WHERE content LIKE :search";  
    $params["search"] = "%" . $_GET["search_query"] . "%";
}

$posts = $db->query($sql_query, $params)->fetchAll(PDO::FETCH_ASSOC);

echo "<h1>Emuārs</h1>";

echo "<form>";
echo "<input name='search_query' placeholder='Meklēt ierakstus' />";
echo "<button>Meklēt</button>";
echo "</form>";

echo "<ul>";
foreach ($posts as $post) {
    echo "<li>" . htmlspecialchars($post["content"]) . "</li>";
}
echo "</ul>";

