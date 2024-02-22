<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <style>
        body {
            margin: 20px;
        }
        div {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        img {
            max-width: 100px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <header>
        <ul>
            <li><a href="order.php">Votre chenille</a></li>
            <li><a href="shop.php">"Shop"</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </header>
    
    <h1>Votre chenille !</h1>

    <?php
    require_once('parts/order.php');
    ?>
</body>

</html>
