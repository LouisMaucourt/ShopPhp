<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Connexion</title>
        </head>
        <body>
            <h1>Création de compte</h1>
            <?php require "parts/creation.php";
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                    echo "Votre compte a bien été créé :)";
                }
                ?>
            <h1>Connexion</h1>
            <?php require "parts/login.php" ?>
        </body>
        </html>