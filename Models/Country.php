<?php

namespace DebitCardsAPI\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $fillable = ['code', 'name'];

    public function cards() {
        return $this->hasMany(Card::class, 'country_id');
    }
}
