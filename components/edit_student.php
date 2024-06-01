<?php include 'dynamic/header.php'; ?>
<?php include '../database/db.php'; ?>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
}

// Edit Student logic
if(isset($_POST['edit_student'])){
    $full_name = $_POST["full_name"];
    $mobile= $_POST["mobile"];
    $address = $_POST["address"];
    $currentDate = new DateTime(date('Y-m-d'));

    $query = "UPDATE students SET full_name = ?, mobile = ?, address = ?, modified_date = CURDATE()  WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sssi", $full_name, $mobile, $address, $id);
        if ($stmt->execute()) {
            header("Location: student_add.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h1 class="text-center mt-5">Edit Student Details</h1>
<div class="container w-50 mt-4">
    <form  method="post">
        <div class="mb-3">
            <label class="form-label ">Full Name</label>
            <input type="text" class="form-control" name="full_name" value='<?php echo htmlspecialchars($row["full_name"]) ?>' />
        </div>
        <div class="mb-3">
            <label class="form-label ">Mobile</label>
            <input type="tel" class="form-control" name="mobile" value='<?php echo htmlspecialchars($row['mobile']) ?>' />
        </div>
        <div class="mb-3">
            <label class="form-label ">Address</label>
            <input type="text" class="form-control" name="address" value='<?php echo htmlspecialchars($row['address']) ?>' />
        </div>
        
        <div class="modal-footer mt-5">
            <div class="row">
                <div class="col-6"><a href="student_add.php" type="button" class="btn btn-secondary">Cancel</a></div>
                <div class="col-6"><input type="submit" name="edit_student" value="Update" class="btn btn-danger"></input></div>
            </div>
        </div>
    </form>
</div>


<?php include 'dynamic/footer.php'; ?>