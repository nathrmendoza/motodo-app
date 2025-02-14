<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title ?? 'Welcome'?>&nbsp;&#45;&nbsp;Motodo</title>
    <link rel="stylesheet" href="./dist/css/main.css">

</head>
<body>
    <?php include(__DIR__ .'/../blocks/header.php'); ?>

    <div class="main">
        <?=$content ?? ''?>
    </div>

    <?php include(__DIR__ . '/../blocks/footer.php'); ?>
    <script src="./dist/js/main.js"></script>
</body>
</html>