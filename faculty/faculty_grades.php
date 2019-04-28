<?php require 'layouts/faculty_header.php'; ?>

<div class="float-right col-10" style="margin-top: 5%;">
    <div class="card border-light mb-3" style="max-width: 100%;">
        <div class="card-header bg-info text-light">
            <div class="row">
                <div class="col-6 lead">Grades</div>
                <div class="col-6">
                    <form id="myForm" method="post">
                        <div class="form-group float-right">
                            <label class="sr-only" for="selected_subject">subject</label>
                            <select class="form-control" id="selected_subject" name="select_subject" onchange="window.location='faculty_grades.php?id='+this.value+'&pos='+this.selectedIndex;">
                                <option value="ALL">select subject</option>
                                <?php
                                    $con = mysqli_connect("localhost", "root", "", "enrollment");

                                    $teacher = $_SESSION['id'];
                                    $sub_id = '';

                                    $teacher_subject = mysqli_query($con, "SELECT schedule.subject_id, subject.subject_id, subject.grade_level, subject.subject_name, schedule.faculty_id, faculty.faculty_id, faculty.faculty_id_number from schedule inner join subject on subject.subject_id = schedule.subject_id inner join faculty on faculty.faculty_id = schedule.faculty_id where faculty.faculty_id_number = '$teacher'");

                                    while ($value = mysqli_fetch_array($teacher_subject)) {

                                ?>
                                <option value="<?php echo $value['subject_id']; ?>"><?php echo $value['subject_name']; ?></option>
                                <?php } ?>
                            </select>

                            <?php
                                $vince = '';
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $vince = $id;
                            ?>

                            <script>
                                let myselect = document.getElementById("selected_subject");
                                myselect.options.selectedIndex = <?php echo $_GET["pos"]; ?>
                            </script>

                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">

            <?php
                $message = '';
                if($vince >= 1) {
                    $disp_stud = mysqli_query($con, "select grade.first_grading, grade.second_grading, grade.third_grading, grade.fourth_grading, grade.lock, grade.student_id, student.lrn, student.family_name, student.first_name, student.grade_level_id, subject.subject_id, subject.grade_level from grade inner join student on student.lrn = grade.student_id inner join subject on subject.grade_level = student.grade_level_id where subject.subject_id = '$vince'");
                            
                    $_SESSION['idx'] = 1;
                    $a = 0;
            ?>
                <form action="lock_grades.php" method="post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">1st Grading</th>
                                <th scope="col">2nd Grading</th>
                                <th scope="col">3rd Grading</th>
                                <th scope="col">4th Grading</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                while($row = mysqli_fetch_array($disp_stud)) {
                                    $a += $_SESSION['idx'];
                                        
                            ?>
                            <tr>
                                <td><?php echo $row['first_name']; ?> <?php echo $row['family_name']; ?></td>
                                <td>
                                    <?php
                                        if($row['first_grading'] === '') {
                                    ?>
                                        <div class="col-auto" style="width: 80%;">
                                            <label class="sr-only" for="inlineFormInputGroup">1st</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">1st</div>
                                                </div>
                                                <input type="number" name="first_grading<?php echo $a;?>" class="form-control" id="inlineFormInputGroup" placeholder="Grade">
                                            </div>
                                        </div>
                                    <?php    
                                        }
                                        else {
                                    ?>
                                        <input class="form-control w-50 bg-light" type="text" value="<?php echo $row['first_grading'] ?>" name="first_grading<?php echo $a;?>" readonly>
                                    <?php
                                        }
                                    ?>
                                </td>
                                
                                <td>
                                    <?php
                                        if($row['second_grading'] === '') {
                                    ?>
                                        <div class="col-auto" style="width: 80%;">
                                            <label class="sr-only" for="inlineFormInputGroup">2nd</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">2nd</div>
                                                </div>
                                                <input type="number" name="second_grading<?php echo $a;?>" class="form-control" id="inlineFormInputGroup" placeholder="Grade">
                                            </div>
                                        </div>
                                    <?php    
                                        }
                                        else {
                                    ?>
                                        <input class="form-control w-50 bg-light" type="text" value="<?php echo $row['second_grading'] ?>" name="second_grading<?php echo $a;?>" readonly>
                                    <?php
                                        }
                                    ?>
                                </td>
                                
                                <td>
                                    <?php
                                        if($row['third_grading'] === '') {
                                    ?>
                                        <div class="col-auto" style="width: 80%;">
                                            <label class="sr-only" for="inlineFormInputGroup">3rd</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">3rd</div>
                                                </div>
                                                <input type="number" name="third_grading<?php echo $a;?>" class="form-control" id="inlineFormInputGroup" placeholder="Grade">
                                            </div>
                                        </div>
                                    <?php    
                                        }
                                        else {
                                    ?>
                                        <input class="form-control w-50 bg-light" type="text" value="<?php echo $row['third_grading'] ?>" name="third_grading<?php echo $a;?>" readonly>
                                    <?php
                                        }
                                    ?>
                                </td>
                                
                                <td>
                                    <?php
                                        if($row['fourth_grading'] === '') {
                                    ?>
                                        <div class="col-auto" style="width: 80%;">
                                            <label class="sr-only" for="inlineFormInputGroup">4th</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">4th</div>
                                                </div>
                                                <input type="number" name="fourth_grading<?php echo $a;?>" class="form-control" id="inlineFormInputGroup" placeholder="Grade">
                                            </div>
                                        </div>
                                    <?php    
                                        }
                                        else {
                                    ?>
                                        <input class="form-control w-50 bg-light" type="text" value="<?php echo $row['fourth_grading'] ?>" name="fourth_grading<?php echo $a;?>" readonly>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <input type="hidden" name="lrn<?php echo $a?>" value="<?php echo $row['lrn'] ?>">
                                    <input type="hidden" name="a" value="<?php echo $a ?>" >
                                </td>
                            <?php 
                                //$a++;
                                }
                            ?>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <input type="hidden" name="sub_id" value="<?php echo $vince ?>">
                                    <input type="hidden" name="teacher_id" value="<?php echo $teacher ?>">
                                    <button name="add_grade" type="submit" class="btn btn-info w-100 float-right">Save</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            <?php
                }//detoy tay end jay if   
                else {
                    if($vince < 1) {
                        $message = 'PLese choose a subject';
                    }
                }// dety tay end jay else ti if
            ?>

            <?php
                if($message != ''){
            ?>
                <p class="lead text-info"><?php echo $message ?></p>
            <?php
                }
            ?>
        
        </div>
    </div>
</div>

<?php require 'layouts/faculty_footer.php'; ?>