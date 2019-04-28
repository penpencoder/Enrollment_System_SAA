<?php
    //session must be placed before the html tag
    session_start();    
?>

<?php require 'layouts/header.php'; ?>

    <div class="float-right col-10">
        <div class="mt-3" style="margin: 0 auto;">
            <div class="card border-primary mb-3" style="max-width: 100%;">
                <div class="card-header bg-primary text-light">Pending Students</div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">LRN</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Birth Day</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "", "enrollment");

                                        $sql = mysqli_query($con, "SELECT * FROM `enrollment` WHERE `status` = 'pending'");
                                        
                                        while($row = mysqli_fetch_array($sql)){
                                        $id = $row['student_id'];
                                        
                                    
                                            $student = mysqli_query($con, "SELECT student_id,lrn,family_name,first_name,grade_level_id,bday,gender FROM student WHERE student_id = $id");
                                            while($data = mysqli_fetch_array($student)){
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $data['lrn']; ?></th>
                                    <td><?php echo $data['family_name']; ?>, <?php echo $data['first_name']; ?></td>
                                    <td><?php echo $data['gender']; ?></td>
                                    <td><?php echo $data['bday']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#assess<?php echo $data['student_id']; ?>">
                                            <i class="far fa-edit"></i> Check
                                        </button>
                                        <?php require 'includes/assess.php' ?>
                                    </td>
                                </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

<?php require 'layouts/footer.php'; ?>