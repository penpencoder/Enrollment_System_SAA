<?php require 'layouts/student_header.php'; ?>

<div class="float-right col-10" style="margin-top: 5%;">
    <div class="card border-info mb-3" style="max-width: 100%;">
        <div class="card-header bg-info text-light">Schedule</div>
        <div class="card-body">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $con = mysqli_connect("localhost", "root", "", "enrollment");

                        $lrn = $_SESSION['lrn'];

                        $sql = mysqli_query($con, "select student.lrn, student.grade_level_id, subject.grade_level, schedule.faculty_id, schedule.subject_id, schedule.time_id, faculty.family_name, faculty.first_name, subject.subject_name, time.start_time, time.end_time from schedule inner join faculty on faculty.faculty_id = schedule.faculty_id inner join subject on subject.subject_id = schedule.subject_id inner join time on time.time_id = schedule.time_id inner join student on student.grade_level_id = subject.grade_level where student.lrn = '$lrn'");

                        while($row = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $row['subject_name']; ?></td>
                        <td><?php echo $row['first_name']; ?> <?php echo $row['family_name']; ?></td>
                        <td><?php echo $row['start_time']; ?> - <?php echo $row['end_time']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'layouts/student_footer.php'; ?>