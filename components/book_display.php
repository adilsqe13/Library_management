<script>
    function confirmDelete(bookId) {
        if (confirm("Do you want to delete this book ?")) {
            window.location.href = '../handle_operation/handle_delete_book.php?id=' + bookId;
        }
    }
</script>

<div class="opact-90 margin-top-32 ">
    <table class="table table-bordered">
        <thead>
            <tr class="table table-dark">
                <th class="text-info">ID</th>
                <th class="text-info fs-6">BOOK NAME</th>
                <th class="text-info fs-6">AUTHOR</th>
                <th class="text-info fs-6">CATEGORY</th>
                <th class="text-info fs-6">STOCK</th>
                <th class="text-info fs-6">In use</th>
                <th class="text-info fs-6">Available</th>
                <th>
                    <div class="row">
                        <div class="col dfjcac">
                            <span class="text-info fs-6">ACTION</span>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../database/db.php';
            $query = "SELECT * FROM books WHERE status = 1";
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
                        <td class='bold'><?php echo $row['book_name'] ?></td>
                        <td class='bold'><?php echo $row['author_name'] ?></td>
                        <td class='bold'><?php echo $row['category'] ?></td>
                        <td class='bold'><?php echo $row['total_stock'] ?></td>
                        <td class='bold text-danger'>
                            <?php
                            $id = $row['id'];
                            $query = "SELECT * FROM open_records WHERE status = 1 AND book_id = $id";
                            $result = mysqli_query($conn, $query);
                            echo mysqli_num_rows($result);
                            ?>
                        </td>
                        <td style="color: green" class='bold'>
                            <?php
                            echo ($row['total_stock'] - mysqli_num_rows($result));
                            ?>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-6 dfjeac">
                                    <a href='edit_book.php?id=<?php echo $row['id'] ?>' class="btn btn-info">
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
                                        <button disabled class="btn btn-danger">
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