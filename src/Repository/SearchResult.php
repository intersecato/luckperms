<?php

namespace LuckPerms\Repository;

use LuckPerms\Node\Node;

class SearchResult
{
    private string $identifier;
    private Node $node;

    public function __construct(
        string $identifier,
        Node $node,
    ) {
        $this->identifier = $identifier;
        $this->node = $node;
    }

    public function identifier(): string
    {
        return $this->identifier;
    }

    public function node(): Node
    {
        return $this->node;
    }
}
