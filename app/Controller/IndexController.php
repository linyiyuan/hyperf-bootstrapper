<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
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
     * @RequestMapping(path="/", methods="get")
     */
    public function index()
    {

        return $this->success([
               'list' => Coroutine::id(),
           ]);
    }

}
