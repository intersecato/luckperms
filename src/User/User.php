<?php

namespace LuckPerms\User;

use LuckPerms\Concerns\HasNodes;
use LuckPerms\Concerns\HasPermissions;
use LuckPerms\Concerns\HasUserGroups;
use LuckPerms\Concerns\HasUserMetaData;

class User
{
    use HasNodes;
    use HasPermissions;
    use HasUserGroups;
    use HasUserMetaData;

    private string $username;
    private string $uniqueId;

    public function __construct(
        string $username,
        string $uniqueId,
        array $nodes,
        array $metaData,
    ) {
        $this->username = $username;
        $this->uniqueId = $uniqueId;
        $this->nodes = $nodes;
        $this->metaData = $metaData;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function uniqueId(): string
    {
        return $this->uniqueId;
    }
}
