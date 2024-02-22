<?php
require_once(dirname(__FILE__) . '/../bdd/migration.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id']) && isset($_POST['quantity']) && isset($_POST['image']) && isset($_POST['name'])) {
        try {
            $productId = $_POST['product_id'];
            $userId = $_POST['user_id'];
            $query = "SELECT price FROM product WHERE id = :id";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($product) {
                $totalPrice = $product['price'] * $_POST['quantity'];

                $query ="INSERT INTO `order` (user_id, product_id, image, name, quantity, price) 
                        VALUES (:user_id, :product_id, :image, :name, :quantity, :price)";
                $stmt = $dbh->prepare($query);

                $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
                $stmt->bindParam(':image', $_POST['image']); 
                $stmt->bindParam(':name', $_POST['name']); 
                $stmt->bindParam(':quantity', $_POST['quantity'], PDO::PARAM_INT);
                $stmt->bindParam(':price', $totalPrice, PDO::PARAM_STR);
                $stmt->execute();

                header("Location: /exam/order.php?success=1");
                exit();
            } else {
                echo "Produit non trouvé :'(";
            }
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
} else {
    header("Location: /exam/order.php");
    exit();
}
?>
