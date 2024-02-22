<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "Utilisateur connecté";
} else {
    echo "Utilisateur non connecté.";
}
require_once('handlers/shop.php');

try {
    $rows = getProducts($dbh);

    foreach ($rows as $row) {
        echo "<div>";
        echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "' style='max-width: 200px;'>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<a href='product_detail.php?id=" . $row['id'] . "'> Whaouf";
        echo "</a>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} finally {
    $dbh = null;
}
?>
