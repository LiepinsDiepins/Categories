<?php
require_once "Database.php";
$config = require "config.php";

$db = new Database($config["database"]);

// Noklusējuma SQL – atlasa visas kategorijas
$sql_query = "SELECT * FROM categories";
$params = [];

// Ja lietotājs meklē kategorijas
if(isset($_GET["search"]) && trim($_GET["search"]) != "") {
    $sql_query .= " WHERE category_name LIKE :search";
    $params["search"] = "%" . $_GET["search"] . "%";
}

// Droša izpilde
$categories = $db->query($sql_query, $params)->fetchAll(PDO::FETCH_ASSOC);

echo "<h1>Kategorijas</h1>";

echo "<form>";
echo "<input name='search' placeholder='Meklēt kategorijas' />";
echo "<button>Meklēt</button>";
echo "</form>";

echo "<ul>";
foreach($categories as $category){
    echo "<li>" . htmlspecialchars($category["category_name"]) . "</li>";
}
echo "</ul>";
