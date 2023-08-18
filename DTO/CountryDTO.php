<?php

namespace DebitCardsAPI\DTOs;

class CountryDTO
{
    public $id;
    public $name;
    public $code;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->code = $data['code'];
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
        ];
    }
}
