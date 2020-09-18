<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\BusinessException;
use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Throwable;

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
        try {
            return $this->success([

            ]);
        }catch (Throwable $throwable) {
            return $this->errorExp($throwable);
        }

    }

}
