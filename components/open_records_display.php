<div class="opact-90 margin-top-25 ">
    <table class="table table-bordered">
        <thead>
            <tr class="table table-dark">
                <th style="color: rgb(7, 231, 7);" class="fs-6">STUDENT NAME</th>
                <th style="color: rgb(7, 231, 7);" class="fs-6">BOOK NAME</th>
                <th style="color: rgb(7, 231, 7);" class="fs-6">AUTHOR</th>
                <th style="color: rgb(7, 231, 7);" class="fs-6">ISSUE DATE</th>
                <th style="color: rgb(7, 231, 7);" class="fs-6">DUE DATE</th>
                <th style="color: rgb(7, 231, 7);" class="fs-6">FINE (In Rs.)</th>
                <th style="color: rgb(7, 231, 7);" class="fs-6">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../database/db.php';
            $query = "SELECT * FROM open_records WHERE status = 1";
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
                        <!-- Student Name -->
                        <td class='bold'>
                            <?php
                            $student_id = $row['student_id'];
                            $student_query = "SELECT * FROM students WHERE id = $student_id";
                            $student_result = mysqli_query($conn, $student_query);
                            $student_row = mysqli_fetch_assoc($student_result);
                            echo $student_row['full_name'];
                            ?>
                        </td>
                        <td class='bold'>
                            <?php
                            $book_id = $row['book_id'];
                            $book_query = "SELECT * FROM books WHERE id = $book_id";
                            $book_result = mysqli_query($conn, $book_query);
                            $book_row = mysqli_fetch_assoc($book_result);
                            echo $book_row['book_name'];
                            ?>
                        </td>
                        <td class='bold'><?php echo $book_row['author_name'] ?></td>
                        <td style="color: green ;" class='bold'>
                            <?php
                            $date = new DateTime($row['added_date']);
                            $full_date = $date->format('Y-m-d');
                            echo $full_date ?>
                        </td>
                        <td class='bold text-danger'>
                            <?php
                            $date = new DateTime($row['due_date']);
                            $full_date = $date->format('Y-m-d');
                            echo $full_date ?>
                        </td>

                        <!-- Fine -->
                        <td class='bold'>
                            <?php
                            $currentDate = new DateTime();
                            $due_date = new DateTime($row['due_date']);
                            if ($currentDate <= $due_date) {
                                echo '<span class="text-secondary">No dues</span>';
                            } else {
                                $interval = $due_date->diff($currentDate);
                                $differenceInDays = $interval->days;
                                echo $differenceInDays . '/-';
                            }
                            ?>

                        </td>

                        <!-- Return & Fine pay button -->
                        <td>
                            <div class="row">
                                <div class="col dfjcac">
                                    <?php
                                    $currentDate = date('Y-m-d');
                                    $due_date = $row['due_date'];
                                    $fine_paid = $row['fine_paid'];
                                    if ($currentDate > $due_date && !$fine_paid) {
                                    ?>
                                        <form action="../handle_operation/handle_book.php" method="post">
                                            <input type="hidden" name="open_record_id" value="<?php echo $row['id']; ?>">
                                            <button style="width:100% ;" class="btn btn-danger" name="pay_fine">Pay</button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <form action="../handle_operation/handle_book.php" method="post">
                                            <input type="hidden" name="open_record_id" value="<?php echo $row['id']; ?>">
                                            <button style="width:100% ;" class="btn btn-primary" name="return_book">Return</button>
                                        </form>
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