<?php

namespace LuckPerms\Group;

use LuckPerms\Contracts\Mapper;

class GroupMapper implements Mapper
{
    public function map(array $data): Group
    {
        return new Group(
            $data['name'],
            $data['displayName'],
            $data['weight'],
            $data['metadata'],
            $data['nodes'],
        );
    }
}
