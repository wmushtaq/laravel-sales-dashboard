<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function package(){
        return $this->belongsTo(Package::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
