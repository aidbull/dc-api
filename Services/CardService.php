<?php

namespace DebitCardsAPI;

use DateTime;
use DebitCardsAPI\DTOs\CardDTO;

class CardService
{
    protected DebitCards $client;

    public function __construct(DebitCards $client)
    {
        $this->client = $client;
    }

    /**
     * GET methods
     */

    public function get(int $cardId): CardDTO|null
    {
        $response = $this->client->request('get', "cards/{$cardId}");

        if ($response->json('error')) {
            return null;
        }

        return new CardDTO($response->json());
    }

    public function balance(int $cardId): float|null
    {
        $response = $this->client->request('get', "cards/{$cardId}/balance");

        if ($response->json('error')) {
            return null;
        }

        return floatval($response->json('balance'));
    }

    public function pin(int $cardId): int|null
    {
        $response = $this->client->request('get', "cards/{$cardId}/pin");

        if ($response->json('error')) {
            return null;
        }

        return intval($response->json('pin'));
    }

    public function history(int $cardId, DateTime $startDate, DateTime $endDate)
    {
        return $this->client->request(
            'get',
            "cards/{$cardId}/history", [
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
        ]);
    }

    /**
     * POST methods
     */

    public function create(CardDTO $cardData): CardDTO|null
    {
        $response = $this->client->request('post', "cards/create", $cardData->toArray());

        if ($response->json('error')) {
            return null;
        }

        return new CardDTO($response->json());
    }

    public function deactivate(int $cardId)
    {
        return $this->client->request('post', "cards/{$cardId}/deactivate");
    }

    public function activate(int $cardId)
    {
        return $this->client->request('post', "cards/{$cardId}/activate");
    }

    public function update(int $cardId, CardDTO $cardData)
    {
        return $this->client->request('post', "cards/{$cardId}/update", $cardData->toArray());
    }

    public function updatePin(int $cardId, int $cardPin)
    {
        return $this->client->request('post', "cards/{$cardId}/update", ['pin' => $cardPin]);
    }

    public function load(int $cardId, int $amount)
    {
        return $this->client->request('post', "cards/{$cardId}/history", ['amount' => $amount]);
    }
}
