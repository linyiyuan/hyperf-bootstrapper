<?php
namespace App\Service;

class UserService
{
    public $params = [];

    public function getInfoById(int $id)
    {
        $userList = [
            1 => [
                'name' => '测试1',
                'age' => 18
            ],

            2 => [
                'name' => '测试1',
                'age' => 18
            ],
        ];

        return $userList[$id];
    }
}