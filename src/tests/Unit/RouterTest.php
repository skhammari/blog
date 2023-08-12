<?php

    namespace tests\Unit;

    use App\Controller\BlogController;
    use App\Core\Router;
    use PHPUnit\Framework\TestCase;

    class RouterTest extends TestCase
    {
        /**
         * @test
         */
        public function it_registers_a_route(): void
        {
            $router = new Router();
            $router->register('get', '/users', [BlogController::class, 'index']);
            $expected = [
                'get' => [
                    '/users' => [
                        'App\Controller\BlogController',
                        'index'
                    ]
                ]
            ];

            $this->assertEquals($expected, $router->routes());
        }
    }