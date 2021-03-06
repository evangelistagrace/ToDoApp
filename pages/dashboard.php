<?php
require '../config/task-process.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-do List</title>
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Quicksand:400,500|Roboto&display=swap" rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.css">
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/a256fe27cf.js"></script>
    <!--stylesheet-->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body onload="updateProgress()">
<!--navbar-->
<nav class="navbar navbar-light bg-light">
    <div class="navbar-item"><i class="fas fa-bars"></i></div>
    <div class="navbar-item"><a href="/" class="navbar-brand">Daily-Do</a></div>
    <div class="navbar-item"><i class="fas fa-user"></i></div>
</nav>
<!-- popup menu   -->
<div class="popup-menu" id="popup-menu">
    <div class="triangle"></div>
    <div class="menu-container">
        <ul>
            <li>Profile</li>
            <li>Settings</li>
            <li><a href="../config/task-process.php?logout='true'">Logout</a></li>
        </ul>
    </div>
</div>

<div class="container">

    <!--progress bar-->
    <div class="row">
        <div class="progress" style="height: 20px;">
            <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated
            bg-warning"
                 role="progressbar"><span class="percentage"></span></div>
        </div>
        <p class="progress-text"><span class="task completed"></span>/<span class="task total"></span> completed</p>
    </div>

    <!--To-do-->
    <div class="row">
        <div class="container-title">To-do</div>
        <div class="list-container">
            <ul id="to-do">
                <?php $query = pg_query("SELECT * FROM items WHERE itemuser = '".$_SESSION['username']."' AND itemstatus = FALSE")?>
                <?php while($item = pg_fetch_array($query)): ?>
                    <li class="list-item">
                        <a href="../config/task-process.php?task-status=f&task-id=<?php echo
                        $item['id']?>"><i class="far fa-square reminder-check text-info"></i></a>
                        <div class="task text-primary"><?php echo $item['itemname'] ?></div>
<!--                        <span class="dateline">Due: 2019-06-30</span>-->
                        <i class="fas fa-pencil-alt text-primary"></i>
                        <i class="fas fa-times text-danger"></i>
                    </li>
                <?php endwhile ?>
            </ul>
        </div>
    </div>

    <!--Completed-->
    <div class="row">
        <div class="container-title">Completed</div>
        <div class="list-container">
            <ul id="completed">
                <?php $query = pg_query("SELECT * FROM items WHERE itemuser = '".$_SESSION['username']."' AND itemstatus = TRUE")?>
                <?php while($item = pg_fetch_array($query)): ?>
                    <li class="list-item">
                        <a href="../config/task-process.php?task-status=t&task-id=<?php echo
                        $item['id']?>"><i class="fas fa-check-square reminder-check
                        text-info"></i></a>
                        <div class="task text-primary"><?php echo $item['itemname'] ?></div>
                        <i class="fas fa-times text-danger"></i>
                    </li>
                <?php endwhile ?>
            </ul>
        </div>
    </div>

    <a class="btn btn-danger add-btn" href="#addReminder"><i class="fas fa-plus"></i></a>

    <!-- add reminder -->
    <div id="addReminder" class="overlay">
        <div class="popup">

            <div class="content"><a class="close" href="#">x</a>
                <h3 class="text-center mb-4 mt-4">Add Reminder</h3>
                <form class="popup-form" action="dashboard.php" method="POST">
                    <div class="form-group">
                        <table>
                            <tr>
                                <td><label for="expenseTitle">Title</label></td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="item-name"
                                               id="itemName" maxlength="140" placeholder="e.g: Pay
                                               phone bill...">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-group">
                        <table>
                            <tr>
                                <td><label for="itemDate">Due Date</label></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="item-date"
                                               id="itemDate">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block" type="submit"
                                name="add-item">Add reminder</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="../js/app.js"></script>
</body>
</html>