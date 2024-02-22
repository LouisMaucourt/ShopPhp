<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "Utilisateur connecté";
} else {
    echo "Utilisateur non connecté.";
}
require_once('bdd/migration.php');
require_once('handlers/productDetails.php');
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $product = getProductDetails($dbh, $productId);

    if ($product) {
        echo "<div>";
        echo "<img src='" . $product['image'] . "' alt='" . $product['name'] . "' style='max-width: 400px;'>";
        echo "<h3>" . $product['name'] . "</h3>";
        echo "<p>" . $product['description'] . "</p>";
        echo "<p>Prix : " . $product['price'] . "</p>";
        echo "</div>";
    } else {
        echo "Pas de chien trouvé :'(";
    }
}

$dbh = null;
?>
