<?php

namespace DebitCardsAPI\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'city',
        'country_id',
        'phone',
        'currency',
        'balance',
        'pin',
        'status'
    ];

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
