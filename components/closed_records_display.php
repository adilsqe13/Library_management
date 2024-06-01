<div class="opact-90 margin-top-25 ">
    <table class="table table-bordered">
        <thead>
            <tr class="table table-dark">
                <th style="color: #fcfc03;" class="fs-6">STUDENT NAME</th>
                <th style="color: #fcfc03;" class="fs-6">BOOK NAME</th>
                <th style="color: #fcfc03;" class="fs-6">AUTHOR</th>
                <th style="color: #fcfc03;" class="fs-6">ISSUE DATE</th>
                <th style="color: #fcfc03;" class="fs-6">DUE DATE</th>
                <th style="color: #fcfc03;" class="fs-6">RETURNED DATE</th>
                <th style="color: #fcfc03;" class="fs-6">FINE PAID</th>
                <th style="color: #fcfc03;" class="fs-6">STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../database/db.php';
            $query = "SELECT * FROM open_records WHERE status = 0";
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
                        <td class='bold'>
                            <?php
                            $date = new DateTime($row['returned_date']);
                            $full_date = $date->format('Y-m-d');
                            echo $full_date ?>
                        </td>

                        <!-- Fine -->
                        <td class='bold'>
                            <?php
                            if ($row['fine_paid'] === null) {
                                echo '0';
                            } else {
                                echo $row['fine_paid'] . '/-';
                            }
                            ?>

                        </td>

                        <td>
                            <div class="row">
                                <div class="col dfjcac p-1">
                                    <button style="cursor: default" class="btn btn-danger btn-md bold">Returned</button>
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