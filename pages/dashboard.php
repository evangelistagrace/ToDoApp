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
    <div class="navbar-item"><div class="btn-menu"><i class="fas fa-bars"></i></div></div>
    <div class="navbar-item"> <a href="/" class="navbar-brand">Daily-Do</a></div>
    <div class="navbar-item">
        <form class="search">
            <input type="search" class="form-control mr-2" placeholder="Search">
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </div>
</nav>

<div class="container">
    <!--pop-up box-->
    <div class="pop-up">
        <div class="pop-up-content">
            <p>
            <div class="btn-close"><i class="fas fa-times"></i></div>
            <div class="pop-up-title">Add Task</div>
            <form id="task-form" class="add-task" action="">
                <div class="form-row inline">
                    <input id="task-name" name="task-name" class="form-control" type="text" placeholder="Enter a task...">
                    <button id="add-task-btn" class="btn btn-info" type="submit">Add</button>
                </div>
                <div class="form-row inline">
                    <div class="form-row block">
                        <div class="title">Dateline: </div>
                        <input id="task-dateline" name="task-dateline" class="form-control" type="date">
                    </div>
                    <div class="form-row block">
                        <div class="title">Set reminder: </div>
                        <label class="switch">
                            <input id="task-reminder" name="task-reminder" type="checkbox">
                            <div class="slider"></div>
                        </label>
                    </div>
                </div>
            </form>
            </p>
        </div>
    </div>

    <!--add task button-->
    <div class="btn-add-task">+</div>

    <!--progress bar-->
    <div class="row">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar"><span class="percentage"></span></div>
        </div>
        <p class="progress-text"><span class="task completed"></span>/<span class="task total"></span> completed</p>
    </div>

    <!--To-do-->
    <div class="row">
        <div class="container-title">To-do</div>
        <div class="list-container">
            <ul id="to-do">
                <li class="list-item important">
                    <input class="checkbox" type="checkbox">
                    <div class="pseudo-checkbox"></div>
                    <div class="task">One</div>
                    <span class="dateline" value="2019-06-30">Due: 2019-06-30</span>
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-alt"></i>
                </li>
                <li class="list-item">
                    <input class="checkbox" type="checkbox"><div class="pseudo-checkbox"></div>
                    <div class="task">Two</div>
                    <span class="dateline">Due: 10/06/19</span>
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-alt"></i>
                </li>
                <li class="list-item">
                    <input class="checkbox" type="checkbox"><div class="pseudo-checkbox"></div>
                    <div class="task">Three</div>
                    <span class="dateline">Due: 10/06/19</span>
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-alt"></i>
                </li>

            </ul>
        </div>
    </div>

    <!--Completed-->
    <div class="row">
        <div class="container-title">Completed</div>
        <div class="list-container">
            <ul id="completed">
                <li>one</li>
                <li>two</li>
                <li>three</li>
            </ul>
        </div>
    </div>

</div>

<script src="../js/app.js"></script>
</body>
</html>