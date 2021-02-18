<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php
        require_once 'parser.php';

        $pars = new Parser;
        $data = $pars->getDataArticle($_GET["id"]);
        ?>
        <h1 class="title"><?php echo $data[0] ?></h1>
        <img src='
            <?php echo $data[1] ?>' class="img-article" alt="...">
        <?php
        for ($i = 2; $i < count($data); $i++) :
        ?>
            <p><?php echo $data[$i] ?></p>
        <?php endfor ?>

    </div>
</body>

</html>