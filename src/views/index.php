<!doctype html>
<html lang="en">
<head>
    <?php require "components/head.php"; ?>
    <title>Home</title>
</head>
<body>
<div class="container">
    <?php require "components/header.php"; ?>
    <?php require "components/navbar.php"; ?>
    <div class="content">
        <a href="/article/create">New Article</a>
        <table class="table">
            <tbody>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?= $article->authorId ?></td>
                    <td><a href="/article?id=<?=$article->id?>"><?= $article->title ?></a></td>
                    <td><?= $article->body ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>