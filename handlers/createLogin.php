<?php
require_once(dirname(__FILE__) . '/../bdd/migration.php');
require_once(dirname(__FILE__) . '/../models/Login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        try {
            $newLogin = new Login();
            $newLogin->setEmail(filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $newLogin->setPassword($hashedPassword);

            $dbh->exec("INSERT INTO login (email, password) 
                VALUES ('" . $newLogin->getEmail() . "', '" . $newLogin->getPassword() . "')");

            header("Location: /exam/index.php?success=1");
            exit();
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
} else {
    header("Location: /exam/index.php");
    exit();
}
?>