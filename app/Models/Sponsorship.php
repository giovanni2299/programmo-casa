<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;
    //collego la tabella apartments 
    public function apartments(){
        return $this->belongsToMany(Apartment::class);
    }
}
