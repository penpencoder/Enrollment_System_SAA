<!DOCTYPE html>
<?php require 'layouts/faculty_header.php'; ?>
    
    <div class="float-right col-10" style="margin-top: 5%;">
        <div class="card border-light mb-3" style="max-width: 100%;">
            <div class="card-header bg-info text-light lead text-center">
                <a href="faculty_grades.php" class="text-light btn btn-outline-light float-left">back</a> 
                Grade
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">LRN</th>
                                <th scope="col">Name</th>
                                <th scope="col">Grade Level</th>
                                <th scope="col">Geder</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $con = mysqli_connect("localhost", "root", "", "enrollment");

                                    $lrn = $_GET["lrn"];
                                    $id = $_GET["id"];

                                    $student_info = mysqli_query($con, "select student_id, lrn, family_name, first_name, grade_level_id, gender from student where lrn = '$lrn'");
                                    
                                    while($value = mysqli_fetch_array($student_info)) {
                            ?>
                            <tr>
                                <td><?php echo $value['lrn'] ?></td>
                                <td><?php echo $value['first_name'] ?> <?php echo $value['family_name'] ?></td>
                                <td><?php echo $value['grade_level_id'] ?></td>
                                <td><?php echo $value['gender'] ?></td>
                            </tr>
                                <?php
                                    }
                                ?>
                        </tbody>
                    </table>

                    <div class="row mt-5">
                        <div class="col-3">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-info text-light">1st Grading</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Grade</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Grade">
                                    </div>
                                    <button type="submit" class="btn btn-warning w-100">Lock</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-info text-light">2nd Grading</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Grade</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Grade">
                                    </div>
                                    <button type="submit" class="btn btn-warning w-100">Lock</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-info text-light">3rd Grading</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Grade</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Grade">
                                    </div>
                                    <button type="submit" class="btn btn-warning w-100">Lock</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-info text-light">4th Grading</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Grade</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Grade">
                                    </div>
                                    <button type="submit" class="btn btn-warning w-100">Lock</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php require 'layouts/faculty_footer.php'; ?>