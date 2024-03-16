<?php

namespace LuckPerms\Concerns;

use Illuminate\Support\Collection;
use LuckPerms\Group\Group;
use LuckPerms\Group\GroupMapper;
use LuckPerms\Node\Node;
use LuckPerms\Node\NodeType;

trait HasGroups
{
    /**
     * @return Collection<Group>
     */
    final public function groups(): Collection
    {
        $groupMapper = resolve(GroupMapper::class);

        return $this->nodes()
            ->filter(function (Node $node) {
                return $node->type() === NodeType::Inheritance;
            })->map(function (Node $node) use ($groupMapper): Group {
                return $groupMapper->map($node->toArray());
            });
    }
}
