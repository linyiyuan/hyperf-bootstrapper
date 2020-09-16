<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\UserService;
use Hyperf\DbConnection\Db;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Response;
use Hyperf\Utils\Coroutine;
use Hyperf\Pool\SimplePool\PoolFactory;

/**
 * Class IndexController
 * @Controller()
 */
class IndexController extends AbstractController
{
    /**
     * @Inject()
     * @var UserService
     */
    public $userService = '';

    /**
     * @RequestMapping(path="test", methods="get, post")
     */
    public function index()
    {
        return $this->response->json(
            [
                'list' => 1
            ]
        );
    }

    /**
     * @RequestMapping(path="test1", methods="get")
     */
    public function test(RequestInterface $request)
    {
        return [
            'params' => $this->userService->params,
        ];
    }
}
