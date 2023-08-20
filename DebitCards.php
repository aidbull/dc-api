<?php

namespace DebitCardsAPI;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DebitCards
{
    protected $apiKey;

    private $hostUrl;

    public $countries;

    public $cards;

    public function __construct(String $apiKey) {
        $this->hostUrl = config('dcapi.url', 'defalut.url');
        $this->apiKey = $apiKey;
        $this->countries = new CountryService($this);
        $this->cards = new CardService($this);
    }

    public function request($meth, $endpoint, $body = []) {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'AUTH_KEY' => $this->apiKey
            ])->$meth("{$this->hostUrl}/{$endpoint}", $body);

            if (!$response->successful()) {
                throw new \Exception('Request error: ' . $response->body());
            }

            return $response->json();
        } catch (\Exception $exception) {
            Log::error('Error in DebitCardsAPI: ' . $exception->getMessage());

            return null;
        }
    }
}
