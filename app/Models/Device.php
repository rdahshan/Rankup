<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function slots(){
        return $this->hasMany(Slot::class);
    }
   
    public function participants(){
        return $this->hasManyThrough(Participant::class,Slot::class);
    }
}
