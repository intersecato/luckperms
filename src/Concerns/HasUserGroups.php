<?php

namespace LuckPerms\Concerns;

use Illuminate\Support\Collection;
use LuckPerms\Group\UserGroup;
use LuckPerms\Group\UserGroupMapper;
use LuckPerms\Node\Node;
use LuckPerms\Node\NodeType;

trait HasUserGroups
{
    /**
     * @return Collection<UserGroup>
     */
    final public function groups(): Collection
    {
        $userGroupMapper = resolve(UserGroupMapper::class);

        return $this->nodes()
            ->filter(function (Node $node) {
                return $node->type() === NodeType::Inheritance;
            })
            ->map(function (Node $node) use ($userGroupMapper): UserGroup {
                return $userGroupMapper->map($node->toArray());
            });
    }
}
