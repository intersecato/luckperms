<?php

namespace LuckPerms\Group;

use LuckPerms\Concerns\HasContexts;
use LuckPerms\Concerns\HasExpiry;

class UserGroup extends Group
{
    use HasContexts;
    use HasExpiry;

    private bool $value;

    public function __construct(
        string $name,
        string $displayName,
        int $weight,
        array $metaData,
        array $nodes,
        bool $value,
        array $contexts,
        int $expiry,
    ) {
        parent::__construct($name, $displayName, $weight, $metaData, $nodes);
        $this->value = $value;
        $this->contexts = $contexts;
        $this->expiry = $expiry;
    }

    public function value(): bool
    {
        return $this->value;
    }
}
