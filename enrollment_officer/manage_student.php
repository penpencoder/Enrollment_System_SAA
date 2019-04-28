<?php
    //session must be placed before the html tag
    session_start();    
?>

<?php require 'layouts/header.php'; ?>

    <div class="float-right col-10 mt-3">
        <div class="card mb-3" style="max-width: col-9; background:#3498DB;">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-white">Students</h4>
                    </div>
                    <div class="col-6">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fas fa-user-plus"></i>  Enroll Student
                        </button>
                    </div>
                </div>
                

                <!-- Modal -->
                <div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h3 class="modal-title text-light" id="exampleModalCenterTitle">Enrollment Form</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php require 'includes/enrollment_form.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

                <!-- Card Body -->
                <div class="card-body bg-light text-dark">
                    <!-- students table -->
                    <table class="table mt-4" style="text-align: center;">

                        <thead>
                            <tr>
                                <th class="text-primary" scsope="col">LRN</th>
                                <th class="text-primary" scope="col">Name</th>
                                <th class="text-primary" scope="col">Grade Level</th>
                                <th class="text-primary" scope="col">Birth Date</th>
                                <th class="text-primary" scope="col">Status</th>
                                <th class="text-primary" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $con = mysqli_connect("localhost", "root", "", "enrollment");

                            $sql = "SELECT * FROM student";
                            $result = mysqli_query($con, $sql);

                            while($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row['lrn']; ?></th>
                                <td><?php echo $row['family_name']; ?>, <?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['grade_level_id'];?></td>
                                <td><?php echo $row['bday']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $row['student_id']; ?>">
                                    <i class="far fa-edit"></i> Update
                                    </button>
                                    <?php require 'includes/update_student.php' ?>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>    

                </div>
            </div>
        </div>
    </div>

<?php require 'layouts/footer.php'; ?>