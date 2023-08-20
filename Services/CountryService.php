<?php

namespace DebitCardsAPI;

use DebitCardsAPI\DTOs\CountryDTO;

class CountryService
{
    protected DebitCards $client;

    public function __construct(DebitCards $client) {
        $this->client = $client;
    }

    /**
     * @return CountryDTO[]
     */
    public function __invoke(): array
    {
        $countries = [];
        $response = $this->client->request('get', 'countries');

        return $response ? array_map(function($country) {
            return new CountryDTO($country);
        }, $response['countries']) : $countries;
    }

    public function get(int $countryId) {
        $response = $this->client->request('get', "countries/{$countryId}");
        return new CountryDTO($response);
    }
}
