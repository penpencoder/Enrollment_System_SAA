<?php require 'layouts/admin_header.php'; ?>
    
    <div class="float-right col-10" style="margin-top: 5%;">
        <div class="card border-info mb-3" style="max-width: 100%; margin: 0 auto;">
            <div class="card-header bg-info text-light lead">Pending Students Account</div>
            <div class="card-body text-secondary">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">LRN</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $con = mysqli_connect("localhost", "root", "", "enrollment");

                            $sql = mysqli_query($con, "select users.lrn, users.username, users.password, student.first_name, student.family_name from users inner join student on users.lrn = student.lrn where users.status = '0'");

                            while($row = mysqli_fetch_array($sql)) {
                        ?> 
                        <tr>
                            <th scope="row"><?php echo $row['lrn']; ?></th>
                            <td><?php echo $row['first_name'] .' '. $row['family_name'] ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td style="width:5%;"><input class="readonly border border-light" style="text-align: center;" type="password" value="<?php echo $row['password'] ?>"></td>
                            <td>
                                <input type="button" class="btn btn-info" value="Approved">
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

<?php require 'layouts/admin_footer.php'; ?>