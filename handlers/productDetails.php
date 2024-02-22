
<?php

function getProductDetails($dbh, $productId) {
    $query = "SELECT * FROM product WHERE id = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

?>
