<!doctype html>
<html lang="en">
<head>
    <?php include __DIR__ . "/../components/head.php"; ?>
    <title>Home</title>
</head>
<body>
<div class="container">
    <?php include __DIR__ . "/../components/header.php"; ?>
    <?php include __DIR__ . "/../components/navbar.php"; ?>
    <div class="content">
        <h2><?=$article->title?></h2>
        <p style="font-weight: bold"><?=$article->body?></p>
    </div>
</div>
</body>
</html>