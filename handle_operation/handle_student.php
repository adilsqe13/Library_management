<?php
include "../database/db.php";

if (isset($_POST["register"])) {
    $full_name = $_POST["full_name"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];

    if ($full_name !== '' && $mobile !== '' &&  $address !== '') {
        $sql = "INSERT INTO  students (full_name, mobile, address, status, added_date)
        VALUES ('$full_name', '$mobile', '$address', 1, CURDATE())";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../components/student_add.php?msg=Success: New student has been added");
            exit;
        } else {
            header("Location: ../components/student_add.php?msg=Error: student has not been added, try again");
        }
    }else{
        header("Location: ../components/student_add.php?msg=Error: Please fill all the fields!");
    }
}



$conn->close();
