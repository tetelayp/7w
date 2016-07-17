<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$title?></title>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 w-header">
            <h1>Тестовые задания</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 w-sidebar">
            <ul>
                <li>
                    <a href="index.php"><h4>На главную</h4></a>
                </li>
                <li>
                    <a href="index.php?t=1">Задание - 1</a>
                </li>
                <li>
                    <a href="index.php?t=2">Задание - 2</a>
                </li>
                <li>
                    <a href="index.php?t=3">Задание - 3</a>
                </li>
                <li>
                    <a href="index.php?t=4">Задание - 4</a>
                </li>
                <li>
                    <a href="index.php?t=5">Задание - 5</a>
                </li>
                <li>
                    <a href="index.php?t=6">Задание - 6</a>
                </li>
                <li>
                    <a href="index.php?t=7">Задание - 7</a>
                </li>
            </ul>
        </div>
        <div class="col-md-8 w-content">
            <?php
            include __DIR__ . '/../tasks/task' . $task . '.php';
            ?>
        </div>
    </div>
    <?php if (isset($solution)):?>
    <div class="row">
        <div class="col-md-12 w-solution">
            <?php if (isset($data)):?>
                <h4>
                    Используются следующие входные данные
                </h4>
                <p>
                    <?php
                    echo str_replace(PHP_EOL,'<br>',$data)
                    ?>
                </p>
            <?php endif;?>

            <h4>Решение</h4>
            <p class="w-answer">
                <?php

                var_dump($solution);
                ?>
            </p>


        </div>
    </div>
    <?php endif;?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>