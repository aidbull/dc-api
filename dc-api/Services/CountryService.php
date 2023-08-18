<?php

namespace DebitCardsAPI;

class CountryService
{
    protected DebitCards $client;

    public function __construct(DebitCards $client) {
        $this->client = $client;
    }

    public function __invoke()
    {
        return $this->client->request('get', 'countries');
    }

    public function get(int $countryId) {
        return $this->client->request('get', "countries/{$countryId}");
    }
}
