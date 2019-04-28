<?php require 'layouts/faculty_header.php' ?>

<div class="float-right col-10" style="margin-top: 5%;">
<div class="card border-light mb-3" style="max-width: 100%;">
        <div class="card-header bg-info text-light">Account Information</div>
        <div class="card-body">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $con = mysqli_connect("localhost", "root", "", "enrollment");

                        $id = $_SESSION['id'];

                        $sql = mysqli_query($con, "select faculty_id, username, password from users where faculty_id = '$id' and role = 'faculty'");

                        while($row = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td>
                            <input class="btn btn-light w-25" readonly type="password" value="<?php echo $row['password'] ?>" id="password">
                            
                            <i class="far fa-eye" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"></i>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#update<?php echo $row['faculty_id'] ?>">
                                Update
                            </button>
                            <?php require 'update_account.php' ?>
                        </td>
                    </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function mouseoverPass(obj) {
        var obj = document.getElementById('password');
        obj.type = "text";
    }

    function mouseoutPass(obj) {
        var obj = document.getElementById('password');
        obj.type = "password";
    }
</script>

<?php require 'layouts/faculty_footer.php' ?>