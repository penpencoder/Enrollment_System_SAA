<?php
    //session must be placed before the html tag
    session_start();    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Saint Anne Academy</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        
        <link rel="shortcut icon" type="image/jpg" href="../images/logo.JPG"/>

        <style>
            body {
                font-family: Montserrat;
            }
            .nav-link {
                color: white;
                margin-top: 15%;
            }
            .nav-link:hover {
                color: white;
                background-color: tomato;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <!-- As a heading -->
        <nav class="navbar navbar-light bg-dark fixed-top">
            <span class="navbar-brand mb-0 h1 text-light">Saint Anne Academy</span>

            <div class="btn-group">
                <button type="button" class="btn btn-warning">Welcome <?php echo $_SESSION['username']; ?>!</button>
                <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../login/login.php">Logout</a>
                </div>
            </div>
        </nav> 
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 bg-secondary mt-5" style="height: 650px; position: fixed;">
                    <ul class="nav flex-column" style="width: 180px;">
                        <!--li class="nav-item">
                            <h6><a class="nav-link active text-white" href="student_home.php"><i class="fas fa-home"></i> Home</a></h6>
                        </li-->
                        <li class="nav-item">
                            <h6><a class="nav-link text-white" href="schedule.php"><i class="far fa-calendar"></i> Schedule</a></h6>
                        </li>
                        <li class="nav-item">
                            <h6><a class="nav-link text-white" href="student_grade.php"><i class="fas fa-align-justify"></i> Grades</a></h6>
                        </li>
                        <li class="nav-item">
                            <h6><a class="nav-link text-white" href="account.php"><i class="fas fa-user-shield"></i> Account Info</a></h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        