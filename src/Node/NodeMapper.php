<?php

namespace LuckPerms\Node;

use LuckPerms\Contracts\Mapper;
use LuckPerms\Exception\InvalidNodeTypeException;

class NodeMapper implements Mapper
{
    public function map(array $data): Node
    {
        return new Node(
            $data['key'],
            NodeType::tryFrom($data['type']) ?? throw new InvalidNodeTypeException("Invalid NodeType: {$data['type']}"),
            $data['value'],
            $data['context'],
            $data['expiry'] ?? 0,
        );
    }
}
