<?php

namespace LuckPerms\Concerns;

use Illuminate\Support\Collection;
use LuckPerms\Context\Context;
use LuckPerms\Context\ContextMapper;

trait HasContexts
{
    private array $contexts;

    /**
     * @return Collection<Context>
     */
    final public function contexts(): Collection
    {
        $contextMapper = resolve(ContextMapper::class);

        return collect($this->contexts)->map(function (array $context) use ($contextMapper): Context {
            return $contextMapper->map($context);
        });
    }
}
