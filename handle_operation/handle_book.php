<?php
include "../database/db.php";

// Add Book Logic
if (isset($_POST["add_book"])) {
    $book_name = $_POST["book_name"];
    $author_name = $_POST["author_name"];
    $category = $_POST["category"];
    $total_stock = $_POST["total_stock"];

    if ($book_name !== '' && $author_name !== '' &&  $category !== '' &&  $total_stock !== '') {
        $sql = "INSERT INTO books (book_name, author_name, category, total_stock, added_date)
        VALUES ('$book_name', '$author_name', '$category', '$total_stock', CURRENT_TIMESTAMP)";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../components/book_add.php?msg=New book has been added");
            exit;
        } else {
            header("Location: ../components/book_add.php?msg=Error: Book not been added, try again");
        }
    } else {
        header("Location: ../components/book_add.php?msg=Error: Please fill all the fields!");
    }
}

// Borrow Book Logic
if (isset($_POST["borrow_book"])) {
    $student_id = $_POST["select_candidate"];
    $book_id = $_POST["select_book"];

    if ($student_id && $book_id) {
        $sql = "INSERT INTO open_records (student_id, book_id, added_date, due_date) 
    VALUES ('$student_id', '$book_id', CURRENT_TIMESTAMP, DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 7 DAY))";

       

        if ($conn->query($sql) === TRUE) {
            header("Location: ../components/open_records.php?msg=Success: Book issued successfully");
            exit;
        } else {
            header("Location: ../components/open_records.php?msg=Error: Book not issued, try again");
        }
    } else {
        header("location: ../components/open_records.php?msg=Error: Please select options!");
    }
}


// Return Book Logic
if (isset($_POST['return_book'])) {
    $open_record_id =  $_POST['open_record_id'];
    $sql = "UPDATE open_records SET returned_date = CURRENT_TIMESTAMP, status = 0 WHERE id = $open_record_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../components/open_records.php?msg=Success: Book returned successfully");
        exit;
    } else {
        header("Location: ../components/open_records.php?msg=Error: Book not returned, try again");
    }
}


// Pay Fine Logic
if (isset($_POST['pay_fine'])) {
    $open_record_id =  $_POST['open_record_id'];
    $query = "SELECT due_date FROM open_records WHERE id = $open_record_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $currentDate = new DateTime();
    $due_date = new DateTime($row['due_date']);
    $interval = $due_date->diff($currentDate);
    $differenceInDays = $interval->days;

    $sql = "UPDATE open_records SET fine_paid = $differenceInDays, returned_date = CURRENT_TIMESTAMP, status = 0 WHERE id = $open_record_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../components/open_records.php?msg=Success: Fine Paid successfully");
        exit;
    } else {
        header("Location: ../components/open_records.php?msg=Error: Fine not paid, try again");
    }
}


$conn->close();
