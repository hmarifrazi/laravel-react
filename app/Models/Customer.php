<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\State;
use App\Models\Country;

class Customer extends Model
{
    use HasFactory;

        public function phone_ext(){
        return $this->belongsTo(PhoneExt::class,'contact_ext','id');
    }
     public function countries(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
     public function states(){
        return $this->belongsTo(State::class,'stete_id','id');
    }
     public function cities(){
        return $this->belongsTo(City::class,'city_id','id');
    }
}
