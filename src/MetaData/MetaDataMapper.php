<?php

namespace LuckPerms\MetaData;

use LuckPerms\Contracts\Mapper;

class MetaDataMapper implements Mapper
{
    public function map(array $data): MetaData
    {
        return new MetaData(
            collect($data['meta']),
        );
    }
}
