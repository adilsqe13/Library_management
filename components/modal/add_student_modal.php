<p class="dfjeac mt-3">
    <!-- Modal -->
<div class="modal fade" id="addCandidateModal" tabindex="-1" aria-labelledby="addCandidateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 bold" id="addCandidateModalLabel">Student Registration</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../handle_operation/handle_student.php" method="post">
                    <div class="mb-3">
                        <label for="full_name" class="form-label ">Full Name</label>
                        <input type="text" class="form-control"  name="full_name" value='' />
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label ">Mobile Number</label>
                        <input type="tel" class="form-control"  name="mobile" value='' />
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label ">Address</label>
                        <input type="text" class="form-control"  name="address" value='' />
                    </div>
                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="register" value="Add" class="btn btn-warning bold"></input>
            </div>
            </form>
        </div>
    </div>
</div>
</p>