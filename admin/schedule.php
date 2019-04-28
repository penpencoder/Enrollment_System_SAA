<?php require 'layouts/admin_header.php'; ?>
    
<div class="float-right col-10" style="margin: 0 auto; margin-top: 5%;">
        <div class="card border-primary mb-3" style="max-width: 100%;">
        <div class="card-header bg-primary">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-white">Schedules</h4>
                    </div>
                    <div class="col-6">

                        <button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fas fa-plus"></i> Set Schedule
                        </button>

                    </div>
                </div>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-light" id="exampleModalCenterTitle">Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php require 'includes/set_schedule.php'; ?>
                        </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- card body -->
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Grade Level</th>
                            <th scope="col">Time</th>
                            <!--th scope="col">Action</th-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $con = mysqli_connect("localhost", "root", "", "enrollment");

                            $sql = "SELECT * FROM schedule 
                                    INNER JOIN faculty ON schedule.faculty_id = faculty.faculty_id
                                    INNER JOIN subject ON schedule.subject_id = subject.subject_id
                                    INNER JOIN time ON schedule.time_id = time.time_id
                                    INNER JOIN school_year ON schedule.school_year_id = school_year.school_year_id";
                            $result = mysqli_query($con, $sql);

                            while($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['family_name']; ?>, <?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['subject_name']; ?></td>
                                <td><?php echo $row['grade_level']; ?></td>
                                <td><?php echo $row['start_time']; ?> - <?php echo $row['end_time']; ?></td>
                            <!--    <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $row['schedule_id']; ?>">
                                        <i class="far fa-edit"></i> Update
                                    </button>
                                    <//?php require 'includes/update_schedule.php'; ?>
                                </td>
                            -->
                            </tr>
                            <?php }?>
                        </tbody>
                </table>            
            </div>
        </div>
    </div>

<?php require 'layouts/admin_footer.php'; ?>