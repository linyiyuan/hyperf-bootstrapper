<?php

declare(strict_types=1);

namespace App\Controller;

use App\AdminAnnotations\HfAdminC;
use App\AdminAnnotations\HfAdminF;
use App\Service\UserService;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * Class IndexController
 * @HfAdminC(Cname="账号管理",Cstyle="fa-user",Csort=2)
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
     * @HfAdminF(Fname="账号列表",Fdisplay=true,Fstyle="fa-circle-o")
     * @RequestMapping(path="/test", methods="get, post")
     */
    public function index()
    {
        $classArr = AnnotationCollector::getClassByAnnotation(HfAdminC::class);
        var_dump($classArr);
        $userId = $this->request->input('user_id') ?? 2;
        $userInfo = $this->userService->getInfoById((int) $userId);
        return $this->response->json(
            [
                'list' => $userInfo
            ]
        );
    }
}
