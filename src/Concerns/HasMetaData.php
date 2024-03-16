<?php

namespace LuckPerms\Concerns;

use LuckPerms\MetaData\MetaData;
use LuckPerms\MetaData\MetaDataMapper;

trait HasMetaData
{
    private array $metaData;

    final public function metaData(): MetaData
    {
        return resolve(MetaDataMapper::class)->map($this->metaData);
    }
}
