<?php

namespace DebitCardsAPI;

use Illuminate\Support\Facades\Http;

class DebitCards
{
    protected $apiKey;

    private $hostUrl;

    public $countries;

    public $cards;

    public function __construct(String $apiKey) {
        $this->hostUrl = config('host.url', 'defalut.url');
        $this->apiKey = $apiKey;
        $this->countries = new Country($this);
        $this->cards = new Card($this);
    }

    public function request($meth, $endpoint, $body = []) {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'AUTH_KEY' => $this->apiKey
        ])->$meth("{$this->hostUrl}/{$endpoint}", $body);
    }
}
