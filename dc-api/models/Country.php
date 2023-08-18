<?php

namespace DebitCardsAPI;

class Country
{
    protected DebitCards $client;

    public function __construct(DebitCards $client) {
        $this->client = $client;
    }

    public function __invoke()
    {
        return $this->client->request('get', 'countries');
    }

    public function get($id) {
        return $this->client->request('get', "countries/{$id}");
    }
}
