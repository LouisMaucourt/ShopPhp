<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Détails du produit</title>
    </head>
    <body>
        <header>
            <ul>
                <li><a href="order.php">Votre chenille</a></li>
                <li><a href="shop.php">"Shop"</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </header>
        <h1>chien bien </h1>
        <?php
            require_once('parts/product_details.php');
            require_once('form/order.php');
        ?>
    

</body>

</html>