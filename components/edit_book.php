<?php include 'dynamic/header.php'; ?>
<?php include '../database/db.php'; ?>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
}

// Edit book logic
if (isset($_POST['edit_book'])) {
    $book_name = $_POST["book_name"];
    $author_name = $_POST["author_name"];
    $category = $_POST["category"];
    $total_stock = $_POST["total_stock"];

    // Condition check for stock
    $query = "SELECT * FROM open_records WHERE status = 1 AND book_id = $id";
    $result = mysqli_query($conn, $query);
    $stock_use =  mysqli_num_rows($result);
    if ($total_stock < $stock_use) {
        header("Location: edit_book.php?id=$id&msg=Stock input must be greater than or equal to stock in use");
    } else {
        $query = "UPDATE books SET book_name = ?, author_name = ?, category = ?, total_stock = ?, modified_date = CURRENT_TIMESTAMP  WHERE id = ?";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("ssssi", $book_name, $author_name, $category, $total_stock, $id);
            if ($stmt->execute()) {
                header("Location: book_add.php");
                exit;
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<h1 class="text-center mt-5">Edit Book Details</h1>
<div class="container w-50 mt-4">
    <form method="post">
        <div class="mb-3">
            <label class="form-label ">Book Name</label>
            <input type="text" class="form-control" name="book_name" value='<?php echo htmlspecialchars($row["book_name"]) ?>' />
        </div>
        <div class="mb-3">
            <label class="form-label ">Author Name</label>
            <input type="text" class="form-control" name="author_name" value='<?php echo htmlspecialchars($row['author_name']) ?>' />
        </div>
        <div class="mb-3">
            <label class="form-label ">Category</label>
            <input type="text" class="form-control" name="category" value='<?php echo htmlspecialchars($row['category']) ?>' />
        </div>
        <div class="mb-3">
            <label class="form-label ">Stock <span style="color: green;">(<?php
                                                                            $query = "SELECT * FROM open_records WHERE status = 1 AND book_id = $id";
                                                                            $result = mysqli_query($conn, $query);
                                                                            $stock_use =  mysqli_num_rows($result);
                                                                            echo $stock_use . '  In use'
                                                                            ?>)</span></label>
            <input type="number" class="form-control" name="total_stock" value='<?php echo htmlspecialchars($row['total_stock']) ?>' />
        </div>
        <!-- Wrong stock input message -->
        <div style="height: 30px">
            <h6 class="text-danger mt-2" align='left'><?php if (isset($_GET['msg'])) {
                                                            echo $_GET['msg'];
                                                        } ?></h6>
        </div>
        <div class="modal-footer mt-5">
            <div class="row">
                <div class="col-6"><a href="book_add.php" type="button" class="btn btn-secondary">Cancel</a></div>
                <div class="col-6"><input type="submit" name="edit_book" value="Update" class="btn btn-danger"></input></div>
            </div>
        </div>
    </form>
</div>


<?php include 'dynamic/footer.php'; ?>