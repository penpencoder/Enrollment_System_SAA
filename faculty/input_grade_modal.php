<div class="modal fade lock<?php echo $row['lrn'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Input Grade</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="lock_grade.php" method="post">
            <div class="container row mt-3 mb-3" style="margin: 0 auto;">
                <div class="col-3">
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-info text-light">1st Grading</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Grade</label>
                                <input type="number" name="first" class="form-control" id="exampleInputPassword1" placeholder="Grade">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-info text-light">2nd Grading</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Grade</label>
                                <input type="number" name="second" class="form-control" id="exampleInputPassword1" placeholder="Grade<?php echo $row['lrn'] ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-info text-light">3rd Grading</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Grade</label>
                                <input type="number" name="third" class="form-control" id="exampleInputPassword1" placeholder="Grade">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-info text-light">4th Grading</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Grade</label>
                                <input type="number" name="fourth" class="form-control" id="exampleInputPassword1" placeholder="Grade">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row mb-3 container" style="margin: 0 auto;">
                <div class="col-6">
                    <input type="hidden" name="sub_id" value="<?php echo $row['subject_id'] ?>">
                    <input type="hidden" name="faculty_id" value="<?php echo $_SESSION['id'] ?>">
                    <input type="hidden" name="lrn" value="<?php echo $row['lrn'] ?>">
                    <button type="submit" name="lock" class="w-100 btn btn-info">Lock</button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>

    </div>
  </div>
</div>