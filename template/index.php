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

    <?php
    if ('0'!=$task):
    ?>
    <div class="row">
        <div class="col-md-12 w-solution">

                <h4>
                    Используются следующие входные данные:
                </h4>

                <form action="index.php?t=<?=$task?>" name="dataForm" method="post">
                    <?php if (isset($dbText)):?>
                        <textarea name="answer" style="min-height: 300px; width: 100%"><?=$dbText?></textarea>
                        <?php if (isset($showButton)):?>
                            <input type="submit" name="analyze" value="generate new data" class="btn btn-default">
                        <?php endif;?>
                    <?php endif;?>
                    <?php if (isset($data)):?>
                        <textarea name="data" style="width: 100%; min-height: 200px"><?php echo $data;//str_replace(PHP_EOL,'<br>',$data)?></textarea>
                        <input type="submit" name="analyze" value="analyze" class="btn btn-default">
                    <?php endif;?>
                </form>



            <h4>Решение:</h4>
            <p class="w-answer">
                <textarea name="answer" style="min-height: 300px; width: 100%"><?php

                if (isset($solution)) {
                    var_dump($solution);
                } elseif (isset($text)){
                    echo $text;
                } else {
                    echo 'Решение скоро будет найдено!';
                }

                ?></textarea>
            </p>


        </div>
    </div>
    <?php
    endif;
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 bottom text-info bg-info">
            <h6>
                Выполнил Хабаров А.А., г. Новосибирск, email - <a href="mailto:tetelayp@rambler.ru">tetelayp@rambler.ru</a>
            </h6>
        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>