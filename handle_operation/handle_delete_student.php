<?php
include '../database/db.php';

    $id = $_GET['id'];
    $sql = "UPDATE students SET status = 5 WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../components/student_add.php");
        exit;
    } else {
        header("Location: ../components/student_add.php");
        exit;
    }

?>
