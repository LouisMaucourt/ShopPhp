<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "Utilisateur connecté";
} else {
    echo "Utilisateur non connecté.";
}
require_once('handlers/order.php');

try {
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo " <br>Votre chien arrive au galop !";
    }

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        
        $rows = getOrderDetails($userId, $dbh);

        foreach ($rows as $row) {
            echo "<div>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
            echo "<h3>Quantité: " . htmlspecialchars($row['quantity']) . "</h3>";
            echo "<h3>Prix: " . htmlspecialchars($row['price']) . "</h3>";
            echo "<a href='product_detail.php?id=" . htmlspecialchars($row['product_id']) . "'>Voir le dogo</a>";
            echo "</div>";
        }
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} finally {
    $dbh = null;
}
?>
