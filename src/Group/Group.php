<?php

namespace LuckPerms\Group;

use LuckPerms\Concerns\HasMetaData;
use LuckPerms\Concerns\HasNodes;
use LuckPerms\Concerns\HasPermissions;

class Group
{
    use HasNodes;
    use HasPermissions;
    use HasMetaData;

    private string $name;
    private string $displayName;
    private int $weight;

    public function __construct(
        string $name,
        string $displayName,
        int $weight,
        array $metaData,
        array $nodes,
    ) {
        $this->name = $name;
        $this->displayName = $displayName;
        $this->weight = $weight;
        $this->metaData = $metaData;
        $this->nodes = $nodes;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function displayName(): string
    {
        return $this->displayName;
    }

    public function weight(): int
    {
        return $this->weight;
    }
}
