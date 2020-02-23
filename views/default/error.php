<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_ENV['ST_NAME'] ?> - Упс, что то пошло не так!</title>
    <meta name="description" content="<?php echo $_ENV['ST_DESC'] ?>">
    <meta name="keywords" content="<?php echo $_ENV['ST_KEYWORDS'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/<?php echo $_ENV['ST_THEME'] ?>/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&subset=cyrillic">
</head>
<body style="background: #F44336;min-height: 100vh;overflow-y: hidden">
    <h1 style="color: white;padding-top: 40vh">Оплата не удалась!</h1>
<script>
    setTimeout("window.location.href = '/'",3000);
</script>
</body>
</html>