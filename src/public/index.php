<?php

    use App\App;
    use App\Controller\BlogController;
    use App\Core\Router;
    use Dotenv\Dotenv;

    require __DIR__ . '/../vendor/autoload.php';

    $dotenv = Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();

    const VIEW_PATH = __DIR__ . '/../views';

    $router = new Router();
    $router
        ->get('/', [BlogController::class, 'index'])
        ->get('/article', [BlogController::class, 'show'])
        ->get('/article/create', [BlogController::class, 'create'])
        ->post('/article/create', [BlogController::class, 'store']);

    (new App(
        router: $router,
        request: ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
    ))->run();