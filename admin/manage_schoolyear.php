<?php require 'layouts/admin_header.php'; ?>

<div class="col mt-3">
        <!-- Card Head -->
        <div class="card mb-3" style="max-width: col-9; background:#3498DB;">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-white  ">School Year</h4>
                    </div>
                    <div class="col-6">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="far fa-calendar-plus"></i> Add School Year
                        </button>
                    </div>
                </div>
                
               
                

                <!-- Modal -->
                <div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalCenterTitle">School Year</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- form for faculty -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                <th scope="col">School Year Id</th>
                                <th  scope="col">Start</th>
                                <th  scope="col">End</th>
                                <th  scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $con = mysqli_connect("localhost", "root", "", "enrollment");

                                $sql = "SELECT * FROM `school_year`";
                                $result = mysqli_query($con, $sql);

                                while($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['school_year_id']; ?></th>
                                    <td><?php echo $row['school_year_start']; ?></td>
                                    <td><?php echo $row['school_year_end']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $row['faculty_id']; ?>">
                                            Update
                                        </button>
                                    </td>
                                </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php require 'layouts/admin_footer.php'; ?>