<?php

namespace LuckPerms\Permission;

use LuckPerms\Contracts\Mapper;

class PermissionMapper implements Mapper
{
    public function map(array $data): Permission
    {
        return new Permission(
            $data['key'],
            $data['value'],
            $data['context'],
        );
    }
}
