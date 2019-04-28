<?php require 'layouts/header.php'; ?>

    <div class="float-right col-10" style="margin-top: 4%;">
        <div class="mt-3" style="margin: 0 auto;">
                <div class="card border-info mb-3" style="max-width: 100%;">
                    <div class="card-header bg-info text-light text-center lead">Enrolled Students</div>
                        <div class="card-body">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">LRN</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Birth Day</th>
                                        <th scope="col">Grade Level</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "", "enrollment");
                                        $query = "select * from student";
                                        $sql = mysqli_query($con, $query);
                                        
                                        while($row = mysqli_fetch_array($sql)){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['lrn']; ?></th>
                                        <td><?php echo $row['first_name']; ?>, <?php echo $row['family_name']; ?></td>
                                        <td><?php echo $row['gender'] ?></td>
                                        <td><?php echo $row['bday'] ?></td>
                                        <td><?php echo $row['grade_level_id']; ?></td>
                                        <td>
                                            <input type="button" value="Move Up" class="btn btn-success">
                                            
                                            <a href="includes/update_student.php?id=<?= $row['student_id'] ?>" class='btn btn-warning'>Update</a>
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
        </div>

<?php require 'layouts/footer.php'; ?>