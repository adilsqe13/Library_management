<p class="dfjeac mt-3">
    <!-- Modal -->
<div class="modal fade" id="borrowBookModal" tabindex="-1" aria-labelledby="borrowBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 bold" id="borrowBookModalLabel">Borrow Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../handle_operation/handle_book.php" method="POST">

                    <!-- Select Student -->
                    <label for="candidate">Student</label>
                    <select name="select_candidate" class='form-control'>
                        <option value="" class="p-2">-- Select --</option>
                        <?php
                        include '../database/db.php';
                        $student_query = "SELECT * FROM students WHERE status = 1";
                        $student_result = mysqli_query($conn, $student_query);

                        if ($student_result) {
                            while ($student_row = mysqli_fetch_assoc($student_result)) {
                        ?>
                                <option value='<?php echo $student_row['id']; ?>'> <?php echo $student_row['full_name'] ?> </option>
                        <?php
                            }
                        } else {
                            echo "<option value=''>No Students Registered</option>";
                        }
                        $conn->close();
                        ?>
                    </select>

                    <!-- Select Book -->
                    <label for="book" class="mt-2">Book</label>
                    <select name="select_book" class='form-control p-2'>
                        <option value="" class="p-2">-- Select --</option>
                        <?php
                        include '../database/db.php';
                        $book_query = "SELECT * FROM books WHERE status = 1";
                        $book_result = mysqli_query($conn, $book_query);

                        if ($book_result) {
                            while ($book_row = mysqli_fetch_assoc($book_result)) {
                        ?>
                                <?php
                                $id = $book_row['id'];
                                $active_query = "SELECT * FROM open_records WHERE status = 1 AND book_id = $id";
                                $active_result = mysqli_query($conn, $active_query);
                                $available = $book_row['total_stock'] - mysqli_num_rows($active_result);
                                echo $available;
                                if ($available > 0) {
                                ?>
                                    <option value='<?php echo $book_row['id']; ?>'> <?php echo $book_row['book_name'] ?> </option>
                                <?php
                                } else {
                                ?>
                                    <option disabled value='<?php echo $book_row['id']; ?>'> <?php echo $book_row['book_name'] . '      ' .' (Not Available)' ?> </option>
                                <?php
                                }
                                ?>
                        <?php
                            }
                        } else {
                            echo "<option value=''>No Book Available</option>";
                        }
                        $conn->close();
                        ?>
                    </select>

                    <!-- Current Date -->
                    <div class="mt-2">
                        <?php
                        $currentDate = new DateTime();
                        ?>
                        <label for="date">Issue Date</label>
                        <input type="text" name="issue_date" class="form-control text-success" value="<?php echo $currentDate->format('j F Y'); ?>" disabled>
                    </div>

                    <!-- Date after one week -->
                    <div class="mt-3">
                        <?php
                        $currentDate = date("Y-m-d");
                        ?>
                        <label for="date">Due Date <i>(one week only)</i></label>
                        <input type="text" name="due_date" class="form-control text-danger" value="<?php
                                                                                                    $currentDate = new DateTime();
                                                                                                    $oneWeekLater = clone $currentDate;
                                                                                                    $oneWeekLater->modify('+7 days');
                                                                                                    echo $oneWeekLater->format('j F Y');
                                                                                                    ?>" disabled>

                    </div>

                    <div class="modal-footer mt-5 border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="borrow_book" value="Issue Book" class="btn bg-green-light bold"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </p>