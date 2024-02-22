<?php
require_once(dirname(__FILE__) . '/../bdd/migration.php');

function getProducts($dbh) {
    $rows = array();
    $query = "SELECT * FROM product";
    $stmt = $dbh->query($query);
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $row;
        }
    } else {
        $dbh->errorInfo();
    }
    return $rows;
}
?>
