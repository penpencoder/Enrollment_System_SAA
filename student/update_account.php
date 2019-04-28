<?php
    //MySQLi Procedural
    $conn = mysqli_connect("localhost","root","","enrollment");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<div class="modal fade" id="update<?php echo $row['lrn']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border border-info">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light" id="exampleModalCenterTitle">Update Account Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputPassword1" value="<?php echo $row['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword1" value="<?php echo $row['password'] ?>">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" name="id" value="<?php echo $row['lrn'] ?>">
                            <button type="submit" name="update" class="btn btn-primary w-100">Save Changes</button>
                        </div>

                        <div class="col-6">
                            <button type="submit" class="btn btn-warning w-100" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>