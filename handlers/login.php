<?php
require_once(dirname(__FILE__) . '/../bdd/migration.php');
require_once(dirname(__FILE__) . '/../models/Login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        try {
            $inputEmail = $_POST['email'];
            $inputPassword = $_POST['password'];

            $stmt = $dbh->prepare("SELECT * FROM login WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $inputEmail);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($inputPassword, $user['password'])) {

                session_start();

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['login'] = new Login($inputEmail);

                header("Location: /exam/shop.php");
                exit();
            } else {
                echo "Email ou mot de passe incorrect.";
            }

        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
} else {
    header("Location: /exam/index.php");
    exit();
}
?>
