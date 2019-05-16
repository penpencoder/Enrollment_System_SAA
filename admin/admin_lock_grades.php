<?php require 'layouts/admin_header.php'; ?>


<div class="float-right col-10" style="margin-top: 5%;">
	<div class="card border-info mb-3 mt-3" style="max-width: 100%;">
		<div class="card-header bg-info text-light">Lock Grades</div>
            <div class="card-body text-info">
                <!-- <div id="myDIV" class="alert alert-success is-hidden" role="alert">
                Posted Successfully
                </div> -->
                <!-- <form action="includes/post_announcement.php" method="post">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Announcement: </label>
                    <textarea class="form-control" id="taAnnounce" name="inputAnnounce" rows="3"></textarea>
                    <button onclick="btnClick()" type="submit" name = "btnAnnounce" class="btn btn-info mt-2 w-100">Post</button>

                    <script>
                        function btnClick() {
                            alert("Posted Succesfully");
                            // var x = document.getElementById("myDIV");
                            // if (x.style.display === "none") {
                            //     x.style.display = "block";
                            // } else {
                            //     x.style.display = "none";
                            // }
                        }
                    </script>
            </form> -->
            <?php
                $con = mysqli_connect("localhost", "root", "", "enrollment");
                $lock = mysqli_query($con, "SELECT `first_grading_lock`, `second_grading_lock`, `third_grading_lock`, `fourth_grading_lock` FROM `grade` LIMIT 1");
                $lockarray = mysqli_fetch_array($lock);
            ?>

                        <div class="row">
                            <div class="col-3">
                                <form action="admin_lock_grades.php" method="POST">
                                    <?php
                                        if($lockarray["first_grading_lock"] == 0)
                                        {
                                            echo("<button name='btnlock1' type='submit' class='btn btn-warning'>Lock 1st Grading</button>");
                                        } else if($lockarray["first_grading_lock"] == 1)
                                            {
                                                echo("<button name='btnunlock1' type='submit' class='btn btn-warning w-100'>Unlock 1st Grading</button>");
                                            }
                                    ?>
                                </form>
                            </div>

                            <div class="col-3">
                                <form action="admin_lock_grades.php" method="POST">
                                    <?php
                                        if($lockarray["second_grading_lock"] == 0)
                                        {
                                            echo("<button name='btnlock2' type='submit' class='btn btn-warning w-100'>Lock 2nd Grading</button>");
                                        } else if($lockarray["second_grading_lock"] == 1)
                                            {
                                                echo("<button name='btnunlock2' type='submit' class='btn btn-warning w-100'>Unlock 2nd Grading</button>");
                                            }
                                    ?>
                                </form>
                            </div>

                            <div class="col-3">
                                <form action="admin_lock_grades.php" method="POST">
                                    <?php
                                        if($lockarray["third_grading_lock"] == 0)
                                        {
                                            echo("<button name='btnlock3' type='submit' class='btn btn-warning w-100'>Lock 3rd Grading</button>");
                                        } else if($lockarray["third_grading_lock"] == 1)
                                            {
                                                echo("<button name='btnunlock3' type='submit' class='btn btn-warning w-100'>Unlock 3rd Grading</button>");
                                            }
                                    ?>
                                </form>
                            </div>

                            <div class="col-3">
                                <form action="admin_lock_grades.php" method="POST">
                                    <?php
                                        if($lockarray["fourth_grading_lock"] == 0)
                                        {
                                            echo("<button name='btnlock4' type='submit' class='btn btn-warning w-100'>Lock 4th Grading</button>");
                                        } else if($lockarray["fourth_grading_lock"] == 1)
                                            {
                                                echo("<button name='btnunlock4' type='submit' class='btn btn-warning w-100'>Unlock 4th Grading</button>");
                                            }
                                    ?>
                                </form>
                            </div>
                        </div>

            <!-- function -->
            <?php
                // 1st Grading
                if(isset($_POST['btnlock1']))
                {
                    $lock1 = "UPDATE `grade` SET `first_grading_lock` = '1'";
                    if($con->query($lock1) === TRUE)
                    {
                    }
                }

                if(isset($_POST['btnunlock1']))
                {
                    $lock1 = "UPDATE `grade` SET `first_grading_lock` = '0'";
                    if($con->query($lock1) === TRUE)
                    {
                    }
                }

                // 2nd Grading
                if(isset($_POST['btnlock2']))
                {
                    $lock1 = "UPDATE `grade` SET `second_grading_lock` = '1'";
                    if($con->query($lock1) === TRUE)
                    {
                    }
                }

                if(isset($_POST['btnunlock2']))
                {
                    $lock1 = "UPDATE `grade` SET `second_grading_lock` = '0'";
                    if($con->query($lock1) === TRUE)
                    {
                    }
                }

                // 3rd Grading
                if(isset($_POST['btnlock3']))
                {
                    $lock1 = "UPDATE `grade` SET `third_grading_lock` = '1'";
                    if($con->query($lock1) === TRUE)
                    {
                    }
                }

                if(isset($_POST['btnunlock3']))
                {
                    $lock1 = "UPDATE `grade` SET `third_grading_lock` = '0'";
                    if($con->query($lock1) === TRUE)
                    {
                    }
                }

                // 4th Grading
                if(isset($_POST['btnlock4']))
                {
                    $lock1 = "UPDATE `grade` SET `fourth_grading_lock` = '1'";
                    if($con->query($lock1) === TRUE)
                    {
                    }
                }

                if(isset($_POST['btnunlock4']))
                {
                    $lock1 = "UPDATE `grade` SET `fourth_grading_lock` = '0'";
                    if($con->query($lock1) === TRUE)
                    {
                    }
                }
            ?>
        </div>
	</div>
</div>

<?php require 'layouts/admin_footer.php'; ?>
