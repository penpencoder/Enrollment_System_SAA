<?php
    //MySQLi Procedural
    $con = mysqli_connect("localhost","root","","enrollment");
?>

<div class="modal fade" id="update<?php echo $row['subject_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light" id="exampleModalCenterTitle">Update Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../admin/includes/update_subject_info.php" class="mt-3">
                    <h5 class="text-primary" style="text-align: center;">Subject Information</h5>
                    <hr>

                    <div class="form-group">
                        <label for="lrn">Subject Code</label>
                        <input type="number" class="form-control" name="code" id="lrn" aria-describedby="emailHelp" value="<?php echo $row['subject_code']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="lrn">Subject Name</label>
                        <input type="text" class="form-control" name="name" id="lrn" aria-describedby="emailHelp" value="<?php echo $row['subject_name']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="lrn">Grade Level</label>
                        <input type="number" class="form-control" name="level" id="lrn" aria-describedby="emailHelp" value="<?php echo $row['grade_level']; ?>" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <input type="hidden" name="id" value="<?php echo $row['subject_id'] ?>">
                            <button class="w-100 btn btn-primary" type="submit"><i class="fas fa-check"></i> Save Changes</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-warning w-100" data-dismiss="modal">
                                <i class="fas fa-times"></i>    Close
                            </button>
                        </div>
                    </div>
                        
                </form>
            </div>
        </div>
    </div>
</div>