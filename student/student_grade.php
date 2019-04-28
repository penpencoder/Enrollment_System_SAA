<?php require 'layouts/student_header.php'; ?>

<div class="float-right col-10" style="margin-top: 5%;">
    <div class="card border-info mb-3" style="max-width: 100%;">
        <div class="card-header bg-info text-light">Grades</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">1st grading</th>
                        <th scope="col">2nd grading</th>
                        <th scope="col">3rd grading</th>
                        <th scope="col">4th grading</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $con = mysqli_connect("localhost", "root", "", "enrollment");
                        $lrn =  $_SESSION['lrn'];
                        
                        $sql = mysqli_query($con, "select grade.subject_id, subject.subject_name, grade.student_id, grade.first_grading, grade.second_grading, grade.third_grading, grade.fourth_grading, student.lrn, student.family_name, student.first_name from grade inner join student on student.lrn = grade.student_id inner join subject on subject.subject_id = grade.subject_id where grade.student_id = '$lrn'");

                        while($row = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $row['subject_name'] ?></td>
                        <td><?php echo $row['first_grading'] ?></td>
                        <td><?php echo $row['second_grading'] ?></td>
                        <td><?php echo $row['third_grading'] ?></td>
                        <td><?php echo $row['fourth_grading'] ?></td>
                    </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'layouts/student_footer.php'; ?>