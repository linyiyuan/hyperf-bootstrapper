<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Utils\Coroutine;

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

        $params = $this->request->input('user', 'asd');
        $method = $this->request->getMethod();
        $this->userService->params = $params;

        return [
            'params' => $this->userService->params,
        ];

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
            'inCoroutine' => Coroutine::inCoroutine(),
            'coroutineId' => Coroutine::id(),
        ];
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
