<?php
namespace App\Service;

use Hyperf\DbConnection\Db;

class UserService
{
    public $params = [];

    public function getInfoById(int $id)
    {
        $userList = Db::table('sy_users')->get()->toArray();
        $userList = array_column($userList, null, 'id');

        return $userList[$id];
    }
}