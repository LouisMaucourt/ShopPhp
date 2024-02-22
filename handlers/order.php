<?php
require_once(dirname(__FILE__) . '/../bdd/migration.php');

function getOrderDetails($userId, $dbh) {
    $rows = array();

    $query = "SELECT * FROM `order` WHERE user_id = :user_id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $row;
        }
    } else {
        $dbh->errorInfo();
    }
    return array_reverse($rows);
}
?>
