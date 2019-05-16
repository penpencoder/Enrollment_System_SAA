<?php require 'layouts/faculty_header.php'; ?>

<div class="float-right col-10" style="margin-top: 5%;">
    <div class="card border-light mb-3" style="max-width: 100%;">
        <div class="card-header bg-info text-light">
            <div class="row">
                <div class="col-6 lead">Clearance</div>
                <div class="col-6">
                    <form id="myForm" method="post">
                        <div class="form-group float-right">
                            <label class="sr-only" for="selected_subject">subject</label>
                            <select class="form-control" id="selected_subject" name="select_subject" onchange="window.location='clearance.php?id='+this.value+'&pos='+this.selectedIndex;">
                                <option value="ALL">select subject</option>
                                <?php
                                    $con = mysqli_connect("localhost", "root", "", "enrollment");

                                    $teacher = $_SESSION['id'];
                                    $sub_id = '';

                                    $teacher_subject = mysqli_query($con, "SELECT schedule.subject_id, subject.subject_id, subject.grade_level, subject.subject_name, schedule.faculty_id, faculty.faculty_id, faculty.faculty_id_number from schedule inner join subject on subject.subject_id = schedule.subject_id inner join faculty on faculty.faculty_id = schedule.faculty_id where faculty.faculty_id_number = '$teacher'");

                                    while ($value = mysqli_fetch_array($teacher_subject)) {

                                ?>
                                <option value="<?php echo $value['grade_level']; ?>"><?php echo $value['subject_name']; ?></option>
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

                    $disp_stud = mysqli_query($con, "SELECT clearance.lrn, student.lrn, student.family_name, student.first_name, student.grade_level_id FROM clearance INNER JOIN student ON student.lrn = clearance.lrn where student.grade_level_id = '$vince' and clearance.status = '0'");
                            
                    $_SESSION['idx'] = 1;
                    $a = 0;
                    
                    // count number of rows
                    $num_rows = mysqli_num_rows($disp_stud);

                    if($num_rows < 1) {
                        $message = 'All students have cleared their clearance';
                    }
                    else {
            ?>
                <form action="clearance.php" method="post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">LRN</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_array($disp_stud)) {
                                    $a += $_SESSION['idx'];
                            ?>
                            <tr>
                                <td><?php echo $row['lrn'] ?></td>
                                <td><?php echo $row['first_name']; ?> <?php echo $row['family_name']; ?></td>
                                <td><input type="checkbox" name="check<?php echo $a;?>" value="check" id="LetterNeed" onclick="validate()"></td>
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
                                    <button onclick="saveClick()" class="btn btn-info w-100 float-right">Save</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <script>
                    // function validate() {
                    //     if (document.getElementById('LetterNeed').checked) {
                    //         alert("Clearance Checked");
                    //     } else {
                    //         alert("Clearance Not yet Approved");
                    //     }
                    // }

                    function saveClick(){
                        alert("Clearance Saved");
                    }
                </script>
            <?php
                    }
                }//detoy tay end jay if   
                else {
                    if($vince < 1) {
                        $message = 'Please choose a subject';
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