<p class="dfjeac mt-3">
    <!-- Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 bold" id="addBookModalLabel">Add new book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../handle_operation/handle_book.php" method="post">
                    <div class="mb-3">
                        <label for="book_name" class="form-label ">Book Name</label>
                        <input type="text" class="form-control"  name="book_name" value='' />
                    </div>
                    <div class="mb-3">
                        <label for="author_name" class="form-label ">Author Name</label>
                        <input type="text" class="form-control"  name="author_name" value='' />
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label ">Category</label>
                        <input type="text" class="form-control"  name="category" value='' />
                    </div>
                    <div class="mb-3">
                        <label for="total_stock" class="form-label ">Total Stock</label>
                        <input type="number" class="form-control"  name="total_stock" value='' />
                    </div>
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="add_book" value="Add" class="btn btn-info bold"></input>
            </div>
            </form>
        </div>
    </div>
</div>
</p>