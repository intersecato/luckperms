<?php

namespace LuckPerms\Group;

use Illuminate\Support\Collection;
use LuckPerms\Exception\GroupNotFoundException;
use LuckPerms\Repository\Repository;
use LuckPerms\Repository\Search;

class GroupRepository extends Repository
{
    public function allIdentifiers(): Collection
    {
        if (isset($this->identifiers)) {
            return $this->identifiers;
        }

        $this->identifiers = new Collection();

        $response = $this->session->httpClient->get('/group');

        return $this->identifiers = collect($this->json($response->getBody()->getContents()));
    }

    public function search(Search $search): Collection
    {
        $response = $this->session->httpClient->get('/group/search', [
            'query' => $search->toArray(),
        ]);

        $groupMapper = resolve(GroupMapper::class);

        return collect($this->json($response->getBody()->getContents()))->map(function ($userData) {
            return [
                'name' => $userData['name'],
                'results' => $userData['results'],
            ];
        });
    }

    public function load(string $identifier): Group
    {
        if ($this->objects->has($identifier)) {
            return $this->objects->get($identifier);
        }

        $response = $this->session->httpClient->get("/group/{$identifier}");

        if ($response->getStatusCode() === 404) {
            throw new GroupNotFoundException("Group with name '{$identifier}' not found");
        }

        $group = resolve(GroupMapper::class)->map(
            $this->json($response->getBody()->getContents())
        );

        $this->objects->put($identifier, $group);

        return $group;
    }
}
