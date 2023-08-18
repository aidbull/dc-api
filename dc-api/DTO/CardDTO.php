<?php

namespace DebitCardsAPI\DTOs;

class CardDTO
{
    public $first_name;
    public $last_name;
    public $address;
    public $city;
    public $country_id;
    public $phone;
    public $currency;
    public $balance;
    public $pin;
    public $status;

    public function __construct(array $data)
    {
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->address = $data['address'];
        $this->city = $data['city'];
        $this->country_id = $data['country_id'];
        $this->phone = $data['phone'];
        $this->currency = $data['currency'];
        $this->balance = $data['balance'];
        $this->pin = $data['pin'];
        $this->status = $data['status'];
    }

    public function toArray()
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'city' => $this->city,
            'country_id' => $this->country_id,
            'phone' => $this->phone,
            'currency' => $this->currency,
            'balance' => $this->balance,
            'pin' => $this->pin,
            'status' => $this->status,
        ];
    }
}
