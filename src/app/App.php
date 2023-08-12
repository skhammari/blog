<?php

    namespace App;

    use App\Core\Exception\RouteNotFoundException;
    use App\Core\Router;
    use App\Core\View;
    use PDO;

    class App
    {
        private static PDO $db;

        public function __construct(protected Router $router, protected array $request)
        {
            static::$db = (new DB())->getConnection();
        }

        public static function db(): PDO
        {
            return static::$db;
        }

        public function run()
        {
            try {
                echo $this->router->resolve(
                    $this->request['uri'],
                    strtolower($this->request['method'])
                );
            } catch (RouteNotFoundException) {
                http_response_code(404);

                echo View::make('error/404')->render();
            }
        }
    }