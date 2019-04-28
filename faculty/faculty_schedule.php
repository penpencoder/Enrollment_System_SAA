<?php require 'layouts/faculty_header.php'; ?>

<div class="float-right col-10" style="margin-top: 5%;">
    <div class="card border-info mb-3" style="max-width: 100%;">
        <div class="card-header bg-info text-light">Schedule</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Time</th>
                        <th scope="col">School Year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $teacher = $_SESSION['id'];

                        $con = mysqli_connect("localhost", "root", "", "enrollment");
                        
                        $sched = mysqli_query($con, "SELECT schedule.schedule_id, faculty.family_name, faculty.first_name, subject.subject_name, time.start_time, time.end_time, school_year.school_year_start, school_year.school_year_end FROM schedule INNER JOIN faculty on schedule.faculty_id = faculty.faculty_id INNER JOIN subject on schedule.subject_id = subject.subject_id INNER JOIN time on schedule.time_id = time.time_id INNER join school_year on schedule.school_year_id = school_year.school_year_id where faculty.faculty_id_number = '$teacher'");

                        while($info = mysqli_fetch_array($sched)){
                        
                    ?>
                        <tr>
                            <td><?php echo $info['subject_name']; ?></td>
                            <td><?php echo $info['start_time']; ?> - <?php echo $info['end_time']; ?></td>
                            <td><?php echo $info['school_year_start']; ?> - <?php echo $info['school_year_end']; ?></td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'layouts/faculty_footer.php'; ?>