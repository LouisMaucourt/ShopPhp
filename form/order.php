<form action="/exam/handlers/addToOrder.php" method="post">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    <input type="hidden" name="image" value="<?php echo $product['image']; ?>">
    <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
    <label for="quantity">Quantité</label>
    <input type="number" name="quantity" id="quantity" value="1" required>
    <button type="submit">Ajouter au panier</button>
</form>