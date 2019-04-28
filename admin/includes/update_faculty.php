<?php
    //MySQLi Procedural
    $conn = mysqli_connect("localhost","root","","enrollment");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
    <div class="modal fade bd-example-modal-xl" id="update<?php echo $row['faculty_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h3 class="modal-title text-light" id="exampleModalCenterTitle">Update Faculty</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                        $update = mysqli_query($conn, "select * from faculty where faculty_id = '".$row['faculty_id']."'");
                        $row=mysqli_fetch_array($update);
                    ?>
                    <div class="container mb-4 border border-primary rounded">
                        <form method="post" action="../admin/includes/update_faculty_info.php" class="mt-3">
                            <h5 class="text-primary">Basic Information</h5>
                            <hr>
                            
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="family_name">Family Name</label>
                                        <input type="text" class="form-control" name="family_name" id="family_name" value="<?php echo $row['family_name']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type		="text" class="form-control" name="first_name" id="first_name" value="<?php echo $row['first_name']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name" value="<?php echo $row['middle_name']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $row['address']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="bday">Date of Birth</label>
                                        <input type="date" class="form-control" value="<?php echo $row['bday']; ?>" name="bday" id="bday" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile Number</label>
                                        <input type="number" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo $row['mobile_number']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input type="hidden" name="id" value="<?php echo $row['faculty_id'] ?>">
                                    <button class="w-100 btn btn-primary" type="submit"> <i class="fas fa-check"></i>   Save Changes</button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-warning w-100" data-dismiss="modal">
                                        <i class="fas fa-times"></i>    Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                <?php  ?>
                    </div>

                </div>
            </div>
        </div>
    </div>