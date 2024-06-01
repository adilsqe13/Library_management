<?php
include '../database/db.php';

    $id = $_GET['id'];
    $sql = "UPDATE books SET status = 5 WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../components/book_add.php");
        exit;
    } else {
        header("Location: ../components/book_add.php");
        exit;
    }

?>
