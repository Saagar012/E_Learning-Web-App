<?php 
require("inc/db1.php");

if (isset($_GET['id'])) {
    // Delete record
    try {
        // SQL Statement
        $sql = 'DELETE FROM courses WHERE c_id = :id LIMIT 1';
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: dashboard.php?status=deleted");
            exit();
        }
        header("Location: dashboard.php?status=fail_delete");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    // Redirect to index.php
    header("Location: dashboard.php?status=fail_delete");
    exit();
}