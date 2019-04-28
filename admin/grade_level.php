<?php require 'layouts/admin_header.php'; ?>

<div class="float-right col-10" style="margin: 0 auto; margin-top: 5%;">
        <!-- Card Head -->
        <div class="card mb-3" style="max-width: col-9; background:#3498DB;">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-white">Section</h4>
                    </div>
                    <div class="col-6">

                        <button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fas fa-plus"></i> Add Section
                        </button>

                    </div>
                </div>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-light" id="exampleModalCenterTitle">Grade Level</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php require 'includes/add_grade_level.php'; ?>
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
                                <th class="text-primary" scope="col">Section</th>
                                <th class="text-primary" scope="col">Grade Level</th>
                                <th class="text-primary" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $con = mysqli_connect("localhost","root","","enrollment");

                                $sql = mysqli_query($con, "SELECT * FROM `section`");
                                while($row = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $row['section_name']; ?></td>
                                <td><?php echo $row['grade_level']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $row['section_id']; ?>">
                                        <i class="far fa-edit"></i> Update
                                    </button>
                                    <?php require 'includes/update_grade_level.php' ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php require 'layouts/admin_footer.php'; ?>