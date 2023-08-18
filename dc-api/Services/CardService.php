<?php

namespace DebitCardsAPI;

use DebitCardsAPI\DTOs\CardDTO;

class CardService
{
    protected DebitCards $client;

    public function __construct(DebitCards $client) {
        $this->client = $client;
    }

    /**
     * GET methods
     */

    public function get(int $cardId) {
        return $this->client->request('get', "cards/{$cardId}");
    }

    public function balance(int $cardId) {
        return $this->client->request('get', "cards/{$cardId}/balance");
    }

    public function pin(int $cardId) {
        $response = $this->client->request('get', "cards/{$cardId}/pin");

        if ($response->json('error')) {
            return null;
        }

        return $response->json('pin');
    }

    public function history(int $cardId) {
        return $this->client->request('get', "cards/{$cardId}/history");
    }

    /**
     * POST methods
     */

    public function create(CardDTO $cardData) {
        $response = $this->client->request('post', "cards/create", $cardData->toArray());

        if ($response->json('error')) {
            return null;
        }

        return new CardDTO($response->json());
    }

    public function deactivate(int $cardId) {
        return $this->client->request('post', "cards/{$cardId}/deactivate");
    }

    public function activate(int $cardId) {
        return $this->client->request('post', "cards/{$cardId}/activate");
    }

    public function update(int $cardId, CardDTO $cardData) {
        return $this->client->request('post', "cards/{$cardId}/update", $cardData->toArray());
    }

    public function updatePin(int $cardId, int $cardPin) {
        return $this->client->request('post', "cards/{$cardId}/update", ['pin' => $cardPin]);
    }

    public function load(int $cardId, int $amount) {
        return $this->client->request('post', "cards/{$cardId}/history", ['amount' => $amount]);
    }
}
