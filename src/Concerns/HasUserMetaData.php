<?php

namespace LuckPerms\Concerns;

use LuckPerms\MetaData\UserMetaData;
use LuckPerms\MetaData\UserMetaDataMapper;

trait HasUserMetaData
{
    private array $metaData;

    final public function metaData(): UserMetaData
    {
        return resolve(UserMetaDataMapper::class)->map($this->metaData);
    }
}
