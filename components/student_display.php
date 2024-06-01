<script>
    function confirmDelete(studentId) {
        if (confirm("Do you want to delete this student ?")) {
            window.location.href = '../handle_operation/handle_delete_student.php?id=' + studentId;
        }
    }
</script>

<div class="opact-90 margin-top-32">
    <table class="table table-bordered">
        <thead>
            <tr class="table table-dark">
                <th class="text-warning">ID</th>
                <th class="text-warning fs-6">NAME</th>
                <th class="text-warning fs-6">MOBILE</th>
                <th class="text-warning fs-6">ADDRESS</th>
                <th class="text-warning fs-6">Borrowed Books</th>
                <th>
                    <div class="row">
                        <div class="col dfjcac">
                            <span class="text-warning fs-6">ACTION</span>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../database/db.php';
            $query = "SELECT * FROM students WHERE status = 1";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $new_row = [];
                while ($rows = mysqli_fetch_assoc($result)) {
                    $new_row[] = array_reverse($rows);
                }
                $reversedRows = array_reverse($new_row);
                foreach ($reversedRows as $row) {
            ?>
                    <tr>
                        <td class="bold"><?php echo $row['id'] ?></td>
                        <td class='bold'><?php echo $row['full_name'] ?></td>
                        <td class='bold'><?php echo $row['mobile'] ?></td>
                        <td class='bold'><?php echo $row['address'] ?></td>
                        <td class='bold'><?php
                                            $id = $row['id'];
                                            $query = "SELECT * FROM open_records WHERE status = 1 AND student_id = $id";
                                            $result = mysqli_query($conn, $query);
                                            echo mysqli_num_rows($result);
                                            ?></td>
                        <td>
                            <div class="row">
                                <div class="col-6 dfjeac">
                                    <a href='edit_student.php?id=<?php echo $row['id'] ?>' class="btn btn-info">
                                        <?php include 'icons/edit_icon.php'; ?>
                                    </a>
                                </div>
                                <div class="col-6 dfjsac">
                                    <?php
                                    if (mysqli_num_rows($result) === 0) {
                                    ?>
                                        <button class="btn btn-danger" onclick='confirmDelete("<?php echo $row["id"] ?> ")'>
                                        <?php include 'icons/delete_icon.php'; ?></button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="btn btn-danger" disabled>
                                            <?php include 'icons/delete_icon.php'; ?>

                                        </button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
            <?php
                }
            }

            ?>
        </tbody>
    </table>
</div>

