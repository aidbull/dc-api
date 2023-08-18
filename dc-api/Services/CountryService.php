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

        if ($response->json('error')) {
            return $countries;
        }

        foreach ($response->json('countries') as $country) {
            $countries[] = new CountryDTO($country);
        }

        return $countries;
    }

    public function get(int $countryId) {
        $response = $this->client->request('get', "countries/{$countryId}");

        if ($response->json('error')) {
            return null;
        }

        return new CountryDTO($response->json());
    }
}
