<?php

namespace LuckPerms\User;

use LuckPerms\Contracts\Mapper;

class UserMapper implements Mapper
{
    public function map(array $data): User
    {
        return new User(
            $data['username'],
            $data['uniqueId'],
            $data['nodes'],
            $data['metadata'],
        );
    }
}
